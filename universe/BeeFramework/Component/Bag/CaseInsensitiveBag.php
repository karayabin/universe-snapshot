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
 * CaseInsensitiveBag
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class CaseInsensitiveBag extends Bag implements CaseInsensitiveBagInterface
{

    //------------------------------------------------------------------------------/
    // IMPLEMENTS BagInterface
    //------------------------------------------------------------------------------/
    public function has($name)
    {
        return parent::has($this->toCaseInsensitive($name));
    }

    public function get($name, $default = null)
    {
        return parent::get($this->toCaseInsensitive($name), $default);
    }

    public function set($name, $value)
    {
        return parent::set($this->toCaseInsensitive($name), $value);
    }

    public function setAll(array $items)
    {
        $ciItems = [];
        foreach ($items as $k => $v) {
            $ciItems[strtolower($k)] = $v;
        }
        return parent::setAll($ciItems);
    }

    public function remove($name)
    {
        return parent::remove($this->toCaseInsensitive($name));
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function toCaseInsensitive($str)
    {
        return strtolower($str);
    }

}
