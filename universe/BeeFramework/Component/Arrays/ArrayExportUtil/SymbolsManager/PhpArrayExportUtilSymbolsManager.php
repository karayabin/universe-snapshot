<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Arrays\ArrayExportUtil\SymbolsManager;


/**
 * PhpArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class PhpArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol(' ')
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',' . PHP_EOL)
            ->setStartSymbol('[' . PHP_EOL)
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }


}
