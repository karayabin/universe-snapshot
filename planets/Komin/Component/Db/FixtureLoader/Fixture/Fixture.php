<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Db\FixtureLoader\Fixture;


/**
 * Fixture
 * @author Lingtalfi
 * 2015-05-30
 *
 */
class Fixture implements FixtureInterface
{

    private $target;
    private $data;

    public function __construct()
    {
        $this->target = '';
        $this->data = [];
    }


    public static function create()
    {
        return new static();
    }
    //------------------------------------------------------------------------------/
    // IMPLEMENTS FixtureInterface
    //------------------------------------------------------------------------------/
    public function getData()
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }


}
