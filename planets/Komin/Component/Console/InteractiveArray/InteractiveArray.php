<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Console\InteractiveArray;

use BeeFramework\Bat\ArrayTool;
use Komin\Component\Console\Dialog\Dialog;
use Komin\Component\Console\Dialog\Tool\BooleanDialogTool;
use Komin\Component\Console\Dialog\Tool\DialogListTool;
use Komin\Component\Console\Dialog\Tool\DialogRepeaterTool;
use Komin\Component\Console\InteractiveArray\Exception\UserSatisfyWithArrayException;
use Komin\Component\Console\KeyboardListener\KeyboardListenerInterface;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLine\EditableLine;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver\PreBehaviour;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool\EditableLineDefaultValueWrapper;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\Tool\EditableLineShortcutWrapper;
use Komin\Component\Console\Tool\TerminalCodesTool;
use Komin\Notation\String\MiniMl\Tool\MiniMlTool;


/**
 * InteractiveArray
 * @author Lingtalfi
 * 2015-05-09
 *
 */
class InteractiveArray
{

    /**
     * That's the array we play with and return to the user
     */
    private $array;

    /**
     * We keep the initial state for cases where the user wants to reset the array:
     * she starts again from the initialArray (not necessarily an empty array).
     */
    private $initialArray;


    /**
     * Keeping track of the highest len of a key or a value, so that we can display
     * the array properly.
     * We do this every time a value is added, for performance reasons.
     *
     */
    private $highestLen;

    /**
     * The amount of padding around every columns, for array displaying
     */
    private $safePaddingLen;

    /**
     * numeric|assoc (default)
     */
    private $mode;

    /**
     *
     * editionMode: 0|1  (default=0)
     *          when the user types return on the value:
     *                   - 0: start a new interaction to create a new entry
     *                   - 1: look if there is an entry after, and if so, starts the interaction for it (and so on...)
     *                   - 2: This is the mode to use only for updating one entry.
     *                                  the general dialog appears, and editionMode goes back to its default: 0.
     *
     *
     */
    private $editionMode;

    public function __construct()
    {
        $this->array = [];
        $this->initialArray = [];
        $this->highestLen = 0;
        $this->safePaddingLen = 1;
        $this->mode = 'assoc';
        $this->editionMode = 0;
    }


    /**
     * @return array, the created array
     */
    public function play($id = null)
    {
        try {
            echo $this->getManual();
            $this->doPlay($id);
        } catch (UserSatisfyWithArrayException $e) {
            return $this->unpack($this->array);
        }
    }




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getArray()
    {
        return $this->array;
    }

    public function setArray(array $array)
    {
        $this->initialArray = $this->pack($array);
        $this->array = $this->initialArray;


        foreach ($this->array as $k => $v) {
            $this->checkHighestLen($k);
            list($a, $b) = $v;
            $this->checkHighestLen($a);
            $this->checkHighestLen($b);
        }
        return $this;
    }

    public function setMode($mode)
    {
        if (!in_array($mode, ['numeric', 'assoc'])) {
            throw new \InvalidArgumentException("mode argument must be one of: numeric, assoc");
        }
        $this->mode = $mode;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getManual()
    {
        $s = '';
        $n = 60;
        $s .= str_repeat('-', $n) . PHP_EOL;
        $s .= "InteractiveArray hints:" . PHP_EOL;
        $s .= "Type return on an empty key to trigger general dialog" . PHP_EOL;
        $s .= "Type esc while typing to cancel the typing" . PHP_EOL;
        $s .= "Defaults shortcuts are available: c+A: to begin; c+E: to end; c+L: clear the line" . PHP_EOL;
        $s .= "Good luck!" . PHP_EOL;
        $s .= str_repeat('-', $n) . PHP_EOL;
        return $s;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return array, the created array
     */
    private function doPlay($id = null)
    {
        $this->displayArray();
        $this->startInteraction($id);
    }


    private function displayArray()
    {
        $highestLen = $this->highestLen + $this->safePaddingLen;
        $firstColumnLen = 6;
        $padType = STR_PAD_RIGHT;
        $n = 15;
        if ($this->array) {
            echo PHP_EOL;
            echo str_repeat('-', $n);
            echo PHP_EOL;
            foreach ($this->array as $k => $v) {
                if (0 !== $k) {
                    echo PHP_EOL;
                }
                list($a, $b) = $v;
                echo str_pad($k, $firstColumnLen, ' ', $padType);
                echo str_pad($a, $highestLen, ' ', $padType);
                echo str_pad($b, $highestLen, ' ', $padType);
            }
            echo PHP_EOL;
            echo str_repeat('-', $n);
            echo PHP_EOL;
        }
    }

    private function setDefaultLineValue(Dialog $d, $val)
    {
        EditableLineDefaultValueWrapper::wrap($d->getDialogKeyboardListener()->getEditableLineObserver(), $val);
    }


    private function startInteraction($id)
    {

        $defaultKey = '';
        $defaultValue = '';
        if (null !== $id) {
            list($defaultKey, $defaultValue) = $this->array[$id];
        }
        else {
            $id = count($this->array);
        }

        $d = $this->createDialog()->setQuestion("key: ")->setSubmitCodes("return");


        if ('numeric' === $this->mode && '' === $defaultKey) {
            $defaultKey = ArrayTool::getNextNumericIndex($this->array);
        }


        $defaultKey = (string)$defaultKey;
        $defaultValue = (string)$defaultValue;

        if ('' !== $defaultKey) {
            $this->setDefaultLineValue($d, $defaultKey);
        }
        $this->addEscapeHandler($d);


        $key = DialogRepeaterTool::repeatToValid($d, function ($v) use ($defaultKey) {
            if ($this->isExistingKey($v, $defaultKey)) {
                return false;
            }
            return true;
        }, function ($userKey) {
            return PHP_EOL . MiniMlTool::format("<red>This key \"$userKey\" already exists</red>") . PHP_EOL;
        });


        $this->checkHighestLen($key);
        $this->array[$id][0] = $key;
        $this->array[$id][1] = $defaultValue;

        $this->displayArray(); // to show the possible key update to the user

        $d = $this->createDialog()->setQuestion("value: ")->setSubmitCodes(["return", "escape"]);
        if ('' !== $defaultValue) {
            $this->setDefaultLineValue($d, (string)$defaultValue);
        }
        $this->addEscapeHandler($d);

        $value = $d->execute();
        $this->array[$id][0] = $key;
        $this->array[$id][1] = $value;
        $this->checkHighestLen($value);


        if (0 === $this->editionMode) {
            $this->doPlay();
        }
        elseif (2 === $this->editionMode) {
            $this->displayArray();
            $this->playGeneralDialog();
        }

    }

    private function addEscapeHandler(Dialog $d)
    {
        $d->getDialogKeyboardListener()->getSymbolicCodesObserver()->setObserver(function ($code, $string, KeyboardListenerInterface $kb, $fromRead) {

            if ('escape' === $code) {
                $kb->stopListening();
                $this->displayArray();
                $this->playGeneralDialog();
            }
        });
    }

    private function playGeneralDialog()
    {

        $this->editionMode = 0;
        $q = DialogListTool::listToQuestion("What do you want to do?" . PHP_EOL, [
            's' => 'save and quit (default)',
            'e' => 'edit array',
            'u' => 'update one entry',
            'd' => 'delete one entry',
            'c' => 'clear',
            't' => 'sort',
        ]);
        $d = Dialog::create();
        $d
            ->setQuestion($q)
            ->setSubmitCodes(null);


        $d->getDialogKeyboardListener()
            ->getEditableLineObserver()
            ->setPreEvent(function ($code, EditableLine $editableLine, KeyboardListenerInterface $k, $fromRead, PreBehaviour $b) {
                $b->preventRefresh();
                // added the empty string to prevent burst from calling the bell
                if (!in_array($code, ['return', 's', 'e', 'u', 'd', 'c', 't'])) {
                    TerminalCodesTool::bell();
                }
            }, null);


        $r = DialogRepeaterTool::repeatToValid($d, function ($response) {
            return (in_array($response, ['', 's', 'e', 'u', 'd', 'c', 't']));
        }, PHP_EOL . "Invalid answer" . PHP_EOL);


        if ('' === $r || 's' === $r) {
            throw new UserSatisfyWithArrayException();
        }
        elseif ('c' === $r) {
            if (true === BooleanDialogTool::getBoolean('Are you sure you want to delete the current array? (y or n) ')) {
                $this->array = $this->getInitialArray();
                $this->doPlay();
            }
            else {
                echo PHP_EOL;
                $this->playGeneralDialog();
            }
        }
        elseif ('u' === $r) {
            echo PHP_EOL;
            if ($this->array) {
                $id = $this->pickUpEntry("Which entry would you like to update? (type the identifier) ");
                echo PHP_EOL;
                $this->editionMode = 2;
                $this->startInteraction($id);
            }
            else {
                echo "There is no more entry in this array";
                echo PHP_EOL;
                $this->playGeneralDialog();
            }
        }
        elseif ('d' === $r) {
            echo PHP_EOL;
            if ($this->array) {
                $id = $this->pickUpEntry("Which entry would you like to delete? (type the identifier) ");
                echo PHP_EOL;
                $this->removeByIdentifier($id);
                $this->displayArray();
            }
            else {
                echo "There is no more entry in this array";
                echo PHP_EOL;
            }
            $this->playGeneralDialog();
        }
        elseif ('e' === $r) {
            $this->doPlay();
        }
        elseif ('t' === $r) {
            echo PHP_EOL;
            $q = DialogListTool::listToQuestion("What kind of sort do you want to apply?" . PHP_EOL, [
                'k' => 'sort by key',
                'v' => 'sort by value',
            ]);
            $d = Dialog::create();
            $d
                ->setQuestion($q)
                ->setSubmitCodes(null);
            $r = DialogRepeaterTool::repeatToValid($d, function ($response) use ($d) {
                $ret = (in_array($response, ['k', 'v']));
                if (false === $ret) {
                    TerminalCodesTool::bell();
                    $d->getDialogKeyboardListener()->getEditableLineObserver()->getEditableLine()->reset();
                }
                return $ret;
            }, PHP_EOL . "Invalid answer" . PHP_EOL);

            if ('k' === $r) {
                $t = $this->unpack($this->array);
                ksort($t);
                $this->setArray($t);
            }
            elseif ('v' === $r) {
                $t = $this->unpack($this->array);
                natsort($t);
                $this->setArray($t);
            }
            $this->displayArray();
            $this->playGeneralDialog();
        }
        else {
            throw new \LogicException("Unknown choice: $r");
        }
    }

    private function removeByIdentifier($id)
    {
        unset($this->array[$id]);
        $this->array = array_merge($this->array);
    }

    private function isValidIdentifier($id)
    {
        if ('' === trim($id)) {
            return false;
        }
        $id = (int)$id;
        if ($id >= 0 && $id < count($this->array)) {
            return true;
        }
        return false;
    }

    private function pickUpEntry($q)
    {
        $d = Dialog::create();
        $d
            ->setQuestion($q)
            ->setSubmitCodes('return');
        $r = DialogRepeaterTool::repeatToValid($d, function ($response) {
            return $this->isValidIdentifier($response);
        }, PHP_EOL . "Invalid identifier" . PHP_EOL);
        return $r;
    }


    private function getInitialArray()
    {
        return $this->initialArray;
    }

    private function checkHighestLen($string)
    {
        $len = mb_strlen($string);
        if ($len > $this->highestLen) {
            $this->highestLen = $len;
        }
    }


    private function pack(array $items)
    {
        $ret = [];
        foreach ($items as $k => $v) {
            $ret[] = [$k, $v];
        }
        return $ret;
    }

    private function unpack(array $items)
    {
        $ret = [];
        foreach ($items as $k => $v) {
            list($key, $value) = $v;
            $ret[$key] = $value;
        }
        return $ret;
    }


    private function isExistingKey($key, $defaultKey)
    {
        $ret = false;
        foreach ($this->array as $val) {
            list($k, $v) = $val;
            if ((string)$k === $key) {
                if (2 === $this->editionMode && $defaultKey === $key) {
                    continue;
                }
                $ret = true;
                break;
            }
        }
        return $ret;
    }


    /**
     * @return Dialog
     */
    private function createDialog()
    {
        $d = Dialog::create();
        EditableLineShortcutWrapper::wrap($d->getDialogKeyboardListener()->getEditableLineObserver());
        return $d;
    }

}
