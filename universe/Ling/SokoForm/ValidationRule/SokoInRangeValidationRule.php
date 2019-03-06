<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoInRangeValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("inRange"));


        $this->preferences['min'] = 1;
        $this->preferences['max'] = 10;
        $this->preferences['step'] = 1;

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                $range = range($this->preferences['min'], $this->preferences['max'], $this->preferences['step']);
                if (!in_array($value, $range)) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }

    public function setRange($min, $max, $step = 1)
    {
        $this->preferences['min'] = $min;
        $this->preferences['max'] = $max;
        $this->preferences['step'] = $step;
        return $this;
    }

}