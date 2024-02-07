<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\MultiPointProxy;

/**
 * Doctrine type for MultiPoint.
 */
class MultiPointType extends GeometryType
{
    protected function getGeometryName() : string
    {
        return 'MultiPoint';
    }

    protected function getProxyClassName() : string
    {
        return MultiPointProxy::class;
    }

    protected function hasKnownSubclasses() : bool
    {
        return false;
    }
}
