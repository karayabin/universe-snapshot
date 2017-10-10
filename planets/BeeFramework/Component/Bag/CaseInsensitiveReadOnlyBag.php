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
 * CaseInsensitiveReadOnlyBag
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class CaseInsensitiveReadOnlyBag extends ReadOnlyBag implements CaseInsensitiveReadOnlyBagInterface
{

    public function __construct(array $items = [])
    {
        $ciItems = [];
        foreach ($items as $k => $v) {
            $ciItems[strtolower($k)] = $v;
        }
        parent::__construct($ciItems);
    }

    public function has($name)
    {
        return parent::has($this->toCaseInsensitive($name));
    }

    public function get($name, $default = null)
    {
        return parent::get($this->toCaseInsensitive($name), $default);
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function toCaseInsensitive($str)
    {
        return strtolower($str);
    }
}
