<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\DataFixtures;

use Brick\Geo\Doctrine\Tests\Fixtures\GeometryEntity;
use Brick\Geo\Point;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadGeometryData implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $point1 = new GeometryEntity();
        $point1->geometry2 = Point::xy(1, 2);

        $manager->persist($point1);
        $manager->flush();
    }
}
