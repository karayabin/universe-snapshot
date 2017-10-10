<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace BeeFramework\Component\Bag;

use BeeFramework\Bat\BdotTool;


/**
 * BdotBag
 * @author Lingtalfi
 * 2015-05-20
 *
 */
class BdotBag implements BagInterface
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS BagInterface
    //------------------------------------------------------------------------------/
    public function has($name)
    {
        $found = false;
        BdotTool::getDotValue($name, $this->items, null, $found);
        return $found;
    }

    public function get($name, $default = null)
    {
        return BdotTool::getDotValue($name, $this->items, $default);
    }

    public function all()
    {
        return $this->items;
    }

    public function set($name, $value)
    {
        BdotTool::setDotValue($name, $value, $this->items);
        return $this;
    }

    public function setAll(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function remove($name)
    {
        BdotTool::unsetDotValue($name, $this->items);
        return $this;
    }


}
