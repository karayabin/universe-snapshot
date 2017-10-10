<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Tool;

use BeeFramework\Bat\ArrayTool;


/**
 * ColumnsTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class ColumnsTool
{


    /**
     * Quick method to display a list of items in columns.
     * I tried this method with a list of 12000 more first names, and it all fit
     * very well in the terminal (just a few scroll strokes are necessary to get down to the bottom of the list,
     * which was very pleasant to me).
     */
    public static function renderInColumns(array $items, $safePaddingLen = 1)
    {
        $highestLen = 0;
        foreach ($items as $k => $item) {
            $item = trim($item);
            $items[$k] = $item;
            $len = mb_strlen($item);
            if ($len > $highestLen) {
                $highestLen = $len;
            }
        }
        /**
         * Adding a safe padding
         */
        $highestLen += $safePaddingLen;


        $w = TerminalInfoTool::getTerminalWidth();
        $nbCols = (int)floor($w / $highestLen);
        $slices = ArrayTool::slice($items, $nbCols);
        $firstSlice = $slices[0];
        $padType = STR_PAD_RIGHT;
        $msg = '';
        $n = count($firstSlice);
        for ($i = 0; $i < $n; $i++) {
            foreach ($slices as $slice) {
                if (array_key_exists($i, $slice)) {
                    $s = $slice[$i];
                }
                else {
                    $s = '';
                }
                $msg .= str_pad($s, $highestLen, ' ', $padType);
            }
            $msg .= PHP_EOL;
        }
        return $msg;
    }
}
