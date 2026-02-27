<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * LocateAlong() function.
 */
final class LocateAlongFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_LocateAlong';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
