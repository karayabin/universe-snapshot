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
 * PhpFunctionArgsArrayToStringSymbolManager
 * @author Lingtalfi
 * 2015-10-27
 *
 *
 */
class PhpFunctionArgsArrayToStringSymbolManager extends SpaceIndentedArrayToStringSymbolManager
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->setNbSpaces(4)
            ->setKvSepSymbol(' => ')
            ->setLineSepSymbol(',' . PHP_EOL)
            ->setSpaceSymbol(' ')
            ->setShowKeysMode(function ($level) {
                if (1 === $level) {
                    return false;
                }
                return true;
            })
            ->setUseLineSepOnLastLine(function ($level, $k, $v, $array) {
                if (1 === $level) {
                    return false;
                }
                return true;
            })
            ->setStartSymbol(function ($level) {
                if (1 === $level) {
                    return '';
                }
                return '[' . PHP_EOL;
            })
            ->setEndSymbol(function ($level) {
                if (1 === $level) {
                    return PHP_EOL;
                }
                return ']';
            });
    }

}
