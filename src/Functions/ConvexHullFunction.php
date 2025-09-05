<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Functions;

/**
 * ConvexHull() function.
 */
class ConvexHullFunction extends AbstractFunction
{
    protected function getSqlFunctionName() : string
    {
        return 'ST_ConvexHull';
    }

    protected function getParameterCount() : int
    {
        return 1;
    }
}
