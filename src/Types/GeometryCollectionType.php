<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\GeometryCollectionProxy;
use Override;

/**
 * Doctrine type for GeometryCollection.
 */
final class GeometryCollectionType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'GeometryCollection';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return GeometryCollectionProxy::class;
    }
}
