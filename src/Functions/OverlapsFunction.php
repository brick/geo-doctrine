<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Overlaps() function.
 */
class OverlapsFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Overlaps';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
