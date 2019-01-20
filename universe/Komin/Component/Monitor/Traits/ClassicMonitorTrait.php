<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Monitor\Traits;

use BeeFramework\Bat\VarTool;
use Komin\Component\Monitor\ClassicMonitor;
use Komin\Component\Monitor\VoidMonitor;


/**
 * ClassicMonitorTrait
 * @author Lingtalfi
 * 2015-05-07
 *
 * The different styles are as following, for a debug message:
 *
 * - a: <tag>DEBUG</tag>: the debug message
 * - b: <tag>DEBUG: the debug message</tag>
 * - c: <tag>the debug message</tag>
 *
 * Default is a.
 *
 *
 */
trait ClassicMonitorTrait
{

    /**
     * @var ClassicMonitor
     */
    private $_monitor;
    private $_monitorMsgPrefix;

    protected function switchPowerButton($on = true)
    {
        if (0 === (int)$on) {
            $this->_monitor = new VoidMonitor();
        }
        else {
            $this->_monitor = new ClassicMonitor();
        }
        $this->_monitorMsgPrefix = '';
        return $this;
    }

//    protected function switchMonitorFormat($name)
//    {
//        if (method_exists($this->_getMonitor(), 'switchFormat')) {
//            $this->_getMonitor()->switchFormat($name);
//        }
//        return $this;
//    }

    protected function setMonitorMessagePrefix($m)
    {
        $this->_monitorMsgPrefix = $m;
    }

    protected function say($msg, $tags = null)
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, null, null), $tags);
    }

    protected function notice($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'notice', $style), $tags);
    }

    protected function info($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'info', $style), $tags);
    }

    protected function success($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'success', $style), $tags);
    }

    protected function error($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'error', $style), $tags);
    }

    protected function debug($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'debug', $style), $tags);
    }

    protected function critical($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'critical', $style), $tags);
    }

    protected function warning($msg, $tags = null, $style = 'a')
    {
        $this->_getMonitor()->say($this->_formatMessage($msg, 'warning', $style), $tags);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return ClassicMonitor
     */
    private function _getMonitor()
    {
        if (null === $this->_monitor) {
            $this->_monitor = new ClassicMonitor();
        }
        return $this->_monitor;
    }


    private function _formatMessage($msg, $tag, $style)
    {
        if (!is_string($msg)) {
            $msg = VarTool::toString($msg, ['details' => true]);
        }

        $msg = $this->_monitorMsgPrefix . $msg;
        if (null === $tag) {
            return $msg;
        }

        if ('a' === $style) {
            $msg = "<$tag>" . strtoupper($tag) . "</$tag>: $msg";
        }
        elseif ('b' === $style) {
            $msg = "<$tag>" . strtoupper($tag) . ": $msg</$tag>";
        }
        elseif ('c' === $style) {
            $msg = "<$tag>$msg</$tag>";
        }
        else {
            throw new \RuntimeException("Unknown style: $style");
        }
        return $msg;
    }
}
