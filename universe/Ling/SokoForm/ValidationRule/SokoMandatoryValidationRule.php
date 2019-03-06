<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\Bat\ValidationTool;
use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;

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