<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger;

use Komin\Component\Log\ExceptionLogger\Listener\ExceptionListenerInterface;


/**
 * ExceptionLogger
 * @author Lingtalfi
 * 2015-25-05
 *
 */
class ExceptionLogger implements ExceptionLoggerInterface
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
    // IMPLEMENTS ExceptionLoggerInterface
    //------------------------------------------------------------------------------/
    public function log(\Exception $e)
    {
        $listeners = $this->listeners;
        $this->filterListeners($listeners, $e);
        
        
        foreach ($listeners as $listener) {
            $stopProp = false;
            /**
             * @var ExceptionListenerInterface $listener
             */
            $listener->listen($e, $stopProp);
            if (true === $stopProp) {
                break;
            }
        }
    }

    public function setListener(ExceptionListenerInterface $listener, $index = null)
    {
        if (null === $index) {
            $this->listeners[] = $listener;
        }
        else {
            $this->listeners[$index] = $listener;
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

    public function unsetListeners()
    {
        $this->listeners = [];
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * (opportunity for concrete classes to select which listeners should be used)
     */
    protected function filterListeners(&$listeners, \Exception $e)
    {

    }

    /**
     * @return ExceptionListenerInterface
     */
    protected function getListener($name)
    {
        if (array_key_exists($name, $this->listeners)) {
            return $this->listeners[$name];
        }
        throw new \RuntimeException("Listener not found: $name");
    }
}
