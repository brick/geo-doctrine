<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\PointProxy;
use Override;

/**
 * Doctrine type for Point.
 */
final class PointType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'Point';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return PointProxy::class;
    }

    #[Override]
    protected function hasKnownSubclasses(): bool
    {
        return false;
    }
}
