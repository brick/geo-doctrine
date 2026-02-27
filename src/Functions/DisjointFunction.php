<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Disjoint() function.
 */
final class DisjointFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Disjoint';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
