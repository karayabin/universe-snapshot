<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\Dialog\Tool;

use Komin\Component\Console\Dialog\DialogInterface;


/**
 * DialogRepeaterTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class DialogRepeaterTool
{

    /**
     * A basic validator tool for DialogInterface.
     * 
     * 
     * @param DialogInterface $dialog
     * @param callable $isValid
     *                          bool callable ( userInput )
     * @param string|callable $errMsg
     *                      The error message to display if the user input is not valid.
     *                      If it's a callable:
     *                                      string  callable ( userInput, n )
     *                                                     - userInput: the user input
     *                                                     - n: the number of the repetition, starting at 1.
     * 
     * 
     * @return mixed, a valid user answer
     */
    public static function repeatToValid(DialogInterface $dialog, $isValid, $errMsg)
    {
        $r = null;
        $n = 1;
        $r = $dialog->execute();
        while (false === call_user_func($isValid, $r)) {
            if (is_string($errMsg)) {
                echo $errMsg;
            }
            elseif (is_callable($errMsg)) {
                echo call_user_func($errMsg, $r, $n);
            }
            
            $r = $dialog->execute();
            $n++;
        }
        return $r;
    }
}
