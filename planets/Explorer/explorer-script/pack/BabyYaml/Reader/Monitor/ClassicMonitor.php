<?php

namespace BabyYaml\Reader\Monitor;
use BabyYaml\Reader\MiniMl\Tool\MiniMlTool;


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
