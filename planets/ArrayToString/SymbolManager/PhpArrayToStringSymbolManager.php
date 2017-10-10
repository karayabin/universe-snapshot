<?php

/*
 * This file is part of the Bee package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArrayToString\SymbolManager;


/**
 * PhpArrayToStringSymbolManager
 * @author Lingtalfi
 * 2015-10-27
 *
 *
 */
class PhpArrayToStringSymbolManager extends SpaceIndentedArrayToStringSymbolManager
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol(' ')
            ->setNbSpaces(4)
            ->setOffset(0)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',' . PHP_EOL)
            ->setStartSymbol('[' . PHP_EOL)
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }


}
