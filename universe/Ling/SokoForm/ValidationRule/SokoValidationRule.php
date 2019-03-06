<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoValidationRule implements SokoValidationRuleInterface
{
    protected $preferences;
    private $validationFunction;
    private $errorMessages;


    public function __construct()
    {
        $this->errorMessages['mandatory'] = SokoValidationRuleTranslator::getValidationMessageTranslation("mandatory");
        $this->preferences = [];
        $this->validationFunction = function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            return true;
        };
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @return array, the factory preferences.
     *              Note: when the SokoForm validates the control,
     *              it deals with a more dynamic type of preferences,
     *              which is the factory preferences, plus the potential dynamic/runtime tags
     *              added to it via the validationFunction.
     *
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * @return \Closure
     */
    public function getValidationFunction()
    {
        return $this->validationFunction;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;
        return $this;
    }


    public function setValidationFunction($validationFunction)
    {
        $this->validationFunction = $validationFunction;
        return $this;
    }


    /**
     *
     * @param $messageModel
     * @param string $type , main|aux|mandatory|...your own type
     *              - main is the default, you should use it every time you have only one error message
     *                      (apart from mandatory which is reserved and doesn't count for that matter)
     *              - aux is the type you would assign to an auxiliary (as in second) error message
     *              - mandatory is reserved by this class
     *
     *
     * @return $this
     */
    public function setErrorMessage($messageModel, $type = "main")
    {
        $this->errorMessages[$type] = $messageModel;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function checkSubmitted($value, &$error)
    {
        if (null === $value) {
            $error = $this->getErrorMessage("mandatory");
            return false;
        }
        return true;
    }

    protected function getErrorMessage($type = "main")
    {
        return $this->errorMessages[$type];
    }
}