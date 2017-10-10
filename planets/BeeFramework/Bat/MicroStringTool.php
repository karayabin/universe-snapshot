<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * MicroStringTool
 * @author Lingtalfi
 * 2015-02-28
 *
 *
 */
class MicroStringTool
{


    /**
     * @return false|int,
     *                  returns false in case of failure
     *                  returns the "absolute" position of the symbol only if it is the first non blank thing in
     *                      the portion of line starting at $pos.
     */
    public static function getNextNonBlankSymbolPos($line, $pos, $symbol)
    {
        if (0 === $pos) {
            $sub = $line;
        }
        else {
            $sub = substr($line, $pos);
        }

        if (false !== $symPos = strpos($sub, $symbol)) {
            $prefix = substr($sub, 0, $symPos);
            if ('' === trim($prefix)) {
                return $pos + $symPos;
            }
        }
        return false;
    }

}
