<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * IsClosed() function.
 */
final class IsClosedFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_IsClosed';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
