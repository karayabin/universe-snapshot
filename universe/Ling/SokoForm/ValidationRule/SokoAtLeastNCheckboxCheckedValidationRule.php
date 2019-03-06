<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoAtLeastNCheckboxCheckedValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("minNumber"));
        $this->preferences['minNumber'] = 1;

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (null !== $value && is_array($value)) {

                if (count($value) < $preferences['minNumber']) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                if (null === $value) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            }
            return true;
        });
    }


    public function setMinNumber($minNumber)
    {
        $this->preferences['minNumber'] = $minNumber;
        return $this;
    }
}