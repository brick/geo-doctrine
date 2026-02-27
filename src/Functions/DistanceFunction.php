<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Distance() function.
 */
class DistanceFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Distance';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
