<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests;

use Brick\Geo\Point;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\SchemaTool;
use PHPUnit\Framework\TestCase;

/**
 * Base class for Doctrine types functional test cases.
 */
abstract class FunctionalTestCase extends TestCase
{
    private AbstractPlatform $platform;

    private Loader $fixtureLoader;

    private EntityManager $em;

    private ORMExecutor $ormExecutor;

    private Connection $connection;

    protected function setUp(): void
    {
        parent::setUp();

        $this->connection = createDoctrineConnection(selectDatabase: true);
        $this->platform = $this->connection->getDatabasePlatform();

        $this->platform->registerDoctrineTypeMapping('geometry', 'binary');
        $this->platform->registerDoctrineTypeMapping('linestring', 'binary');
        $this->platform->registerDoctrineTypeMapping('multilinestring', 'binary');
        $this->platform->registerDoctrineTypeMapping('multipoint', 'binary');
        $this->platform->registerDoctrineTypeMapping('multipolygon', 'binary');
        $this->platform->registerDoctrineTypeMapping('point', 'binary');
        $this->platform->registerDoctrineTypeMapping('polygon', 'binary');

        $this->fixtureLoader = new Loader();

        $config = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/Fixtures']);

        $this->em = new EntityManager($this->connection, $config);
        $schemaTool = new SchemaTool($this->em);

        $schemaTool->updateSchema([
            $this->em->getClassMetadata(Fixtures\GeometryEntity::class),
            $this->em->getClassMetadata(Fixtures\LineStringEntity::class),
            $this->em->getClassMetadata(Fixtures\MultiLineStringEntity::class),
            $this->em->getClassMetadata(Fixtures\MultiPointEntity::class),
            $this->em->getClassMetadata(Fixtures\MultiPolygonEntity::class),
            $this->em->getClassMetadata(Fixtures\PointEntity::class),
            $this->em->getClassMetadata(Fixtures\PolygonEntity::class)
        ]);

        $purger = new ORMPurger();
        $this->ormExecutor = new ORMExecutor($this->em, $purger);
    }

    protected function getEntityManager() : EntityManager
    {
        return $this->em;
    }

    protected function addFixture(FixtureInterface $fixture) : void
    {
        $this->fixtureLoader->addFixture($fixture);
    }

    protected function loadFixtures() : void
    {
        $this->ormExecutor->execute($this->fixtureLoader->getFixtures());
    }

    protected function assertPointEquals(Point $point, float $x, float $y, ?float $z = null) : void
    {
        self::assertInstanceOf(Point::class, $point);

        self::assertSame($x, $point->x());
        self::assertSame($y, $point->y());
        self::assertSame($z, $point->z());
    }
}
