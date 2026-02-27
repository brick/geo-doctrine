<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * IsSimple() function.
 */
final class IsSimpleFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_IsSimple';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
