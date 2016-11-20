<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2015-12-31
 *
 * This class' goal is to help representing a html control.
 */
abstract class Control implements ControlInterface
{
    public $name;
    public $label;
    public $placeHolder;
    public $value;
    public $isRequired;
    public $help;
    public $readOnly;

    public function __construct()
    {
        $this->isRequired = true;
        $this->readOnly = false;
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    /**
     * @return mixed
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @return boolean
     */
    public function getIsRequired()
    {
        return $this->isRequired;
    }

    public function getIsReadOnly()
    {
        return $this->readOnly;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPlaceHolder()
    {
        return $this->placeHolder;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setHelp($help)
    {
        $this->help = $help;
        return $this;
    }

    public function setIsRequired($isRequired)
    {
        $this->isRequired = $isRequired;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setPlaceHolder($placeHolder)
    {
        $this->placeHolder = $placeHolder;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setReadOnly($readOnly)
    {
        $this->readOnly = $readOnly;
        return $this;
    }


}