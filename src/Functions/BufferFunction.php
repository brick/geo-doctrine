<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Buffer() function.
 */
final class BufferFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Buffer';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 2;
    }
}
