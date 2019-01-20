<?php


namespace SokoForm\ValidationRule;


use Bat\ValidationTool;
use SokoForm\Control\SokoControlInterface;
use SokoForm\Form\SokoFormInterface;
use SokoForm\Translator\SokoValidationRuleTranslator;

class SokoAtLeastXCharsValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("minLength"));
        $this->preferences['minChars'] = 5;

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                $value = (string)$value;
                if (strlen($value) < $preferences['minChars']) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }


    public function setMinChar($minChars)
    {
        $this->preferences['minChars'] = $minChars;
        return $this;
    }
}