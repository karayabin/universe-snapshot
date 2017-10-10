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


/**
 * Bag
 * @author Lingtalfi
 * 2015-06-03
 *
 */
class Bag implements BagInterface
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
        return (array_key_exists($name, $this->items));
    }

    public function get($name, $default = null)
    {
        if (array_key_exists($name, $this->items)) {
            return $this->items[$name];
        }
        return $default;
    }

    public function all()
    {
        return $this->items;
    }

    public function set($name, $value)
    {
        $this->items[$name] = $value;
        return $this;
    }

    public function setAll(array $items)
    {
        $this->items = $items;
        return $this;
    }

    public function remove($name)
    {
        unset($this->items[$name]);
        return $this;
    }


}
