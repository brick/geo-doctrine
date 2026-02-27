<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Relate() function.
 */
class RelateFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Relate';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 3;
    }
}
