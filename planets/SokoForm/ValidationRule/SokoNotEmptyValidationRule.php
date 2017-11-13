<?php


namespace SokoForm\ValidationRule;


use Bat\ValidationTool;
use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;

class SokoNotEmptyValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();


        $this->setErrorMessage("The field is required");

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                if (empty($value)) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }
}