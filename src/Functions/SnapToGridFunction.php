<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * SnapToGrid() function.
 */
final class SnapToGridFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_SnapToGrid';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
