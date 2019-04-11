<?php

namespace Ling\Chloroform\Field;


use Ling\Chloroform\Helper\FieldHelper;
use Ling\Chloroform\Validator\ValidatorInterface;

/**
 * The AbstractField class.
 */
abstract class AbstractField implements FieldInterface
{


    /**
     * This property holds the id for this instance.
     * It's the field id.
     *
     * @var string
     */
    protected $id;

    /**
     * This property holds the label for this instance.
     * Usually, the label text is displayed in an html label tag.
     * @var string
     */
    protected $label;

    /**
     * This property holds the hint for this instance.
     * Usually, the hint text is displayed in some sort of html placeholder.
     * @var string
     */
    protected $hint;


    /**
     * This property holds the errorName for this instance.
     * How this field should be referenced in error messages.
     * This should be a lower case string (formatting will be done on the fly).
     *
     * @var string
     */
    protected $errorName;

    /**
     * This property holds the value for this instance.
     * @var mixed|null
     */
    protected $value;


    /**
     * This property holds the errors for this instance.
     *
     * An array of error messages (each being a string).
     * @var array
     */
    protected $errors;

    /**
     * This property holds the validators for this instance.
     *
     * An array of ValidatorInterface.
     * @var ValidatorInterface[]
     */
    protected $validators;

    /**
     * Builds the AbstractField instance.
     *
     *
     * The properties array should always contain at least the label for fields with label
     * (almost every field except the submit field and some other rare fields).
     *
     *
     *
     * The properties array can contain the following (see corresponding properties
     * in this class for more details):
     *
     * - label
     * - id (if not set, derived from the label)
     * - hint
     * - errorName (if not set, derived from the label)
     * - value
     *
     *
     *
     *
     * @param array $options
     */
    public function __construct(array $properties = [])
    {

        $this->label = $properties['label'] ?? null;
        $this->hint = $properties['hint'] ?? null;
        $this->value = $properties['value'] ?? null;
        if (array_key_exists("id", $properties)) {
            $this->id = $properties['id'];
        } else {
            $this->id = FieldHelper::getDefaultIdByLabel($this->label);
        }

        if (array_key_exists("errorName", $properties)) {
            $this->errorName = $properties['errorName'];
        } else {
            $this->errorName = FieldHelper::getDefaultErrorNameByLabel($this->label);
        }
        $this->errors = [];
        $this->validators = [];
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @implementation
     */
    public function addValidator(ValidatorInterface $validator)
    {
        $this->validators[] = $validator;
    }

    /**
     * @implementation
     */
    public function validates(array $postedData, bool $injectValues = true): bool
    {
        $id = $this->getId();
        $value = FieldHelper::getFieldValue($id, $postedData);


        // value injection?
        if (true === $injectValues) {
            $this->setValue($value);
        }


        // validation
        $isValid = true;
        if ($this->validators) {

            $fieldName = $this->errorName;

            foreach ($this->validators as $validator) {
                $error = null;
                if (false === $validator->test($value, $fieldName, $error)) {
                    /**
                     * Note: we don't break after the first failing test, we
                     * let the view sort it out.
                     */
                    $isValid = false;
                    $this->addError($error);
                }
            }


        }
        return $isValid;
    }


    /**
     * @implementation
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


    /**
     * @implementation
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * @implementation
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @implementation
     */
    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "label" => $this->label,
            "hint" => $this->hint,
            "errorName" => $this->errorName,
            "value" => $this->getValue(),
            "htmlName" => $this->id,
            "errors" => $this->errors,
        ];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the id.
     *
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * Sets the label.
     *
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * Sets the hint.
     *
     * @param string $hint
     */
    public function setHint(string $hint)
    {
        $this->hint = $hint;
    }

    /**
     * Sets the errorName.
     *
     * @param string $errorName
     */
    public function setErrorName(string $errorName)
    {
        $this->errorName = $errorName;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds an error message to this instance.
     * @param string $errorMessage
     */
    protected function addError(string $errorMessage)
    {
        $this->errors[] = $errorMessage;
    }
}