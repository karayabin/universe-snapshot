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
 * ReadOnlyBag
 * @author Lingtalfi
 * 2015-06-01
 *
 */
class ReadOnlyBag implements ReadOnlyBagInterface
{
    private $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
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


}
