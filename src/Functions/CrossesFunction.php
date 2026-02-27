<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Crosses() function.
 */
final class CrossesFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Crosses';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
