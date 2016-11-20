<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-20
 */
class AnyTimePickerControl extends Control implements AnyTimePickerControlInterface
{

    private $options;

    public function __construct()
    {
        parent::__construct();
        $this->options = [];
    }


    public function getPickerOptions()
    {
        return $this->options;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }


}