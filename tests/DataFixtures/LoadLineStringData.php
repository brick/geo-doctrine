<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\DataFixtures;

use Brick\Geo\LineString;
use Brick\Geo\Point;
use Brick\Geo\Doctrine\Tests\Fixtures\LineStringEntity;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadLineStringData implements FixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $point1 = Point::xy(0,0);
        $point2 = Point::xy(1,0);
        $point3 = Point::xy(1,1);

        $lineString1 = new LineStringEntity();
        $lineString1->lineString = LineString::of($point1, $point2, $point3);

        $manager->persist($lineString1);
        $manager->flush();
    }
}
