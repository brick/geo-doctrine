<?php

namespace Doctrine\DBAL\Tests;

namespace Brick\Geo\Doctrine\Tests;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class TestUtil
{
    public static function getConnection(): Connection
    {
        return DriverManager::getConnection(self::getConnectionParameters());
    }

    /**
     * @return mixed[]
     */
    private static function getConnectionParameters(): array
    {
        $prefix = 'db_';
        $parameters = [];

        foreach (
            [
                'driver',
                'user',
                'password',
                'host',
                'dbname',
                'port',
            ] as $parameter
        ) {
            if (! isset($GLOBALS[$prefix . $parameter])) {
                continue;
            }

            $parameters[$parameter] = $GLOBALS[$prefix . $parameter];
        }

        return $parameters;
    }
}
