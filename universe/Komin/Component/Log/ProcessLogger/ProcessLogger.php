<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ProcessLogger;

use BeeFramework\Bat\StringTool;
use Komin\Notation\String\MiniMl\Tool\MiniMlTool;


/**
 * ProcessLogger
 * @author Lingtalfi
 * 2015-05-21
 *
 * In this implementation, we can set up listeners.
 * A listener is a callable
 *
 *          callable ( $level, $message, array $context, &$stopPropagation=false )
 *
 *
 */
class ProcessLogger implements ProcessLoggerInterface
{

    private $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS ProcessLoggerInterface
    //------------------------------------------------------------------------------/
    public function log($level, $message, array $context = [])
    {
        $message = $this->formatMessage($message, $context);
        $stopPropagation = false;
        foreach ($this->listeners as $listener) {
            call_user_func_array($listener, [$level, $message, $context, &$stopPropagation]);
            if (true === $stopPropagation) {
                break;
            }
        }
        return $this;
    }

    public function debug($message, array $context = [])
    {
        return $this->log('debug', $message, $context);
    }

    public function notice($message, array $context = [])
    {
        return $this->log('notice', $message, $context);
    }

    public function warning($message, array $context = [])
    {
        return $this->log('warning', $message, $context);
    }

    public function error($message, array $context = [])
    {
        return $this->log('error', $message, $context);
    }

    public function critical($message, array $context = [])
    {
        return $this->log('critical', $message, $context);
    }

    public function success($message, array $context = [])
    {
        return $this->log('success', $message, $context);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setListener(callable $callable, $index = null)
    {
        if (null === $index) {
            $this->listeners[] = $callable;
        }
        else {
            $this->listeners[$index] = $callable;
        }
        return $this;
    }

    public function setListeners(array $listeners)
    {
        foreach ($listeners as $k => $v) {
            $this->setListener($v, $k);
        }
        return $this;
    }

    public function unsetListener($index)
    {
        unset($this->listeners[$index]);
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function formatMessage($string, array $context)
    {
        return StringTool::parseTags($string, $context);
    }
}
