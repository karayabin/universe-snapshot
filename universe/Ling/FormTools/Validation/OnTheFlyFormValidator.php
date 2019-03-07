<?php


namespace Ling\FormTools\Validation;

use Ling\FormTools\Validation\Exception\OnTheFlyFormValidatorException;
use Ling\FormTools\Validation\Message\OnTheFlyFormValidatorMessageInterface;
use Kamille\Services\XLog;


/**
 * 2017-05-28
 *
 * When I have time, I like to use a form model to handle my forms.
 * (https://github.com/lingtalfi/formmodel)
 *
 * However, this requires to create a renderer object, which can be very cumbersome
 * and time consuming imo.
 *
 * Sometimes, you just have a nice template, and you just want to quickly inject
 * your form logic in that template, and not the other way around.
 *
 * In other words, you don't create a renderer which is an adaptor between your model
 * and the target template, but rather, you start from the template and create only
 * the model variables you need.
 *
 * I noticed that if form models are the way I like form in a back-office (with lot of
 * auto-generated forms), in the front however, I prefer to use the on-the-fly technique,
 * which is an old one but pragmatic, maybe the simplest to understand.
 * Probably because front forms have a well defined set of fields we can agree on,
 * which is not the case in the case of an auto-generated admin where we don't know
 * the fields by advance.
 *
 *
 *
 *
 * The model of the on-the-fly form uses prefixes to organize the data.
 * Here is a typical on-the-fly form model:
 *
 * - formAction => "",
 * - formMethod => "post",
 * - nameEmail => "email",
 * - namePass => "pass",
 * - namePass2 => "pass2",
 * - nameKey => "key",
 * - nameNewsletter => "newsletter",
 * - valueEmail => "",
 * - valuePass => "",
 * - valuePass2 => "",
 * - valueKey => $key,
 * - checkedNewsletter => "",
 * - errorEmail => "",
 * - errorPass => "",
 * - errorPass2" => "",
 *
 *
 *
 * As you can guess, we have the following prefixes:
 *
 * - name: indicate the html name to use
 * - value: indicate the html value to use.
 *          For a unique checkbox, use the checked prefix instead
 * - checked: this is only for checkbox
 *          for checkbox, the value is either an empty string, or the "checked" string
 *          that we can directly inject in the html.
 * - error: indicate the error message to display (only one, not an array of messages,
 *           because the philosophy is to alleviate the template author's work, so just
 *           a string is a no brainer for a template author, whereas a hybrid string|array
 *           field forces the template author to make one more if in her template, multiply
 *           this by the number of fields and you should understand why we keep it to just
 *           a string)
 *
 *
 * So that's it!
 * Very intuitive, straight to the point.
 * The template author is a happy guy, because he can just do whatever he wants,
 * the on-the-fly model is very light and integrates very well with ANY (and I really mean ANY)
 * form design.
 *
 *
 *
 *
 *
 *
 * HOWEVER
 * ===================
 * Now that we've seen the good parts of the on-the-fly form for the template author,
 * let's see how we handle the form submit server side.
 *
 * Hmmm, back to the old school ways of handling a form I guess, we just have to do it by hand.
 *
 * In some degrees, it's good to write your forms validation/handling by hand,
 * but sometimes, it's just too repetitive, and that's why this class is here.
 *
 * Basically, I was motivated to do the form validation by hand, but then the
 * required validator, or even the email, those are so common, I couldn't stand doing
 * it for every field, every time I have a front form to create.
 *
 * So, here are a few helper methods for you.
 * Not too much, because as I said, it's good to type some code, because then you SEE
 * exactly what's going on, but just enough that you can trigger an auto-validator routine
 * for simple things like required fields, or email fields, those form validation patterns,
 * as ancient as the web.
 *
 *
 *
 *
 * This is not a static oriented class, so that you can override the validation messages
 * being returned (this email is invalid, ...).
 *
 *
 *
 *
 *
 * Going further
 * ======================
 * Radio buttons
 *
 * If you have radio buttons, generally you have only two or three items, each having its own value.
 * Here is what you should to create a color control with three radio buttons: red, blue, green:
 *
 * - nameColor
 * - valueColor: (choose the default value here)
 * - valueColor__Red: red
 * - valueColor__Blue: blue
 * - valueColor__Green: green
 *
 * - checkedColor__Red:
 * - checkedColor__Blue:
 * - checkedColor__Green:
 *
 * Note that the value are fixed for the "value" prefixed fields (valueColor__Red, valueColor__Green, valueColor__Blue).
 * You put a double underscore between the value, and a value identifier representing the input value.
 *
 *
 *
 *
 *
 */
class OnTheFlyFormValidator
{

    private $_argString;
    private $validatorMessage;

    public static function create()
    {
        return new static();
    }

    public function setMessage(OnTheFlyFormValidatorMessageInterface $message)
    {
        $this->validatorMessage = $message;
        return $this;
    }


    public static function initModel(array &$model)
    {
        self::addBlankErrors($model);


        // infuse default values to checkboxes
        foreach ($model as $k => $v) {
            if (
                0 === strpos($k, 'value')
            ) {
                if (false !== ($pos = strpos($k, '__'))) {
                    $label = substr($k, 5);
//                    $rawKey = substr($label, 0, $pos);
                    $rawKey = substr($k, 0, $pos);
                    if (array_key_exists($rawKey, $model)) {
                        $val = $model[$rawKey];
                        if ($v === $val) {
                            $checkedLabel = 'checked' . $label;
                            if (array_key_exists($checkedLabel, $model)) {
                                $model[$checkedLabel] = 'checked';
                            }
                        }
                    }
                }
            }
        }

    }

    public static function addBlankErrors(array &$model)
    {
        foreach ($model as $k => $v) {
            if (0 === strpos($k, 'name')) {
                $nameLabel = substr($k, 4);
                if (false === strpos($nameLabel, '__')) {
                    $model['error' . $nameLabel] = "";
                }
            }
        }
    }

    public static function wasPosted(array $model, array $userData)
    {
        return array_key_exists($model['nameKey'], $userData) && $model['valueKey'] === $userData[$model['nameKey']];
    }


    /**
     * If your model follows strictly the naming convention described above,
     * this method will fill automatically the "value" prefixed fields, and "checked" prefixed fields.
     *
     */
    public static function infuse(array &$model, array $userData)
    {
        foreach ($model as $k => $v) {
            if (0 === strpos($k, 'name')) {
                $nameLabel = substr($k, 4);

                // inject value
                $valueKey = "value" . $nameLabel;
                if (
                    array_key_exists($valueKey, $model) &&
                    array_key_exists($v, $userData)
                ) {
                    $model[$valueKey] = $userData[$v];
                }

                // inject single checkboxes
                $checkedKey = "checked" . $nameLabel;
                if (
                array_key_exists($checkedKey, $model)
                ) {
                    if (array_key_exists($v, $userData)) {
                        $model[$checkedKey] = 'checked';
                    } else {
                        $model[$checkedKey] = "";
                    }
                }
            } // multiple radio boxes
            elseif (0 === strpos($k, 'checked')) {
                $checkedLabel = substr($k, 7);
                if (false !== ($pos = strpos($checkedLabel, '__'))) {

                    $prefix = substr($checkedLabel, 0, $pos);
                    $valueKey = "value" . $checkedLabel;
                    $nameKey = "name" . $prefix;

                    if (
                        array_key_exists($nameKey, $model) &&
                        array_key_exists($valueKey, $model) &&
                        array_key_exists($model[$nameKey], $userData)
                    ) {
                        if ($model[$valueKey] === $userData[$model[$nameKey]]) {
                            $model[$k] = 'checked';
                        } else {
                            $model[$k] = '';
                        }
                    }
                }
            }
        }
    }


    /**
     *
     * Test all fields validators, and returns whether all of them have passed or not.
     * Also set the error messages in the model, using the error prefix.
     *
     *
     * Will add two extra properties:
     *
     * - _formErrors: an array of form errors
     * - formErrors: the html version of the _formErrors array
     *
     *
     *
     * @param array $fields2Validator , array of field => validator
     *
     *              - field: string, name of the field: for instance email.
     *                  It is expected that the value for this field is found in the
     *                  model (for instance valueEmail).
     *                  If not, the error method will be triggered, which by default throws
     *                  an exception.
     *
     *              - validator: string|array, the validateIdentifier or array of validateIdentifier.
     *                      The value will be tested against the identifier.
     *                      The validation logic depends on the identifier.
     *                      If one validator fails, the method returns false,
     *                      and an error message is set for this field, using the error prefix
     *                      (for instance errorEmail).
     *
     *
     *                      The following validateIdentifiers are available:
     *                          - required: check that the field exists and is not an empty string or an empty number (0).
     *                          - email: check that the field has a valid email syntax
     *                          - sameAs:$fieldName: check that the field has the same value as the field which name is $fieldName.
     *                          - min:$nbChars: check that the field's length is more or equal to $nbChars characters (utf8)
     *
     *                      By the way, notice that we separate the validator identifier from its argument(s) with a colon.
     *
     *
     *
     *
     * @param array $model , the on-the-fly form model, with the values already injected by $_POST (or $_GET).
     *
     * @return bool, whether or not all fields's validation passed
     */
    public function validate(array $fields2Validator, array &$model)
    {
        $allGood = true;

        $model['_formErrors'] = [];

        foreach ($fields2Validator as $field => $validators) {
            if (!is_array($validators)) {
                $validators = [$validators];
            }

            $key = "value" . ucfirst($field);

            if (array_key_exists($key, $model)) {
                $value = $model[$key];

                foreach ($validators as $validator) {

                    $p = explode(':', $validator, 2);
                    $validator = $p[0];
                    $argString = "";
                    if (2 === count($p)) {
                        $argString = $p[1];
                    }


                    $this->_argString = $argString;
                    switch ($validator) {
                        case 'required':
                            if (empty($value)) {
                                $this->addValidateError($field, "required", $model);
                                $allGood = false;
                                break 2;
                            }
                            break;
                        case 'email':
                            if (false === FormValidatorTool::isEmail($value)) {
                                $this->addValidateError($field, "email", $model);
                                $allGood = false;
                                break 2;
                            }
                            break;
                        case 'sameAs':
                            $targetKey = "value" . ucfirst($argString);
                            if (false === array_key_exists($targetKey, $model) || $value !== $model[$targetKey]) {
                                $this->addValidateError($field, "match", $model);
                                $allGood = false;
                                break 2;
                            }
                            break;
                        case 'min':
                            $strlen = mb_strlen($value);
                            if ($strlen < $argString) {
                                $this->addValidateError($field, "minLength", $model);
                                $allGood = false;
                                break 2;
                            }
                            break;
                        case 'exactLength':
                            $strlen = mb_strlen($value);
                            if ((int)$strlen !== (int)$argString) {
                                $this->addValidateError($field, "exactLength", $model, [
                                    'currentLength' => $strlen,
                                ]);
                                $allGood = false;
                                break 2;
                            }
                            break;
                        default:
                            $this->error("Unknown validator: $validator");
                            return false;
                            break;
                    }
                }

            } else {
                $this->error("key not found in model: $key");
                return false;
            }
        }


        $model['formErrors'] = $this->getFormErrors($model['_formErrors']);

        return $allGood;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function error($msg) // override me
    {
        throw new OnTheFlyFormValidatorException($msg);
    }


    protected function getErrorMessage($errorMsg, $field, array $model)// override me (translation?)
    {
        return $errorMsg;
    }


    protected function getFormErrors(array $errors)
    {
        $s = '';
        if (count($errors) > 0) {

            $s .= '<ul class="otff-errors">';
            foreach ($errors as $error) {
                $s .= '<li>' . $error . '</li>';
            }
            $s .= '</ul>';
        }
        return $s;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function addValidateError($field, $errorCode, array &$model, array $extraTags = [])
    {
        $key = "error" . ucfirst($field);


        $map = [
            "required" => "This field is required",
            "email" => "This is not a valid email",
            "match" => "This value doesn't match the {field} value",
            "minLength" => "This field must contain at least {argString} characters",
            "exactLength" => "This field must contain exactly {argString} characters, {currentLength} given",
        ];

        if ($this->validatorMessage instanceof OnTheFlyFormValidatorMessageInterface) {
            $this->validatorMessage->remap($map);
        }

        $errorMsg = $map[$errorCode];


        $abstractErrorMsg = $this->getErrorMessage($errorMsg, $field, $model);
        $concreteErrorMsg = str_replace(['{field}', '{argString}'], [$field, $this->_argString], $abstractErrorMsg);

        $keys = array_keys($extraTags);
        $keys = array_map(function ($v) {
            return '{' . $v . '}';
        }, $keys);

        $concreteErrorMsg = str_replace($keys, array_values($extraTags), $concreteErrorMsg);
        $model[$key] = $concreteErrorMsg;
        $model['_formErrors'][] = $field . ": " . $concreteErrorMsg;
    }


}

