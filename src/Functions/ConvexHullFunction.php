<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * ConvexHull() function.
 */
class ConvexHullFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_ConvexHull';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
