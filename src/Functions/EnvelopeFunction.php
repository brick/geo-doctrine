<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

use Override;

/**
 * Envelope() function.
 */
class EnvelopeFunction extends AbstractFunction
{
    #[Override]
    protected function getSqlFunctionName(): string
    {
        return 'ST_Envelope';
    }

    #[Override]
    protected function getParameterCount(): int
    {
        return 1;
    }
}
