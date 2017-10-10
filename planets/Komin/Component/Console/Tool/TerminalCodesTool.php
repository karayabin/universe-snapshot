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


/**
 * AnsiEscapeCodeTool
 * @author Lingtalfi
 * 2015-03-11
 *
 * http://ascii-table.com/ansi-escape-sequences.php
 * http://ascii-table.com/ansi-escape-sequences-vt-100.php
 * http://wiki.bash-hackers.org/scripting/terminalcodes
 *
 *
 * A useful handset of ansi escape sequences and other ansi chars.
 * All comments are my personal comments, from experience on a mac osX default terminal.
 *
 */
class TerminalCodesTool
{


    //------------------------------------------------------------------------------/
    // MOVING
    //------------------------------------------------------------------------------/
    public static function cursorPosition($column = 0, $row = 0, $return = false)
    {
        $row = (int)$row;
        $column = (int)$column;
        // terminal does not handle negative values well, so let's fix that here
        if ($row < 1) {
            $row = 1;
        }
        if ($column < 1) {
            $column = 1;
        }
        $r = "\033[" . $row . ';' . $column . 'H';
        return self::handleSequence($r, $return);
    }


    public static function cursorUp($count = 1, $return = false)
    {
        $count = (int)$count;
        $r = "\033[" . $count . 'A';
        return self::handleSequence($r, $return);
    }

    public static function cursorDown($count = 1, $return = false)
    {
        $count = (int)$count;
        $r = "\033[" . $count . 'B';
        return self::handleSequence($r, $return);
    }


    public static function cursorRight($count = 1, $return = false)
    {
        $count = (int)$count;
        $r = "\033[" . $count . 'C';
        return self::handleSequence($r, $return);
    }

    public static function cursorLeft($count = 1, $return = false)
    {
        $count = (int)$count;
        $r = "\033[" . $count . 'D';
        return self::handleSequence($r, $return);
    }


    public static function cursorBottomLeft($return = false)
    {
        return self::cursorPosition(1000, 0, $return);
    }

    public static function cursorBottomRight($return = false)
    {
        return self::cursorPosition(1000, 1000, $return);
    }

    public static function cursorTopLeft($return = false)
    {
        return self::cursorPosition(0, 0, $return);
    }

    public static function cursorTopRight($return = false)
    {
        return self::cursorPosition(0, 1000, $return);
    }

    public static function moveToNextLine($repeat = 1, $return = false)
    {
        $r = str_repeat("\033E", $repeat);
        return self::handleSequence($r, $return);
    }


    //------------------------------------------------------------------------------/
    // SCROLLS
    //------------------------------------------------------------------------------/
    public static function scrollWindowUp($nbLines = 1, $return = false)
    {
        $r = str_repeat("\033M", $nbLines);
        return self::handleSequence($r, $return);
    }

    public static function scrollWindowDown($nbLines = 1, $return = false)
    {
        $r = str_repeat("\033D", $nbLines);
        return self::handleSequence($r, $return);
    }




    //------------------------------------------------------------------------------/
    // MISC
    //------------------------------------------------------------------------------/
    public static function saveCursorPositionAndAttributes($return = false)
    {
        $r = "\0337";
        return self::handleSequence($r, $return);
    }

    public static function restoreCursorPositionAndAttributes($return = false)
    {
        $r = "\0338";
        return self::handleSequence($r, $return);
    }


    public static function clearTextFormatting($return = false)
    {
        $r = "\033[0m";
        return self::handleSequence($r, $return);
    }


    public static function bell($repeat = 1, $return = false)
    {
        $r = str_repeat("\007", $repeat);
        return self::handleSequence($r, $return);
    }

    /**
     * Reset terminal to initial state
     */
    public static function reset($return = false)
    {
        $r = "\033c";
        return self::handleSequence($r, $return);
    }


    //------------------------------------------------------------------------------/
    // CLEARS
    //------------------------------------------------------------------------------/
    public static function clearLineFromCursorRight($return = false)
    {
        $r = "\033[K";
        return self::handleSequence($r, $return);
    }

    public static function clearLineFromCursorLeft($return = false)
    {
        $r = "\033[1K";
        return self::handleSequence($r, $return);
    }

    public static function clearLine($gotoBegin = true, $return = false)
    {
        $r = "\033[2K";
        if (true === $gotoBegin) {
            $r .= self::cursorLeft(1000, true);
        }
        return self::handleSequence($r, $return);
    }

    public static function clearScreenFromCursorDown($return = false)
    {
        $r = "\033[J";
        return self::handleSequence($r, $return);
    }

    public static function clearScreenFromCursorUp($return = false)
    {
        $r = "\033[1J";
        return self::handleSequence($r, $return);
    }

    public static function clearScreen($return = false)
    {
        $r = "\033[2J";
        return self::handleSequence($r, $return);
    }

    /**
     * This is destructive
     */
    public static function blankScreen($return = false)
    {
        // this clears the scroll back buffer
        // http://stackoverflow.com/questions/6036829/clear-scrollback-buffer-of-linux-virtual-console-terminals
        $r = "\033[3J";
        // and now we delete all lines from the bottom up
        for ($i = 1; $i < 100; $i++) {
            $r .= self::clearLine(true, true);
            $r .= self::cursorUp(1, true);
        }
        return self::handleSequence($r, $return);
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected static function handleSequence($seq, $return)
    {
        if (false === $return) {
            echo $seq;
        }
        else {
            return $seq;
        }
    }

}
