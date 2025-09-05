<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Types;

use Brick\Geo\LineString;
use Brick\Geo\Polygon;
use Brick\Geo\Doctrine\Tests\DataFixtures\LoadPolygonData;
use Brick\Geo\Doctrine\Tests\FunctionalTestCase;
use Brick\Geo\Doctrine\Tests\Fixtures\PolygonEntity;

/**
 * Integrations tests for class PolygonType.
 */
class PolygonTypeTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->addFixture(new LoadPolygonData());
        $this->loadFixtures();
    }

    public function testReadFromDbAndConvertToPHPValue() : void
    {
        $repository = $this->getEntityManager()->getRepository(PolygonEntity::class);

        /** @var PolygonEntity $polygonEntity */
        $polygonEntity = $repository->findOneBy(['id' => 1]);
        self::assertNotNull($polygonEntity);

        $polygon = $polygonEntity->polygon;
        self::assertInstanceOf(Polygon::class, $polygon);
        self::assertSame(1, $polygon->count());
        self::assertInstanceOf(LineString::class, $polygon->exteriorRing());

        $ring = $polygon->exteriorRing();
        self::assertSame(5, $ring->numPoints());

        $this->assertPointEquals($ring->pointN(1), 0.0, 0.0);
        $this->assertPointEquals($ring->pointN(2), 1.0, 0.0);
        $this->assertPointEquals($ring->pointN(3), 1.0, 1.0);
        $this->assertPointEquals($ring->pointN(4), 0.0, 1.0);
        $this->assertPointEquals($ring->pointN(5), 0.0, 0.0);
    }
}
