<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\Polygon;

/**
 * @Entity
 * @Table(name="polygons")
 */
class PolygonEntity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="Polygon")
     */
    private Polygon $polygon;

    public function getPolygon() : Polygon
    {
        return $this->polygon;
    }

    public function setPolygon(Polygon $polygon) : void
    {
        $this->polygon = $polygon;
    }
}
