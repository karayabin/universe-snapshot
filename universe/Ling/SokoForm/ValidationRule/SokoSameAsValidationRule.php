<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoSameAsValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("identical"));
        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("controlNotFound"), "aux");
        $this->preferences['otherControl'] = null;

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {
                $otherControl = $preferences['otherControl'];
                if (false !== $control = $form->getControl($otherControl, false, false)) {
                    $otherValue = $control->getValue();
                    if ($otherValue !== $value) {
                        $error = $this->getErrorMessage();
                        return false;
                    }
                } else {
                    // the expected control doesn't exist
                    $error = $this->getErrorMessage("aux");
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }


    public function setSameAs($otherControl)
    {
        $this->preferences["otherControl"] = $otherControl;
        return $this;
    }
}