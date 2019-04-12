<?php

namespace Ling\Chloroform\Field;


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
     * Tests and returns whether every validator attached to this instanced passed.
     *
     * If not, false is returned and the errors array is fed with error message(s).
     * Errors should then be retrieved using the getErrors method.
     *
     *
     * If the injectValues flag is set to true, the value will be injected into the field.
     *
     *
     *
     * @param array $postedData
     * @param bool $injectValues = true
     *
     *
     * @return bool
     */
    public function validates(array $postedData, bool $injectValues = true): bool;


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
}