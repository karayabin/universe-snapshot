<?php


namespace Ling\SokoForm\ValidationRule;


use Ling\Bat\ValidationTool;
use Ling\SokoForm\Control\SokoControlInterface;
use Ling\SokoForm\Form\SokoFormInterface;
use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class SokoDateValidationRule extends SokoValidationRule
{


    public function __construct()
    {
        parent::__construct();

        $this->setErrorMessage(SokoValidationRuleTranslator::getValidationMessageTranslation("date"));
        $this->preferences['dateFormat'] = 'yyyy/mm/dd';

        $this->setValidationFunction(function ($value, array &$preferences, &$error = null, SokoFormInterface $form, SokoControlInterface $control) {
            if (true === $this->checkSubmitted($value, $error)) {

                $datePattern = $this->getPattern($this->preferences['dateFormat']);
                if (!preg_match($datePattern, $value)) {
                    $error = $this->getErrorMessage();
                    return false;
                }
            } else {
                return false;
            }
            return true;
        });
    }


    /**
     * @param $format , the date format to check.
     *          It's composed of the following components, any other character
     *          is considered a separator:
     *           - yyyy: 4 digits year
     *           - dd: 2 digits day (from 01 to 31)
     *           - mm: 2 digits (from 01 to 12)
     * @return self
     */
    public function setDateFormat($format)
    {
        $this->preferences['dateFormat'] = $format;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getPattern($dateFormat)
    {
        $components = array_filter(preg_split('!(yyyy|mm|dd)!', $dateFormat
            , -1, \PREG_SPLIT_DELIM_CAPTURE));
        $components2Regex = [
            'yyyy' => '(19[0-9]{2}|20[0-9]{2})',
            'mm' => '[0-1]{1}[0-9]{1}',
            'dd' => '([0-2]{1}[0-9]{1}|30|31)',
        ];
        $regexComponents = array_map(function ($v) use ($components2Regex) {
            if (array_key_exists($v, $components2Regex)) {
                return $components2Regex[$v];
            }
            return preg_quote($v, '!');
        }, $components);
        return '!' . implode('', $regexComponents) . '!';
    }
}