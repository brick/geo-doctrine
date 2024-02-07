<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\MultiPolygon;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class MultiPolygonEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'MultiPolygon')]
    public MultiPolygon $multiPolygon;
}
