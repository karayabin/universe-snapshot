<?php


namespace QuickForm\ControlFactory;


use QuickForm\QuickFormControl;

interface ControlFactoryInterface
{

    /**
     * Displays a control.
     *
     * - name is the html name attribute.
     *
     * - Returns false if the factory doesn't know how to display the given control
     */
    public function displayControl($name, QuickFormControl $c);
}