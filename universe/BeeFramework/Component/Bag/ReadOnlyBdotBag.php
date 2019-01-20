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
 * ReadOnlyBdotBag
 * @author Lingtalfi
 * 2015-05-20
 *
 */
class ReadOnlyBdotBag implements ReadOnlyBagInterface
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


}
