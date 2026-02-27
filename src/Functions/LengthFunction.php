<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Length() function.
 */
class LengthFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Length';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
