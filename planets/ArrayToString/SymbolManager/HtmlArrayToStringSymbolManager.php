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
 * HtmlArrayToStringSymbolManager
 * @author Lingtalfi
 * 2015-10-27
 *
 *
 */
class HtmlArrayToStringSymbolManager extends SpaceIndentedArrayToStringSymbolManager
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->setSpaceSymbol('&nbsp;')
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',<br>')
            ->setStartSymbol('[<br>')
            ->setEndSymbol(']')
            ->setUseLineSepOnLastLine(true)
            ->setShowKeysMode('auto');
    }

}
