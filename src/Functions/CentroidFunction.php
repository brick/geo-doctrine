<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Centroid() function.
 */
class CentroidFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Centroid';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
