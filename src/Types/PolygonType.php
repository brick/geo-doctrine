<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\PolygonProxy;

/**
 * Doctrine type for Polygon.
 */
class PolygonType extends GeometryType
{
    protected function getGeometryName() : string
    {
        return 'Polygon';
    }

    protected function getProxyClassName() : string
    {
        return PolygonProxy::class;
    }
}
