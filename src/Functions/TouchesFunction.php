<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Touches() function.
 */
class TouchesFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Touches';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
