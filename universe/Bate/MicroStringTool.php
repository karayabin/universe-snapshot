<?php

namespace Bate;

/*
 * LingTalfi 2015-12-01
 */

use Bat\StringTool;

class MicroStringTool
{



    /**
     * Read the (assumed) utf-8 string from the given position,
     * and skip the blanks (space or tab).
     * The given position is updated.
     */
    public static function skipBlanks($string, &$pos)
    {
        $chars = StringTool::split($string);
        while (isset($chars[$pos])) {
            $char = $chars[$pos];
            if (
                ' ' === $char ||
                "\t" === $char
            ) {
                $pos++;
            } else {
                break;
            }
        }
    }
}
