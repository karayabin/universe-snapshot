<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener;

use BeeFramework\Bat\MachineTool;
use Komin\Component\Console\KeyboardListener\Observer\KeyboardListenerObserverInterface;


/**
 * KeyboardListener
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class KeyboardListener implements KeyboardListenerInterface
{

    private $sttyMode;
    private $observers;
    private $listenFlag;
    /**
     * Sometimes, you don't have a human user to test your object.
     * In such cases, you might want to use automatedInputs.
     * Note: you can use either manual mode, or automated mode, but not both
     * at the same time.
     * AutomatedInputs was added for testing purposes.
     */
    public static $automatedInputs = [];

    public function __construct()
    {
        $this->observers = [];
        $this->listenFlag = false;
    }





    //------------------------------------------------------------------------------/
    // IMPLEMENTS KeyboardListenerInterface
    //------------------------------------------------------------------------------/
    public function listen()
    {
        $this->listenFlag = true;
        $this->_up();
        try {
            $s = STDIN;


            // this is a hack to allow some observer to display their 
            // prompt BEFORE something is really typed (sorry...)
            // we might call that the initial burst
            $this->runObservers('', true);


            // now this is the original code...
            while (!feof($s)) {
                if (self::$automatedInputs) {
                    $c = array_shift(self::$automatedInputs);
                }
                else {
                    $c = fread($s, 8192);
                }
                $this->runObservers($c, true);
                if (false === $this->listenFlag) {
                    break;
                }
            }


        } catch (\Exception $e) {
            $this->_down();
            throw $e;
        }
        $this->_down();
    }

    public function write($expression)
    {
        fwrite(STDIN, $expression);
        $this->runObservers($expression, false);
    }

    public function setObserver($observer, $index = null)
    {
        if (
            $observer instanceof KeyboardListenerObserverInterface ||
            is_callable($observer)
        ) {
            if (null === $index) {
                $this->observers[] = $observer;
            }
            else {
                $this->observers[$index] = $observer;
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("observer parameter must be a KeyboardListenerObserverInterface or a callable, %s given", gettype($observer)));
        }
        ksort($this->observers);
        return $this;
    }

    public function stopListening()
    {
        $this->listenFlag = false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function _up()
    {
        if (true === MachineTool::hasProgram('stty')) {
            $this->sttyMode = shell_exec(sprintf('stty -g'));
            shell_exec('stty -icanon -echo');
        }
        else {
            throw new \RuntimeException("Program stty is not available on this machine: cannot run the keyboard listener");
        }
    }

    private function _down()
    {
        shell_exec(sprintf('stty %s', $this->sttyMode));
    }

    private function runObservers($expression, $fromRead)
    {
        foreach ($this->observers as $observer) {
            if ($observer instanceof KeyboardListenerObserverInterface) {
                $observer->notify($expression, $this, $fromRead);
            }
            else {
                call_user_func($observer, $expression, $this, $fromRead);
            }
        }

    }
}
