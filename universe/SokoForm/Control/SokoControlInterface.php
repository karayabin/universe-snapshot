<?php


namespace SokoForm\Control;


interface SokoControlInterface
{

    public function getName();

    public function getLabel();

    public function getValue();

    public function setValue($value);

    /**
     * @param $error , string: a translated error message
     */
    public function addError($error);

    /**
     * @return array of translated error messages
     */
    public function getErrors();

    /**
     * @return bool, whether or not the value is overridable (i.e. the user can change the value of the control by
     * interacting with it)
     */
    public function getValueIsOverridable();

    /**
     * @return array intended for the view.
     *
     * - label: null|string, null if not set
     * - name: the html name property to display
     * - value: the value of the control, it can be null, a string, or
     *          an array (in case of multiple checkboxes for instance)
     * - errors: an array of error messages bound to the control
     * - ...plus extra properties, depending on the control.
     *          See the documentation for more info about the control specific models.
     *
     *
     */
    public function getModel();
}