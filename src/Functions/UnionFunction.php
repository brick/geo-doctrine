<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Union() function.
 */
final class UnionFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Union';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
