<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ElementInstallerOld\Stock;

/**
 * StockInterface
 * @author Lingtalfi
 * 2015-04-20
 *
 */
interface StockInterface
{

    public function isInstalled($type, $name, $version);
}
