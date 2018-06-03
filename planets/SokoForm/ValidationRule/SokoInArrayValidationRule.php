<?php


namespace SokoForm\ValidationRule;


use SokoForm\Control\SokoControlInterface;
use SokoForm\Exception\SokoFormException;
use SokoForm\Form\SokoFormInterface;
use SokoForm\Translator\SokoValidationRuleTranslator;

class SokoInArrayValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("inArray"));


        $this->preferences['array'] = [];

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {


            if (true === $this->checkSubmitted($value, $error)) {


                /**
                 * Do we have a regular array or an associative array?
                 */
                $array = $preferences['array'];
                if ($array) {

                    $isAssociative = $this->isAssociative($array);
                    if (true === $isAssociative) {
                        $labels = array_values($array);
                        $values = array_keys($array);
                    } else {
                        $labels = $array;
                        $values = $array;
                    }


                    // posted values from form always are strings
                    $stringValues = array_map("strval", $values);



                    if (!in_array((string)$value, $stringValues, true)) {
                        $preferences['sArray'] = implode(', ', $labels);
                        $error = $this->getErrorMessage();
                        return false;
                    }
                } else {
                    throw new SokoFormException("The array must not be empty");
                }
            } else {
                return false;
            }
            return true;
        });
    }

    /**
     *
     * @param array $array , either an array of values (called regular form), or an array of
     *                      value => label (called associative form).
     *
     *                      To be recognized as an array of value => label, the first value has to be not an int.
     *                      The label in the associative form is displayed in the error message.
     *                      That's the only difference.
     *
     * @return $this
     */
    public function setArray(array $array)
    {
        $this->preferences['array'] = $array;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function isAssociative(array $array)
    {
        foreach ($array as $k => $v) {
            if (false === is_int($k)) {
                return true;
            }
        }
        return false;
    }
}