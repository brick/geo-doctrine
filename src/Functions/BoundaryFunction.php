<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Boundary() function.
 */
class BoundaryFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Boundary';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
