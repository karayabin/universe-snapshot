<?php


namespace SokoForm\ValidationRule;


use Bat\ValidationTool;
use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;

class SokoMandatoryValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                return true;
            } else {
                return false;
            }
        });
    }
}