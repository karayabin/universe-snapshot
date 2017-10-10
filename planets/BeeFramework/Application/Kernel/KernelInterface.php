<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Application\Kernel;


/**
 * KernelInterface
 * @author Lingtalfi
 * 2014-08-21
 *
 */
interface KernelInterface
{

    public function boot();

    public function getOption($key, $defaultValue = null);

    public function getOptions();

    public function setOption($key, $value);
}
