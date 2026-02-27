<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Intersects() function.
 */
final class IntersectsFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Intersects';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
