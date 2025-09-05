<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\GeometryCollectionProxy;

/**
 * Doctrine type for GeometryCollection.
 */
class GeometryCollectionType extends GeometryType
{
    protected function getGeometryName() : string
    {
        return 'GeometryCollection';
    }

    protected function getProxyClassName() : string
    {
        return GeometryCollectionProxy::class;
    }
}
