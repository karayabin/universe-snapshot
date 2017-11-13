<?php


namespace SokoForm\ValidationRule;


use Bat\ValidationTool;
use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;

class SokoEmailValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();
        $this->setErrorMessage("The email is invalid");

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                if (false === ValidationTool::isEmail($value)) {
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