<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\LineStringProxy;
use Override;

/**
 * Doctrine type for LineString.
 */
class LineStringType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'LineString';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return LineStringProxy::class;
    }

    #[Override]
    protected function hasKnownSubclasses(): bool
    {
        return false;
    }
}
