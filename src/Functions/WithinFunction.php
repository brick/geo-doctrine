<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Within() function.
 */
class WithinFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Within';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
