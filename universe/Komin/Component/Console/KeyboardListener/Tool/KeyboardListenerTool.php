<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Tool;
use BeeFramework\Bat\MachineTool;


/**
 * KeyboardListenerTool
 * @author Lingtalfi
 * 2015-05-08
 *
 */
class KeyboardListenerTool
{

    public static function safeStty()
    {
        if (true === MachineTool::hasProgram('stty')) {
            $sttyMode = shell_exec(sprintf('stty -g'));
            shell_exec('stty -icanon -echo');
            register_shutdown_function(function () use ($sttyMode) {
                shell_exec(sprintf('stty %s', $sttyMode));
            });
        }

    }
}
