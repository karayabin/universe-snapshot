<?php

namespace QuickForm;


class QuickFormControl
{

    private $_type;
    private $_typeArgs;
    private $_label;
    private $_hint;
    private $_value;

    private $errors;
    private $constraints;

    /**
     * Fake controls are widgets that don't create values in the $_POST array.
     * They should be signaled to QuickForm, so that it does not add them to the formatted values when the form is submitted.
     * Fake controls should set claim their "fake" state in order to not waste the formatted values array.
     */
    private $_isFake;

    public function __construct()
    {
        $this->errors = [];
        $this->constraints = [];
        $this->_isFake = false;
    }


    //--------------------------------------------
    // METHODS MEANT TO BE USED BY THE DEVELOPER
    //--------------------------------------------
    public function type($type)
    {
        $this->_type = $type;
        $args = func_get_args();
        array_shift($args);
        $this->_typeArgs = $args;
        return $this;
    }

    public function label($label)
    {
        $this->_label = $label;
        return $this;
    }

    public function value($value)
    {
        $this->_value = $value;
        return $this;
    }

    public function hint($hint)
    {
        $this->_hint = $hint;
        return $this;
    }

    public function addErrorMessage($msg)
    {
        $this->errors[] = $msg;
        return $this;
    }

    public function addConstraint($ruleName)
    {
        $ruleArgs = func_get_args();
        array_shift($ruleArgs);
        $this->constraints[$ruleName] = $ruleArgs;
        return $this;
    }

    public function markAsFake()
    {
        $this->_isFake = true;
        return $this;
    }

    public function isFake()
    {
        return $this->_isFake;
    }






    //--------------------------------------------
    // METHODS MEANT TO BE USED BY FORM ONLY, NOT THE DEVELOPER
    //--------------------------------------------
    public function getType()
    {
        return $this->_type;
    }

    public function getTypeArgs()
    {
        return $this->_typeArgs;
    }

    public function getLabel()
    {
        return $this->_label;
    }

    public function getValue()
    {
        return $this->_value;
    }

    public function getHint()
    {
        return $this->_hint;
    }

    public function getErrorMessages()
    {
        return $this->errors;
    }

    public function getConstraints()
    {
        return $this->constraints;
    }

}