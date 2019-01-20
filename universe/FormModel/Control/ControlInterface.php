<?php


namespace FormModel\Control;


interface ControlInterface
{
    /**
     * @return null|string,
     *          the html name, which will be used to bind the values from the input ($_POST or $_GET)
     *          to this control.
     */
    public function getName();


    public function setValue($value); // required by inject method of FormModel

    public function getArray();

    public function addError($errorMessage);
}