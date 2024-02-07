<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\MultiLineString;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class MultiLineStringEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'MultiLineString')]
    public MultiLineString $multiLineString;
}
