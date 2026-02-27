<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Equals() function.
 */
final class EqualsFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Equals';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
