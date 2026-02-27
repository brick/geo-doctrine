<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\MultiPointProxy;
use Override;

/**
 * Doctrine type for MultiPoint.
 */
final class MultiPointType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'MultiPoint';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return MultiPointProxy::class;
    }

    #[Override]
    protected function hasKnownSubclasses(): bool
    {
        return false;
    }
}
