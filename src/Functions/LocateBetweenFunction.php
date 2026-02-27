<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * LocateBetween() function.
 */
class LocateBetweenFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_LocateBetween';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 3;
    }
}
