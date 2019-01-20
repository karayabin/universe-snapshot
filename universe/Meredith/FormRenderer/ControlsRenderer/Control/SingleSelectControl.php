<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-05
 *
 */
class SingleSelectControl extends Control implements SingleSelectControlInterface
{

    private $values2Labels;


    public function __construct()
    {
        parent::__construct();
        $this->values2Labels = [];
    }


    public function getValues2Labels()
    {
        return $this->values2Labels;
    }

    public function setValues2Labels(array $values2Labels)
    {
        $this->values2Labels = $values2Labels;
        return $this;
    }


}