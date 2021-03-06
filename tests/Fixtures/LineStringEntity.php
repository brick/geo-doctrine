<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\LineString;

/**
 * @Entity
 * @Table(name="linestrings")
 */
class LineStringEntity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="LineString")
     */
    private LineString $lineString;

    public function getLineString() : LineString
    {
        return $this->lineString;
    }

    public function setLineString(LineString $lineString) : void
    {
        $this->lineString = $lineString;
    }
}
