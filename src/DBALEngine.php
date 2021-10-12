<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine;

use Brick\Geo\Engine\DatabaseEngine;
use Brick\Geo\Engine\GeometryParameter;
use Brick\Geo\Exception\GeometryEngineException;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Exception;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Statement;

/**
 * Doctrine type for GeometryCollection.
 */
class DBALEngine extends DatabaseEngine
{
    /**
     * The database connection.
     */
    private Connection $connection;

    /**
     * A cache of the prepared statements, indexed by query.
     *
     * @var Statement[]
     */
    private array $statements = [];

    public function __construct(Connection $connection, bool $useProxy = true)
    {
        parent::__construct($useProxy);

        $this->connection = $connection;
    }

    protected function executeQuery(string $query, array $parameters) : array
    {
        try {
            if (! isset($this->statements[$query])) {
                $this->statements[$query] = $this->connection->prepare($query);
            }

            $statement = $this->statements[$query];

            $index = 1;

            foreach ($parameters as $parameter) {
                if ($parameter instanceof GeometryParameter) {
                    $statement->bindValue($index++, $parameter->data, $parameter->isBinary ? ParameterType::LARGE_OBJECT : ParameterType::STRING);
                    $statement->bindValue($index++, $parameter->srid, ParameterType::INTEGER);
                } else {
                    if ($parameter === null) {
                        $type = ParameterType::NULL;
                    } elseif (is_int($parameter)) {
                        $type = ParameterType::INTEGER;
                    } elseif (is_bool($parameter)) {
                        $type = ParameterType::BOOLEAN;
                    } else {
                        $type = ParameterType::STRING;
                    }

                    $statement->bindValue($index++, $parameter, $type);
                }
            }

            $statement->execute();

            $result = $statement->fetchNumeric();
        } catch (Exception $e) {
            $errorClass = substr((string) $e->getSQLState(), 0, 2);

            // 42XXX = syntax error or access rule violation; reported on undefined function.
            // 22XXX = data exception; reported by MySQL 5.7 on unsupported geometry.
            if ($errorClass === '42' || $errorClass === '22') {
                throw GeometryEngineException::operationNotSupportedByEngine($e);
            }

            throw $e;
        }

        assert($result !== false);

        return $result;
    }

    protected function getGeomFromWKBSyntax(): string
    {
        if ($this->connection->getDatabasePlatform()->getName() === 'mysql') {
            return 'ST_GeomFromWKB(BINARY ?, ?)';
        }

        return parent::getGeomFromWKBSyntax();
    }

    /**
     * @param scalar|null $parameter
     */
    protected function getParameterPlaceholder($parameter): string
    {
        if ($this->connection->getDatabasePlatform()->getName() === 'pgsql') {
            if (is_int($parameter)) {
                // https://stackoverflow.com/q/66625661/759866
                // https://externals.io/message/113521
                return 'CAST (? AS INTEGER)';
            }
        }

        return parent::getParameterPlaceholder($parameter);
    }
}
