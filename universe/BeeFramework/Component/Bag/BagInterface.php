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
 * BagInterface
 * @author Lingtalfi
 * 2015-05-20
 *
 */
interface BagInterface
{

    public function has($name);

    public function get($name, $default = null);

    public function all();

    public function set($name, $value);

    public function setAll(array $parameters);

    public function remove($name);
}
