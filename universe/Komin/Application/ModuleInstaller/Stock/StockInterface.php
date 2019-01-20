<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Application\ModuleInstaller\Stock;

/**
 * StockInterface
 * @author Lingtalfi
 * 2015-05-04
 *
 */
interface StockInterface
{

    public function isInstalled($moduleCanonicalName);
}
