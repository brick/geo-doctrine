<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\MultiPoint;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class MultiPointEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'MultiPoint')]
    public MultiPoint $multiPoint;
}
