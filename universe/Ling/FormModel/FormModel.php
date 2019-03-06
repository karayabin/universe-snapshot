<?php


namespace Ling\FormModel;


use Ling\FormModel\Control\ControlInterface;
use Ling\FormModel\Control\NotInjectableControlInterface;
use Ling\FormModel\Group\GroupInterface;
use Ling\FormModel\Validation\ControlsValidator\ControlsValidatorInterface;

class FormModel implements FormModelInterface
{
    private $htmlFormAttributes;
    private $formErrorPosition;
    private $displayFirstErrorOnly;

    /**
     * @var ControlInterface[]
     */
    private $controls;


    /**
     * @var GroupInterface[]
     */
    private $groups;
    private $order;
    /**
     * @var ControlsValidatorInterface
     */
    private $validator;
    private $submitButtonBar;


    public function __construct()
    {
        $this->htmlFormAttributes = [
            "action" => "",
            "method" => "POST",
        ];
//        $this->messages = [];
        $this->formErrorPosition = "control"; // control|central
        $this->displayFirstErrorOnly = true;
        $this->controls = [];
        $this->groups = [];
        $this->submitButtonBar = [
            "enable" => true,
            "textSubmitButton" => "Submit",
            "showResetButton" => true,
            "textResetButton" => "Reset",
        ];
        $this->order = null;
    }

    public static function create()
    {
        return new static();
    }

    public function setValidator(ControlsValidatorInterface $validator)
    {
        $this->validator = $validator;
        return $this;
    }


    public function inject(array $values)
    {
        foreach ($this->controls as $control) {
            if ($control instanceof NotInjectableControlInterface) {
                continue;
            }
            $name = $control->getName();
            if (null !== $name) {
                $value = self::getValueByName($values, $name);
                /**
                 * updating only controls if the value is non null.
                 * That might be useful if you manually set the $values array.
                 * Maybe we will get rid of this if later I don't know.
                 */
                if (null !== $value) {
                    $control->setValue($value);
                }
            }
        }
        return $this;
    }


    public function validate(array $values)
    {
        $ret = true;
        if ($this->validator instanceof ControlsValidatorInterface) {
            foreach ($this->controls as $id => $control) {
                $name = $control->getName();
                if (null !== $name) {
                    $errorMessages = [];
                    $value = self::getValueByName($values, $name);
                    if (false === $this->validator->validate($id, $value, $errorMessages)) {
                        foreach ($errorMessages as $error) {
                            $control->addError($error);
                            $ret = false;
                        }
                    }
                }
            }
        }
        return $ret;
    }


    public function getArray()
    {
        $ret = [
            'form' => [
                'htmlAttributes' => $this->htmlFormAttributes,
//                'messages' => $this->messages,
                'formErrorPosition' => $this->formErrorPosition,
                'displayFirstErrorOnly' => $this->displayFirstErrorOnly,
                'submitButtonBar' => $this->submitButtonBar,
            ],
            'order' => $this->order,
        ];
        $groups = [];
        $controls = [];


        $this->parseGroups($groups);
        $this->parseControls($controls);

        $ret['groups'] = $groups;
        $ret['controls'] = $controls;


        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function setAction($action)
    {
        $this->htmlFormAttributes['action'] = $action;
        return $this;
    }

    public function setMethod($method)
    {
        $this->htmlFormAttributes['method'] = $method;
        return $this;
    }

    /**
     * If key is null, then it's a standalone attribute which value is the value
     */
    public function addFormAttribute($key, $value)
    {
        if (null !== $key) {
            $this->htmlFormAttributes[$key] = $value;
        } else {
            $this->htmlFormAttributes[] = $value;
        }
        return $this;
    }

//    /**
//     * @return $this
//     */
//    public function addMessage($msg, $type)
//    {
//        $this->messages[] = [$msg, $type];
//        return $this;
//    }

    public function setFormErrorPosition($formErrorPosition)
    {
        $this->formErrorPosition = $formErrorPosition;
        return $this;
    }

    public function setDisplayFirstErrorOnly($bool)
    {
        $this->displayFirstErrorOnly = $bool;
        return $this;
    }

    public function addControl($id, ControlInterface $controller)
    {
        $this->controls[$id] = $controller;
        return $this;
    }

    public function addGroup($id, GroupInterface $group)
    {
        $this->groups[$id] = $group;
        return $this;
    }

    public function setOrder(array $order)
    {
        $this->order = $order;
        return $this;
    }

    public function setSubmitButtonBar(array $submitButtonBar)
    {
        $this->submitButtonBar = $submitButtonBar;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function parseControls(array &$controls)
    {
        foreach ($this->controls as $id => $control) {
            $controls[$id] = $control->getArray();
        }
    }

    protected function parseGroups(array &$groups)
    {
        foreach ($this->groups as $id => $group) {
            $groups[$id] = [
                "label" => $group->getLabel(),
                "children" => $group->getChildren(),
            ];
        }
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getValueByName(array $values, $key)
    {
        /**
         * Mapping form data to controls.
         * The edge cases come with names like pou[5][] for instance.
         *
         * In the case of pou[5][],
         * I call pou[5] the key.
         *
         * A trailing [] means that the type of data is an array, but that's not really our concern
         * if it's an array or not, we just want to guess the key
         *
         *
         */
        $defaultValue = null;
        if ('[]' === substr($key, -2)) {
            $key = substr($key, 0, -2);
        }
        if (false === strpos($key, '[')) { // most common case: not an array
            $value = (array_key_exists($key, $values)) ? $values[$key] : $defaultValue;
        } else {
            // edge cases with arrays
            $value = self::getKey($values, $key, $defaultValue);
        }
        return $value;
    }

    private static function getKey(array $values, $key, $defaultValue)
    {
        $key = str_replace(']', '', $key);
        $p = explode('[', $key);
        $holder = $values;
        $hasBroken = false;

        while ($k = array_shift($p)) {
            if (array_key_exists($k, $holder)) {
                $value = $holder[$k];
                $holder = $value;
            } else {
                $hasBroken = true;
                break;
            }
        }
        if (false === $hasBroken) {
            return $value;
        }
        return $defaultValue;
    }
}