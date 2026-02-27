<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\PolygonProxy;
use Override;

/**
 * Doctrine type for Polygon.
 */
final class PolygonType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'Polygon';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return PolygonProxy::class;
    }
}
