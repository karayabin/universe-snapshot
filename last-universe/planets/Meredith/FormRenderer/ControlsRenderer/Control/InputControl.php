<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2015-12-31
 *
 */
class InputControl extends Control implements InputControlInterface
{

    public $type;

    public function __construct()
    {
        parent::__construct();
        $this->type = "text";
    }


    /**
     *
     * An indication on how to render the control.
     * (Not necessarily the html attribute type)
     * Suggestions:
     *
     * - text
     * - color
     * - email
     * - password
     * - hidden
     *
     */
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    
}