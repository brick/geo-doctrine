<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Types;

use Brick\Geo\LineString;
use Brick\Geo\Doctrine\Tests\DataFixtures\LoadLineStringData;
use Brick\Geo\Doctrine\Tests\FunctionalTestCase;
use Brick\Geo\Doctrine\Tests\Fixtures\LineStringEntity;

/**
 * Integrations tests for class LineStringType.
 */
class LineStringTypeTest extends FunctionalTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->addFixture(new LoadLineStringData());
        $this->loadFixtures();
    }

    public function testReadFromDbAndConvertToPHPValue() : void
    {
        $repository = $this->getEntityManager()->getRepository(LineStringEntity::class);

        /** @var LineStringEntity $lineStringEntity */
        $lineStringEntity = $repository->findOneBy(['id' => 1]);
        self::assertNotNull($lineStringEntity);

        $lineString = $lineStringEntity->lineString;
        self::assertInstanceOf(LineString::class, $lineString);
        self::assertSame(3, $lineString->numPoints());

        $this->assertPointEquals($lineString->pointN(1), 0.0, 0.0);
        $this->assertPointEquals($lineString->pointN(2), 1.0, 0.0);
        $this->assertPointEquals($lineString->pointN(3), 1.0, 1.0);
    }
}
