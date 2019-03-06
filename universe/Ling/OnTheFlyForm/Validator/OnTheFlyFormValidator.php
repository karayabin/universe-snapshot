<?php


namespace Ling\OnTheFlyForm\Validator;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\MimeTypeTool;
use Ling\FormTools\Validation\FormValidatorTool;
use Ling\OnTheFlyForm\Exception\OnTheFlyFormException;
use Ling\OnTheFlyForm\Helper\OnTheFlyFormHelper;

class OnTheFlyFormValidator implements ValidatorInterface
{

    private $_ruleId;
    /**
     * array of ruleId => error format string (containing tags)
     */
    private $errorMap;

    public function validate(array $allValidationRules, array &$model)
    {
        if (null === $this->errorMap) {
            $this->errorMap = $this->getErrorMap();
        }

        $allErrors = [];

        foreach ($allValidationRules as $id => $validationRules) {

            $pascal = OnTheFlyFormHelper::idToSuffix($id);
            $key = "value" . $pascal;
            $value = null; // null means inexistant
            if (array_key_exists($key, $model)) {
                $value = $model[$key];
            }


            foreach ($validationRules as $validationRule) {
                $p = explode(':', $validationRule);
                $ruleId = array_shift($p);
                $args = $p;
                if (!is_array($args)) {
                    $args = [];
                }

                $errorMsg = "";
                $res = $this->testRule($id, $ruleId, $args, $value, $model, $errorMsg);
                if (false === $res) {
                    $allErrors[$id] = $errorMsg;
                    $model["error" . $pascal] = $errorMsg;
                    break;
                }
            }
        }


        $model['_formErrors'] = $allErrors;
        return (0 === count($allErrors));
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function testRule($id, $ruleId, array $args, $value, array $model, &$errorMsg)
    {
        $ok = true;
        $tags = [];
        $this->_ruleId = $ruleId;
        switch ($ruleId) {
            case 'required':
                if (empty($value)) {
                    $ok = false;
                }
                break;
            case 'email':
                if (false === FormValidatorTool::isEmail($value)) {
                    $ok = false;
                }
                break;
            case 'sameAs':
                $sameId = $this->getArgumentByIndex(0, $args);
                $targetKey = "value" . OnTheFlyFormHelper::idToSuffix($sameId);
                $targetLabel = OnTheFlyFormHelper::getLabel($sameId, $model);
                if (false === array_key_exists($targetKey, $model) || $value !== $model[$targetKey]) {
                    $tags["targetLabel"] = $targetLabel;
                    $ok = false;
                }
                break;
            case 'minLength':
                $minLength = $this->getArgumentByIndex(0, $args);
                $strlen = mb_strlen($value);
                if ($strlen < $minLength) {
                    $tags["curLength"] = $strlen;
                    $tags["minLength"] = $minLength;
                    $ok = false;
                }
                break;
            case 'exactLength':
                $length = $this->getArgumentByIndex(0, $args);
                $strlen = mb_strlen($value);
                if ((int)$strlen !== (int)$length) {
                    $tags["currentLength"] = $strlen;
                    $tags["exactLength"] = $length;
                    $ok = false;
                }
                break;
            /**
             * When to use required if?
             * --------------------------
             *
             * When you want to check if a field is completed, but only if a particular field is selected.
             * For instance, imagine a form that ask the question:
             *
             * - Where do you come from?
             *      - A land of peace
             *          - please explain more: textarea
             *      - A land of war
             *      - my mother's house
             *          - please explain more: textarea
             *      - Jupiter
             *
             * So you see, the explain more textarea are required only if the user has selected either
             * the first or the third choice.
             *
             *
             * How to use requiredIf?
             * ------------------------
             *
             * Let's take the example above again, but give more robotic names to fields:
             *
             * - provenance:
             *      - peace:
             *          - peaceTextarea:
             *      - war:
             *      - house:
             *          - houseTextarea:
             *      - jupiter:
             *
             * And so if you want the peaceTextarea to be required, but only if the peace radio button (for instance)
             * was selected, do the following:
             *
             *          - requiredIf:provenance=peace
             *
             *
             */
            case 'requiredIf':
                $condition = $this->getArgumentByIndex(0, $args);
                $p = explode('=', $condition, 2);
                if (count($p) > 1) {
                    list($k, $v) = $p;
                    $pascal = OnTheFlyFormHelper::idToSuffix($k);
                    $key = 'name' . $pascal;
                    $pascal = OnTheFlyFormHelper::idToSuffix($k);
                    $val = 'value' . $pascal;
                    if (
                        true === array_key_exists($key, $model) &&
                        true === array_key_exists($val, $model) &&
                        $v === $model[$val]
                    ) {
                        if (empty($value)) {
                            $ok = false;
                        }
                    }
                } else {
                    throw new OnTheFlyFormException("Invalid rule syntax: requiredIf:key=value expected, requiredIf:$condition given");
                }

                break;
            case 'fileRequired':
                if (is_array($value)) {
                    if (
                        !array_key_exists("tmp_name", $value) ||
                        empty($value["tmp_name"])
                    ) {
                        $ok = false;
                    }
                } else {
                    $ok = false;
                }
                break;
            case 'fileMimeType':
                if (is_array($value)) {
                    if (array_key_exists("tmp_name", $value)) {
                        $argMimes = $this->getArgumentByIndex(0, $args);
                        $tags['mimeTypeList'] = $argMimes;
                        $mimes = explode(',', $argMimes);
                        $mimetype = MimeTypeTool::getMimeType($value['tmp_name']);
                        $mimeMatch = false;
                        foreach ($mimes as $mime) {
                            $mime = trim($mime);
                            if ($mimetype === $mime) {
                                $mimeMatch = true;
                                break;
                            }
                        }

                        if (false === $mimeMatch) {
                            $ok = false;
                        }
                    } else {
                        $ok = false;
                    }
                } else {
                    $ok = false;
                }
                break;
            default:
                throw new OnTheFlyFormException("Unknown ruleId: $ruleId");
                break;
        }
        if (false === $ok) {
            if (is_array($value)) {
                $value = ArrayToStringTool::toPhpArray($value);
            }

            $tags['field'] = OnTheFlyFormHelper::getLabel($id, $model);
            $tags['value'] = $value;
            $errorMsg = $this->getErrorMessage($ruleId, $tags, $value, $model);
        }
        return $ok;
    }


    protected function getErrorMessage($ruleId, array $tags, $value, array $model)
    {
        $keys = array_keys($tags);
        $values = array_values($tags);
        $keys = array_map(function ($v) {
            return '{' . $v . '}';
        }, $keys);
        if (array_key_exists($ruleId, $this->errorMap)) {
            return str_replace($keys, $values, $this->errorMap[$ruleId]);
        } else {
            throw new OnTheFlyFormException("The ruleId $ruleId was not found in the errorMap");
        }

    }


    protected function getArgumentByIndex($index, array $args, $isMandatory = true, $default = null)
    {
        if (array_key_exists($index, $args)) {
            return $args[$index];
        }
        if (true === $isMandatory) {
            throw new OnTheFlyFormException("Missing argument #$index for ruleId " . $this->_ruleId);
        }
        return $default;
    }


    protected function getErrorMap()
    {
        return [
            "required" => "This field is required",
            "requiredIf" => "This field is required",
            "email" => "This is not a valid email",
            "sameAs" => "This value doesn't match the {targetLabel} value",
            "minLength" => "This field must contain at least {minLength} characters",
            "exactLength" => "This field must contain exactly {exactLength} characters, {currentLength} given",
            "fileRequired" => "This field requires a file to be set",
            "fileMimeType" => "This file doesn't have one of the following mime types: {mimeTypeList}",
        ];
    }
}