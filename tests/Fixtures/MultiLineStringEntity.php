<?php

declare(strict_types=1);

namespace Brick\Geo\Doctrine\Tests\Fixtures;

use Brick\Geo\MultiLineString;

/**
 * @Entity
 * @Table(name="multilinestrings")
 */
class MultiLineStringEntity
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @Column(type="MultiLineString")
     */
    private MultiLineString $multiLineString;

    public function getMultiLineString() : MultiLineString
    {
        return $this->multiLineString;
    }

    public function setMultiLineString(MultiLineString $multiLineString) : void
    {
        $this->multiLineString = $multiLineString;
    }
}
