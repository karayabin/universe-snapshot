<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver;

use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;


/**
 * EditableLineSymbolicCodeObserver
 * @author Lingtalfi
 * 2015-05-07
 *
 *
 * Difference between pre and post events is that pre events are executed BEFORE the editableLine
 * is filled with the user input,
 * whereas the postEvent is executed AFTER.
 *
 * Generally, you want to use post events, because then the editableLine corresponds exactly to what the user
 * has typed.
 * Pre-events might help in some special cases where you want to bypass the internal behaviour of this object.
 * A concrete example of this could be a boolean dialog where you don't want to display any char but the y or n.
 *
 */
class EditableLineSymbolicCodeObserverOld implements SymbolicCodeObserverInterface
{


    /**
     * @var EditableLine
     */
    private $editableLine;
    private $tabLength;

    /**
     *
     * array of index => event (ordered by index):
     *              - 0: keyCodes, string|array|null, keyCodes that trigger the callback
     *                                      If null, it means any keyCode
     *              - 1: mixed  callback ( keyCode, editableLine, keyboardListener, fromRead, &bypass )
     *
     *                              - keyCode is useful if the keyCode is dynamic (keyCodes=null)
     *                              - editableLine is passed for the greatest flexibility
     *                              - keyboardListener gives us the opportunity to stop the listening,
     *                                          which is probably what we want when submitting the line
     *                              - fromRead is there just in case we need it
     *                              - bypass, whether or not to bypass the default behaviour of the line.
     *
     *                          If the callback returns a non empty string, that string will be displayed
     *                          after the refreshing of the editableLine.
     *                          This is useful to display a message with carriage return, such as a submit message,
     *                          because the editableLine CANNOT DISPLAY THE CARRIAGE RETURNS !
     *
     *                          In other words:
     *                          Do not echo directly from the callback, rather return the string you want to display.
     *
     *
     */
    private $preEvents;
    /**
     *
     * array of index => event (ordered by index):
     *              - 0: keyCodes
     *                      same as preEvent
     *              - 1: mixed  callback ( keyCode, editableLine, keyboardListener, fromRead )
     *                      same as preEvent, except for the last argument
     *
     */
    private $postEvents;


    public function __construct()
    {
        $this->editableLine = new EditableLine();
        $this->tabLength = 4;
        $this->preEvents = [];
        $this->postEvents = [];
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS SymbolicCodeObserverInterface
    //------------------------------------------------------------------------------/
    public function notify($code, $string, KeyboardListenerInterface $keyboardListener, $fromRead = true)
    {
        if (false === $this->editableLine->hasBeginPosition()) {
            $this->editableLine->refreshBeginPosition();
        }


        $s = '';
        $bypassDefaultBehaviour = false;
        foreach ($this->preEvents as $event) {
            list($keyCodes, $callback) = $event;
            if (null === $keyCodes || in_array($code, $keyCodes, true)) {
                /**
                 * Note that the last code is not in the editableLine yet
                 * (this is done in the next block below).
                 * So, if you return codes are y or n for instance, you need to access y or n via
                 * the editableLine AFTER the callback has been executed.
                 * 
                 * 
                 */
                $s .= call_user_func_array($callback, [$code, $this->editableLine, $keyboardListener, $fromRead, &$bypassDefaultBehaviour]);
            }
        }


        /**
         * Default behaviour
         */
        if (false === $bypassDefaultBehaviour) {

            switch ($code) {
                case 'tab':
                    /**
                     * tab could have different length on different system,
                     * we actually convert a tab into a configurable number of spaces
                     * in this implementation.
                     */
                    $this->editableLine->insertAt(str_repeat(' ', $this->tabLength));
                    break;
                case 'return':
                case 'escape':
                case 's+tab':
                case 'up':
                case 'down':
                    // we don't know what behaviour to exhibit, so we rather prefer do nothing at all
                    break;
                case 'left':
                    $this->editableLine->cursorLeft();
                    break;
                case 'right':
                    $this->editableLine->cursorRight();
                    break;
                case 'suppr':
                    $this->editableLine->deleteFrom();
                    break;
                case 'delete':
                    $this->editableLine->backspace();
                    break;
                default:
                    // not a key with control modifier
                    if (!(3 === mb_strlen($code) && 'c+' === substr($code, 0, 2))) {
                        $this->editableLine->insertAt($code);
                    }
                    break;
            }
        }

        $this->editableLine->refreshLine();

        
        foreach ($this->postEvents as $event) {
            list($keyCodes, $callback) = $event;
            if (null === $keyCodes || in_array($code, $keyCodes, true)) {
                $s .= call_user_func($callback, $code, $this->editableLine, $keyboardListener, $fromRead);
            }
        }

        /**
         * When we display this string, we generally stop the keyboardListener too,
         * because otherwise the displaying might not be synchronized with the editableLine anymore.
         *
         * We want to use a string when we need to write carriage returns,
         * because the editableLine doesn't handle the PHP_EOL char (\n on linux) at all.
         */
        if (is_string($s) && '' !== $s) {
            echo $s;
        }

    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setPreEvent($callback, $keyCodes = 'return', $index = null)
    {
        $this->setEvent($this->preEvents, $callback, $keyCodes, $index);
    }

    public function setPostEvent($callback, $keyCodes = 'return', $index = null)
    {
        $this->setEvent($this->postEvents, $callback, $keyCodes, $index);
    }


    /**
     * @return EditableLine
     *          This is, amongst other things, an opportunity to manually set the beginPosition
     */
    public function getEditableLine()
    {
        return $this->editableLine;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function setEvent(array &$events, $callback, $keyCodes = 'return', $index = null)
    {
        if (is_callable($callback)) {
            if (null !== $keyCodes && !is_array($keyCodes)) {
                $keyCodes = [$keyCodes];
            }
            if (null === $index) {
                $events[] = [
                    $keyCodes,
                    $callback,
                ];
            }
            else {
                $events[$index] = [
                    $keyCodes,
                    $callback,
                ];
            }
        }
        else {
            throw new \InvalidArgumentException("callback argument must be a callable");
        }
        ksort($events);
        return $this;
    }

}
