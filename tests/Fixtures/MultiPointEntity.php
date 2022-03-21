<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\MultiPoint;

/**
 * @Entity
 * @Table(name="multipoints")
 */
class MultiPointEntity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="MultiPoint")
     */
    private MultiPoint $multiPoint;

    public function getMultiPoint() : MultiPoint
    {
        return $this->multiPoint;
    }

    public function setMultiPoint(MultiPoint $multiPoint) : void
    {
        $this->multiPoint = $multiPoint;
    }
}
