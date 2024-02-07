<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\Polygon;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class PolygonEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'Polygon')]
    public Polygon $polygon;
}
