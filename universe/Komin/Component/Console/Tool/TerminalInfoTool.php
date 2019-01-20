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
use BeeFramework\Bat\MachineTool;


/**
 * AnsiEscapeCodeTool
 * @author Lingtalfi
 * 2015-03-11
 *
 * 
 */
class TerminalInfoTool
{

    public static function getTerminalWidth($default = 80)
    {

        if (true === MachineTool::hasProgram('tput')) {
            return (int)exec("tput cols");
        }
        return (int)$default;
    }

    public static function getTerminalHeight($default = 24)
    {

        if (true === MachineTool::hasProgram('tput')) {
            return (int)exec("tput lines");
        }
        return (int)$default;
    }

    /**
     * @return array:
     *
     * - 0: the x coordinate
     * - 1: the y coordinate
     */
    public static function getCurrentPosition()
    {
        $ret = [0, 0];
        $sttyMode = shell_exec(sprintf('stty -g'));
        shell_exec('stty -icanon -echo');
        if (false !== $stdin = fopen('php://stdin', 'r+')) {
            fwrite($stdin, "\033[6n");
            $reportCursorPosition = fread($stdin, 100);
//            fclose($stdin);
            $x = substr($reportCursorPosition, 2, -1);
            $p = explode(';', $x, 2);
            if (2 === count($p)) {
                $ret = [$p[1], $p[0]];
            }
        }
        shell_exec(sprintf('stty %s', $sttyMode));
        return $ret;
    }
}
