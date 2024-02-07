<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\DataFixtures;

use Brick\Geo\MultiPoint;
use Brick\Geo\Point;
use Brick\Geo\Doctrine\Tests\Fixtures\MultiPointEntity;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadMultiPointData implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $point1 = Point::xy(0,0);
        $point2 = Point::xy(1,0);
        $point3 = Point::xy(1,1);

        $multiPoint1 = new MultiPointEntity();
        $multiPoint1->multiPoint = MultiPoint::of($point1, $point2, $point3);

        $manager->persist($multiPoint1);
        $manager->flush();
    }
}
