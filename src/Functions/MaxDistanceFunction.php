<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * MaxDistance() function.
 */
final class MaxDistanceFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_MaxDistance';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
