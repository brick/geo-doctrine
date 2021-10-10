<?php

use Brick\Geo\Doctrine\Types;
use Doctrine\DBAL\Types\Type;

(function() {
    /** @var \Composer\Autoload\ClassLoader $classLoader */
    $classLoader = require 'vendor/autoload.php';

    // Add namespace for doctrine base tests
    $classLoader->addPsr4('Doctrine\\Tests\\', [
        __DIR__ . '/vendor/doctrine/orm/tests/Doctrine/Tests',
        __DIR__ . '/vendor/doctrine/dbal/tests/Doctrine/Tests'
    ]);
    $classLoader->loadClass('Doctrine\Tests\DbalFunctionalTestCase');
    $classLoader->loadClass('Doctrine\Tests\DBAL\Mocks\MockPlatform');

    Type::addType('geometry', Types\GeometryType::class);
    Type::addType('linestring', Types\LineStringType::class);
    Type::addType('multilinestring', Types\MultiLineStringType::class);
    Type::addType('multipoint', Types\MultiPointType::class);
    Type::addType('multipolygon', Types\MultiPolygonType::class);
    Type::addType('point', Types\PointType::class);
    Type::addType('polygon', Types\PolygonType::class);

    $driver = getenv('DRIVER');

    if ($driver === false) {
        echo 'Please set the database driver to use:' . PHP_EOL;
        echo 'DRIVER={driver} vendor/bin/phpunit' . PHP_EOL;
        echo 'Available drivers: PDO_MYSQL, PDO_PGSQL' . PHP_EOL;
        exit(1);
    } else {
        switch ($driver) {
            case 'PDO_MYSQL':
                echo 'Using PDO_MYSQL driver' . PHP_EOL;

                $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $pdo->exec('DROP DATABASE IF EXISTS geo_tests');
                $pdo->exec('CREATE DATABASE geo_tests');

                $statement = $pdo->query('SELECT VERSION()');
                $version = $statement->fetchColumn();

                echo 'MySQL version: ' . $version . PHP_EOL;

                $GLOBALS['db_type'] = 'pdo_mysql';
                $GLOBALS['db_host'] = '127.0.0.1';
                $GLOBALS['db_port'] = 3306;
                $GLOBALS['db_username'] = 'root';
                $GLOBALS['db_password'] = '';
                $GLOBALS['db_name'] = 'geo_tests';

                // doctrine/dbal >= 2.13.0
                $GLOBALS['db_driver'] = 'pdo_mysql';
                $GLOBALS['db_user'] = 'root';
                $GLOBALS['db_dbname'] = 'geo_tests';

                break;

            case 'PDO_PGSQL':
                echo 'Using PDO_PGSQL driver' . PHP_EOL;

                $pdo = new PDO('pgsql:host=localhost', 'postgres', 'postgres');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $pdo->exec('DROP DATABASE IF EXISTS geo_tests');
                $pdo->exec('CREATE DATABASE geo_tests');

                $statement = $pdo->query('SELECT version()');
                $version = $statement->fetchColumn();

                echo 'PostgreSQL version: ' . $version . PHP_EOL;

                $statement = $pdo->query('SELECT PostGIS_Version()');
                $version = $statement->fetchColumn();

                echo 'PostGIS version: ' . $version . PHP_EOL;

                $GLOBALS['db_type'] = 'pdo_pgsql';
                $GLOBALS['db_host'] = 'localhost';
                $GLOBALS['db_port'] = 5432;
                $GLOBALS['db_username'] = 'postgres';
                $GLOBALS['db_password'] = 'postgres';
                $GLOBALS['db_name'] = 'geo_tests';

                // doctrine/dbal >= 2.13.0
                $GLOBALS['db_driver'] = 'pdo_pgsql';
                $GLOBALS['db_user'] = 'postgres';
                $GLOBALS['db_dbname'] = 'geo_tests';

                break;

            default:
                echo 'Unknown driver: ' . $driver . PHP_EOL;
                exit(1);
        }
    }
})();
