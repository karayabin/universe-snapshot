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
 * HtmlArrayExportUtilSymbolsManager
 * @author Lingtalfi
 * 2015-05-27
 *
 *
 */
class HtmlArrayExportUtilSymbolsManager extends SpaceIndentedArrayExportUtilSymbolsManager
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol('&nbsp;')
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',<br' . '>')
            ->setStartSymbol('[<br' . '>')
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }


}
