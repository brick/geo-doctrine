<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Types;

use Brick\Geo\Point;
use Brick\Geo\Proxy\ProxyInterface;
use Brick\Geo\Doctrine\Tests\DataFixtures\LoadGeometryData;
use Brick\Geo\Doctrine\Tests\FunctionalTestCase;
use Brick\Geo\Doctrine\Tests\Fixtures\GeometryEntity;

/**
 * Integrations tests for class GeometryType.
 */
class GeometryTypeTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->addFixture(new LoadGeometryData());
        $this->loadFixtures();
    }

    public function testReadFromDbAndConvertToPHPValue() : void
    {
        $repository = $this->getEntityManager()->getRepository(GeometryEntity::class);

        /** @var GeometryEntity $geometryEntity */
        $geometryEntity = $repository->findOneBy(['id' => 1]);
        self::assertNotNull($geometryEntity);

        $geometry = $geometryEntity->geometry;

        self::assertInstanceOf(Point::class, $geometry);
        self::assertInstanceOf(ProxyInterface::class, $geometry);

        /** @var Point $geometry */
        $this->assertPointEquals($geometry, 1.0, 2.0);
    }
}
