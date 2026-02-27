<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\MultiPolygonProxy;
use Override;

/**
 * Doctrine type for MultiPolygon.
 */
final class MultiPolygonType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'MultiPolygon';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return MultiPolygonProxy::class;
    }

    #[Override]
    protected function hasKnownSubclasses(): bool
    {
        return false;
    }
}
