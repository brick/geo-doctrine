<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * PointOnSurface() function.
 */
final class PointOnSurfaceFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_PointOnSurface';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
