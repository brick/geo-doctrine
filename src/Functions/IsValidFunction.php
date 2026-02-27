<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * IsValid() function.
 */
class IsValidFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_IsValid';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
