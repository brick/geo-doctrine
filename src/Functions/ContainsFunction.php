<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Contains() function.
 */
final class ContainsFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Contains';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
