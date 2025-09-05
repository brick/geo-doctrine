<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Types;

use Brick\Geo\Point;
use Brick\Geo\MultiPoint;
use Brick\Geo\Doctrine\Tests\DataFixtures\LoadMultiPointData;
use Brick\Geo\Doctrine\Tests\FunctionalTestCase;
use Brick\Geo\Doctrine\Tests\Fixtures\MultiPointEntity;

/**
 * Integrations tests for class MultiPointType.
 */
class MultiPointTypeTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->addFixture(new LoadMultiPointData());
        $this->loadFixtures();
    }

    public function testReadFromDbAndConvertToPHPValue() : void
    {
        $repository = $this->getEntityManager()->getRepository(MultiPointEntity::class);

        /** @var MultiPointEntity $multiPointEntity */
        $multiPointEntity = $repository->findOneBy(['id' => 1]);
        self::assertNotNull($multiPointEntity);

        $multiPoint = $multiPointEntity->multiPoint;
        self::assertInstanceOf(MultiPoint::class, $multiPoint);
        self::assertSame(3, $multiPoint->numGeometries());

        /** @var Point $point */
        $point = $multiPoint->geometryN(1);
        $this->assertPointEquals($point, 0.0, 0.0);

        /** @var Point $point */
        $point = $multiPoint->geometryN(2);
        $this->assertPointEquals($point, 1.0, 0.0);

        /** @var Point $point */
        $point = $multiPoint->geometryN(3);
        $this->assertPointEquals($point, 1.0, 1.0);
    }
}
