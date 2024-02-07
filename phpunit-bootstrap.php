<?php

use Brick\Geo\Doctrine\Types;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception\DatabaseDoesNotExist;
use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\DBAL\Types\Type;

const TEST_DATABASE = 'geo_tests';

function createDoctrineConnection(bool $selectDatabase): Connection
{
    $env = getenv();

    $requiredEnv = [
        'DB_DRIVER',
        'DB_HOST',
        'DB_USER',
        'DB_PASSWORD',
    ];

    $driver = $env['DB_DRIVER'] ?? null;
    $host = $env['DB_HOST'] ?? null;
    $port = $env['DB_PORT'] ?? null;
    $user = $env['DB_USER'] ?? null;
    $password = $env['DB_PASSWORD'] ?? null;

    if ($driver === null || $host === null || $user === null || $password === null) {
        $missingEnv = array_diff($requiredEnv, array_keys($env));

        echo "Missing environment variables: ", PHP_EOL;
        foreach ($missingEnv as $key) {
            echo " - $key", PHP_EOL;
        }
        echo PHP_EOL;

        echo "Example:", PHP_EOL;
        echo 'DB_DRIVER=pdo_mysql DB_HOST=localhost DB_PORT=3306 DB_USER=root DB_PASSWORD=password vendor/bin/phpunit' , PHP_EOL;
        echo PHP_EOL;

        echo 'Available drivers:', PHP_EOL;
        echo 'https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#driver', PHP_EOL;

        exit(1);
    }

    $params = [
        'driver' => $driver,
        'host' => $host,
        'user' => $user,
        'password' => $password,
    ];

    if ($port !== null) {
        $params['port'] = (int) $port;
    }

    if ($selectDatabase) {
        $params['dbname'] = TEST_DATABASE;
    }

    $connection = DriverManager::getConnection($params);

    if ($connection->getDatabasePlatform() instanceof PostgreSQLPlatform) {
        $connection->executeStatement('CREATE EXTENSION IF NOT EXISTS postgis');
    }

    return $connection;
}

(function() {
    $connection = createDoctrineConnection(selectDatabase: false);

    echo "Database version: ", $connection->getServerVersion(), PHP_EOL;
    echo "Database platform: ", get_class($connection->getDatabasePlatform()), PHP_EOL;

    if ($connection->getDatabasePlatform() instanceof PostgreSQLPlatform) {
        $version = $connection->executeQuery('SELECT PostGIS_Version()')->fetchOne();
        echo 'PostGIS version: ', $version, PHP_EOL;
    }

    $schemaManager = $connection->createSchemaManager();

    try {
        $schemaManager->dropDatabase('geo_tests');
    } catch (DatabaseDoesNotExist) {
        // not an error!
    }

    $schemaManager->createDatabase('geo_tests');

    /** @var \Composer\Autoload\ClassLoader $classLoader */
    $classLoader = require 'vendor/autoload.php';

    // Add namespace for doctrine base tests
    $classLoader->addPsr4('Doctrine\\Tests\\', [
        __DIR__ . '/vendor/doctrine/orm/tests/Doctrine/Tests',
        __DIR__ . '/vendor/doctrine/dbal/tests/Doctrine/Tests'
    ]);

    $classLoader->loadClass('Doctrine\Tests\DbalFunctionalTestCase');
    $classLoader->loadClass('Doctrine\Tests\DBAL\Mocks\MockPlatform');

    // Register Doctrine types
    Type::addType('Geometry', Types\GeometryType::class);
    Type::addType('LineString', Types\LineStringType::class);
    Type::addType('MultiLineString', Types\MultiLineStringType::class);
    Type::addType('MultiPoint', Types\MultiPointType::class);
    Type::addType('MultiPolygon', Types\MultiPolygonType::class);
    Type::addType('Point', Types\PointType::class);
    Type::addType('Polygon', Types\PolygonType::class);
})();
