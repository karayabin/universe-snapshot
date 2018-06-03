<?php


namespace SokoForm\ValidationRule;


use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;
use SokoForm\Translator\SokoValidationRuleTranslator;

class SokoContainsBetweenXAndYDigitsValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();
        $this->preferences['min'] = 1;
        $this->preferences['max'] = 10;
        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("minMaxDigits"));

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                $nbDigits = $this->countDigits($value);
                if (
                    $nbDigits > $preferences['max'] ||
                    $nbDigits < $preferences['min']
                ) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }

    public function setRange($min, $max)
    {
        $this->preferences['min'] = $min;
        $this->preferences['max'] = $max;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function countDigits($str)
    {
        return preg_match_all("/[0-9]/", $str);
    }

}