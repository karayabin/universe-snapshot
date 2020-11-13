<?php

namespace Ling\Chloroform\Field;


use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Helper\FieldHelper;
use Ling\Chloroform\Validator\ValidatorInterface;

/**
 * The AbstractField class.
 *
 * Note: it's a design choice that we don't have a setProperty method, this allows
 * child classes to deal with properties internally from the constructor, with the confidence that those
 * properties are not changed by a way they didn't expect.
 *
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
     * This property holds the fallbackValue for this instance.
     * @var mixed|null
     */
    protected $fallbackValue;


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
     * This property holds the properties for this instance.
     * @var array
     */
    protected $properties;


    /**
     * This property holds the hasVeryImportantData for this instance.
     * @var bool = true
     */
    protected $hasVeryImportantData;

    /**
     * This property holds the dataTransformer for this instance.
     * @var DataTransformerInterface
     */
    protected $dataTransformer;

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
     * It can also contain other properties that a field wants to provide to the rendering objects.
     * For instance: class, cols (for text area), ...
     *
     *
     *
     *
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {

        // quick save
        $this->properties = $properties;


        $this->label = $properties['label'] ?? null;
        $this->hint = $properties['hint'] ?? null;
        $this->value = $properties['value'] ?? null;
        $this->fallbackValue = $properties['fallbackValue'] ?? null;
        if (array_key_exists("id", $properties)) {
            $this->id = $properties['id'];
        } else {
            $this->id = FieldHelper::getDefaultIdByLabel($this->label);
        }

        if (array_key_exists("errorName", $properties)) {
            $this->errorName = $properties['errorName'];
        } else {
            $this->errorName = FieldHelper::getDefaultErrorNameByLabelOrId($this->label, $this->id);
        }
        $this->errors = [];
        $this->validators = [];
        $this->hasVeryImportantData = true;
        $this->dataTransformer = null;
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
    public function validates($value): bool
    {
        // validation
        $isValid = true;
        if ($this->validators) {

            $fieldName = $this->errorName;

            foreach ($this->validators as $validator) {
                $error = null;
                if (false === $validator->test($value, $fieldName, $this, $error)) {
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
        return $this;
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
    public function getFormattedValue()
    {
        return $this->value;
    }


    /**
     * @implementation
     */
    public function getFallbackValue()
    {
        return $this->fallbackValue;
    }


    /**
     * @implementation
     */
    public function toArray(): array
    {

        $validators = [];
        foreach ($this->validators as $validator) {
            $validators[] = $validator->toArray();
        }

        return array_merge($this->properties, [
            "id" => $this->id,
            "label" => $this->label,
            "hint" => $this->hint,
            "errorName" => $this->errorName,
            "value" => $this->getValue(),
            "htmlName" => FieldHelper::getHtmlNameById($this->id),
            "errors" => $this->errors,
            "className" => get_called_class(),
            "validators" => $validators,
        ]);
    }

    /**
     * @implementation
     */
    public function hasVeryImportantData(): bool
    {
        return $this->hasVeryImportantData;
    }

    /**
     * @implementation
     */
    public function getDataTransformer(): ?DataTransformerInterface
    {
        return $this->dataTransformer;
    }


    /**
     * @implementation
     */
    public function setDataTransformer(DataTransformerInterface $dataTransformer): FieldInterface
    {
        $this->dataTransformer = $dataTransformer;
        return $this;
    }

    /**
     * @implementation
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @implementation
     */
    public function setProperty(string $name, $value)
    {
        $this->properties[$name] = $value;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the id.
     *
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sets the fallbackValue.
     *
     * @param mixed|null $fallbackValue
     */
    public function setFallbackValue($fallbackValue)
    {
        $this->fallbackValue = $fallbackValue;
    }


    /**
     * Sets the label.
     *
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Sets the hint.
     *
     * @param string $hint
     * @return $this
     */
    public function setHint(string $hint)
    {
        $this->hint = $hint;
        return $this;
    }

    /**
     * Sets the errorName.
     *
     * @param string $errorName
     * @return $this
     */
    public function setErrorName(string $errorName)
    {
        $this->errorName = $errorName;
        return $this;
    }


    /**
     * Sets whether this field has @page(very important data).
     *
     * @param bool $hasVeryImportantData
     * @return $this
     */
    public function setHasVeryImportantData(bool $hasVeryImportantData): self
    {
        $this->hasVeryImportantData = $hasVeryImportantData;
        return $this;
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Adds an error message to this instance.
     * @param string $errorMessage
     * @return $this
     */
    protected function addError(string $errorMessage)
    {
        $this->errors[] = $errorMessage;
        return $this;
    }
}