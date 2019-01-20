<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool;


/**
 * SymbolicCodeTool
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class SymbolicCodeTool
{

    public static function getMacCodeMap()
    {
        /**
         * Mac set for french keyboard
         * model A1243
         * Id: 0x8403
         * Version: 98.33
         *
         * I've found some problems with implementation of combinations of control modifier and another key,
         * that's why this map does not contain all combinations
         *
         */
        return [
            '\033' => 'escape',
            '\033[3~' => 'suppr',
            '\177' => 'delete',
            '\t' => 'tab',
            '\n' => 'return',
            '\033[A' => 'up',
            '\033[B' => 'down',
            '\033[C' => 'right',
            '\033[D' => 'left',

            '\033[Z' => 's+tab',

            // controls
            '\000' => 'c+@',
            '\001' => 'c+a',
            '\005' => 'c+e',
            '\022' => 'c+r',
            '\024' => 'c+t',
            '\025' => 'c+u',
            '\020' => 'c+p',
            '\004' => 'c+d',
            '\006' => 'c+f',
            '\a' => 'c+g',
            '\b' => 'c+h',
            '\v' => 'c+k',
            '\f' => 'c+l',
            '\027' => 'c+w',
            '\030' => 'c+x',
            '\002' => 'c+b',
            '\016' => 'c+n',


            // functions
            '\033OP' => 'f1',
            '\033OQ' => 'f2',
            '\033OR' => 'f3',
            '\033OS' => 'f4',
            '\033[15~' => 'f5',
            '\033[17~' => 'f6',
            '\033[18~' => 'f7',
            '\033[19~' => 'f8',
            '\033[20~' => 'f9',
            '\033[21~' => 'f10',
            '\033[23~' => 'f11',
            '\033[24~' => 'f12',
        ];
    }
}
