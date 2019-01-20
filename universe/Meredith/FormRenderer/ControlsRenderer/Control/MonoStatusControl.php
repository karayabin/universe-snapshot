<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2015-12-31
 *
 */
class MonoStatusControl extends Control implements MonoStatusControlInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->setValue("1");
    }


}