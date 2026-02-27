<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Simplify() function.
 */
class SimplifyFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Simplify';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
