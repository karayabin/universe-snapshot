<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\Bat\ValidationTool;
use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoNotEmptyValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();


        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("required"));

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