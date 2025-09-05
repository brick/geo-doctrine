<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\Geometry;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class GeometryEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'Geometry', length: 100000)]
    public Geometry $geometry2;
}
