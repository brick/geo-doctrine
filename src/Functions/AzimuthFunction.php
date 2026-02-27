<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Azimuth() function.
 */
final class AzimuthFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Azimuth';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
