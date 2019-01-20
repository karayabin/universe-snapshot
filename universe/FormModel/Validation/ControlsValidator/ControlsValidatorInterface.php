<?php


namespace FormModel\Validation\ControlsValidator;


interface ControlsValidatorInterface
{
    /**
     * @return bool, whether or not the control which id was given has no error.
     *
     * $id: this id is defined in the form modelization document.
     * https://github.com/lingtalfi/form-modelization
     *
     * $value: the value to validate
     *
     * $errorMessages, an array of error messages pertaining to the control which id was given.
     * It's only not empty if the validation failed (i.e. returned false).
     */
    public function validate($id, $value, array &$errorMessages = []);
}