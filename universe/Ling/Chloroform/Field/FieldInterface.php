<?php

namespace Ling\Chloroform\Field;


use Ling\Chloroform\DataTransformer\DataTransformerInterface;
use Ling\Chloroform\Validator\ValidatorInterface;

/**
 * The FieldInterface interface.
 */
interface FieldInterface
{

    /**
     * Returns the field id.
     * For more info, see the @concept(field id section).
     *
     * @return string
     */
    public function getId();


    /**
     * Adds a validator to this instance.
     *
     * @param ValidatorInterface $validator
     * @return mixed
     */
    public function addValidator(ValidatorInterface $validator);



    /**
     * Sets the dataTransformer for this field.
     *
     * @param DataTransformerInterface $dataTransformer
     * @return FieldInterface
     */
    public function setDataTransformer(DataTransformerInterface $dataTransformer): FieldInterface;


    /**
     * Tests and returns whether every validator attached to this instanced passed.
     *
     * If not, false is returned and the errors array is fed with error message(s).
     * Errors should then be retrieved using the getErrors method.
     *
     *
     *
     * @param mixed $value
     * The value to validate.
     *
     *
     * @return bool
     */
    public function validates($value): bool;


    /**
     * Returns an array of error messages.
     * Each error message is a string.
     *
     * Errors are only provided after a call to the validates method.
     *
     * Note: for consistency/simplicity reasons, errors should be only provided by
     * validators (that's why we don't have an addError method).
     *
     *
     * @return array
     */
    public function getErrors(): array;

    /**
     * Sets the value for this instance.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value);

    /**
     * Returns the value of the field.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Returns the fallback value, which defaults to null.
     * See the @page(chloroform conception notes) for more details about the fallback value.
     *
     * @return mixed
     */
    public function getFallbackValue();



    /**
     * Returns the array representation of the field.
     * It should contain at least the following keys:
     *
     *
     * ```yaml
     * - id: string                  # the field id
     * - label: string|null          # the label
     * - hint: string|null           # the hint (often used in placeholder)
     * - errorName: string           # the label to use in an error message
     * - value: mixed                # the value of the field. Could be null, an array or a scalar.
     * - htmlName: string            # the html name (often used in the name attribute of html tags)
     * - errors: array               # the error messages. Each error message is a string.
     * - className: string           # the name of the field class (this is addressed to renderers, so that they know how to render the field)
     * ```
     *
     *
     *
     * @return array
     */
    public function toArray(): array;


    /**
     * Returns whether this field contains @page(very important data).
     * @return bool
     */
    public function hasVeryImportantData(): bool;


    /**
     * Returns the data transformer of this field if any, or null otherwise.
     *
     * @return DataTransformerInterface|null
     */
    public function getDataTransformer(): ?DataTransformerInterface;
}