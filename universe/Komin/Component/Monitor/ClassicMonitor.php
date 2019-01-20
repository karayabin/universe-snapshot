<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Monitor;
use Komin\Notation\String\MiniMl\Tool\MiniMlTool;


/**
 * ClassicMonitor
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class ClassicMonitor extends Monitor
{
    
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getFormattedMessage($msg, $tags = null)
    {
        $ret = MiniMlTool::format($msg);
        return $ret;
    }
}
