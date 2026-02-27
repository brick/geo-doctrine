<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Types;

use Brick\Geo\Proxy\MultiLineStringProxy;
use Override;

/**
 * Doctrine type for MultiLineString.
 */
final class MultiLineStringType extends GeometryType
{
    #[Override]
    protected function getGeometryName(): string
    {
        return 'MultiLineString';
    }

    #[Override]
    protected function getProxyClassName(): string
    {
        return MultiLineStringProxy::class;
    }

    #[Override]
    protected function hasKnownSubclasses(): bool
    {
        return false;
    }
}
