<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\DataFixtures;

use Brick\Geo\Point;
use Brick\Geo\Doctrine\Tests\Fixtures\PointEntity;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadPointData implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $point1 = new PointEntity();
        $point1->point = Point::xy(0, 0);

        $manager->persist($point1);
        $manager->flush();
    }
}
