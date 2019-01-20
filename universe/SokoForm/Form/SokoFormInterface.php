<?php


namespace SokoForm\Form;


use SokoForm\Control\SokoControlInterface;
use SokoForm\Exception\SokoFormException;
use SokoForm\ValidationRule\SokoValidationRuleInterface;


/**
 * https://github.com/lingtalfi/Models/blob/master/Form/form-model.md
 */
interface SokoFormInterface
{

    /**
     * @return string, the form unique name
     */
    public function getName();

    //--------------------------------------------
    // FORM ATTRIBUTES
    //--------------------------------------------
    public function getMethod();

    public function getAction();

    public function getEnctype();

    public function getId(); // the css id

    public function getClass(); // the css class

    /**
     * @return string, containing the following attributes:
     * - method
     * - action
     * - ?enctype, depending on whether or not it is set
     */
    public function getFormAttributesAsString();

    public function getAttributes();

    /**
     * @return array of item, each item having the following structure:
     *      - ?name: string to identify this group; you will only need it if you
     *              do operations with the groups (like an insert after operation for instance...)
     *      - label: the name/label of the group
     *      - controls: array control names owned by this group
     */
    public function getGroups();

    public function setGroups(array $groups);



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

    public function addControl(SokoControlInterface $control);


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
     * @return mixed:
     *          - true if the form has been posted successfully (all validation tests passed)
     *          - false if the form has been posted, but at least one validation test failed
     *          - null if the form has not been posted
     *          - false if the callback returns false
     */
    public function process(callable $onSuccess, array $context = null);

    /**
     * Will inject values of the context to the corresponding controls.
     *
     * Note that if you call the process method, you don't need to call inject before
     * (although this wouldn't hurt)
     *
     * @param array $context
     * @return mixed
     */
    public function inject(array $context = []);

    /**
     * Add an error at the form level
     *
     * @param string $errorMessage
     * @return void
     */
    public function addError(string $errorMessage);


    /**
     * Notification is an array with 3 properties, as defined here:
     * https://github.com/lingtalfi/Models/blob/master/Notification/NotificationsModel.php
     */
    public function addNotification($message, $type, $title = null);


    public function addValidationRule($controlName, SokoValidationRuleInterface $validationRule);

    /**
     * @return array:formModel, the model to be used by the view.
     *
     *                  Note: the view should use the model only, not the object.
     *                  See documentation for more info.
     *
     */
    public function getModel();

}