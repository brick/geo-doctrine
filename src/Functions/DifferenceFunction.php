<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Difference() function.
 */
class DifferenceFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Difference';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
