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
 * InlineArgsArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 */
class InlineArgsArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol('')
            ->setNbSpaces(0)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',')
            ->setStartSymbol('[')
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(false)
            ->setShowKeysMode('auto');
    }


}
