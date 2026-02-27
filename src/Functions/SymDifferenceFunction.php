<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * SymDifference() function.
 */
final class SymDifferenceFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_SymDifference';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
