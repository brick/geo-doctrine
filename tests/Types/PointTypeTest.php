<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Types;

use Brick\Geo\Doctrine\Tests\DataFixtures\LoadPointData;
use Brick\Geo\Doctrine\Tests\FunctionalTestCase;
use Brick\Geo\Doctrine\Tests\Fixtures\PointEntity;

/**
 * Integrations tests for class PointType.
 */
class PointTypeTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->addFixture(new LoadPointData());
        $this->loadFixtures();
    }

    public function testReadFromDbAndConvertToPHPValue() : void
    {
        $repository = $this->getEntityManager()->getRepository(PointEntity::class);

        /** @var PointEntity $pointEntity */
        $pointEntity = $repository->findOneBy([]);
        self::assertNotNull($pointEntity);

        $point = $pointEntity->point;
        $this->assertPointEquals($point, 0.0, 0.0);
    }
}
