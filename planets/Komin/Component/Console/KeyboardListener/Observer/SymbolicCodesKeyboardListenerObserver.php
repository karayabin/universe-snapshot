<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer;

use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\SymbolicCodeObserverInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool\SymbolicCodeTool;


/**
 * SymbolicCodesKeyboardListenerObserver
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class SymbolicCodesKeyboardListenerObserver implements KeyboardListenerObserverInterface
{

    private $observers;
    private $codeMap;

    public function __construct()
    {
        $this->observers = [];
    }


    public static function create()
    {
        return new static();
    }


    public function notify($string, KeyboardListenerInterface $keyboardListener, $fromRead = true)
    {
        $code = $this->getCode($string, $fromRead);
        foreach ($this->observers as $observer) {
            if ($observer instanceof SymbolicCodeObserverInterface) {
                $observer->notify($code, $string, $keyboardListener, $fromRead);
            }
            else {
                call_user_func($observer, $code, $string, $keyboardListener, $fromRead);
            }
        }
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setObserver($observer, $index = null)
    {
        if (
            $observer instanceof SymbolicCodeObserverInterface ||
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
            throw new \InvalidArgumentException(sprintf("observer parameter must be a SymbolicCodeObserverInterface or a callable, %s given", gettype($observer)));
        }
        ksort($this->observers);
        return $this;
    }

    /**
     * @param array $codeMap
     *                      charSequence => code
     */
    public function setCodeMap(array $codeMap)
    {
        $this->codeMap = $codeMap;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function getCode($string, $fromRead)
    {
        if (null === $this->codeMap) {
            $this->codeMap = $this->getDefaultCodeMap();
        }
        $cSlashKey = trim(addcslashes($string, "\0..\37!@\177..\377"));
        if (array_key_exists($cSlashKey, $this->codeMap)) {
            return $this->codeMap[$cSlashKey];
        }
        return $string;
    }

    private function getDefaultCodeMap()
    {
        return SymbolicCodeTool::getMacCodeMap();
    }
}
