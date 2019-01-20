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
 * DebugStock
 * @author Lingtalfi
 * 2015-05-04
 *
 */
class DebugStock implements StockInterface
{

    private $isInstalledReturn;
    private $cr;

    public function __construct($isInstalledReturn = true, $cr = "\n")
    {
        $this->isInstalledReturn = $isInstalledReturn;
        $this->cr = $cr;
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS StockInterface
    //------------------------------------------------------------------------------/
    public function isInstalled($moduleCanonicalName)
    {
        $s = 'true';
        if (false === $this->isInstalledReturn) {
            $s = 'false';
        }
//        echo "DebugStock::isInstalled($moduleCanonicalName)=$s" . $this->cr;
        return $this->isInstalledReturn;
    }
}
