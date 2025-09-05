<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\LineStringProxy;

/**
 * Doctrine type for LineString.
 */
class LineStringType extends GeometryType
{
    protected function getGeometryName() : string
    {
        return 'LineString';
    }

    protected function getProxyClassName() : string
    {
        return LineStringProxy::class;
    }

    protected function hasKnownSubclasses() : bool
    {
        return false;
    }
}
