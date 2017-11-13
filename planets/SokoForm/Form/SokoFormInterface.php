<?php


namespace SokoForm\Form;


use SokoForm\Control\SokoControlInterface;
use SokoForm\Exception\SokoFormException;
use SokoForm\ValidationRule\SokoValidationRuleInterface;

interface SokoFormInterface
{


    //--------------------------------------------
    // FORM ATTRIBUTES
    //--------------------------------------------
    public function getMethod();

    public function getAction();

    public function getEnctype();

    /**
     * @return string, containing the following attributes:
     * - method
     * - action
     * - ?enctype, depending on whether or not it is set
     */
    public function getFormAttributesAsString();



    //--------------------------------------------
    // CONTROLS
    //--------------------------------------------
    /**
     * @param $controlName
     * @param bool $throwEx
     * @param null $default
     * @return SokoControlInterface|mixed
     * @throws SokoFormException
     */
    public function getControl($controlName, $throwEx = true, $default = null);

    /**
     * @return SokoControlInterface[]
     */
    public function getControls();


    //--------------------------------------------
    // INTERACTION
    //--------------------------------------------
    /**
     * Check whether or not the form was posted.
     * If that's the case, perform validation, and if all validates, then
     * execute the onSuccess callback.
     *
     * @param callable $onSuccess
     *                      fn ( array $values, SokoFormInterface $form )
     *                      - values: array of controlName to value
     * @param array|null $context
     * @return mixed
     */
    public function process(callable $onSuccess, array $context = null);


    /**
     * Notification is an array with 3 properties, as defined here:
     * https://github.com/lingtalfi/Models/blob/master/Notification/NotificationsModel.php
     */
    public function addNotification($message, $type, $title = null);


    public function addValidationRule($controlName, SokoValidationRuleInterface $validationRule);

    /**
     * @return array, the model to be used by the view.
     *                  Note: the view should use the model only, not the object.
     *                  See documentation for more info.
     */
    public function getModel();

}