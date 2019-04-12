<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The ValidatorInterface interface.
 */
interface ValidatorInterface
{

    /**
     * Tests and returns whether the given value matches the criterion
     * of the validator.
     *
     * The field name is the human name of the field, it will appear in
     * the resulting error message most of the time.
     *
     *
     * If the test fails (the method returns false), then
     * the error message is accessible via the $error variable.
     * It's a string.
     *
     *
     *
     * Note: having both the fieldName (which is the error name) and the field is redundant on purpose.
     * That's because most of the validators will only need the fieldName.
     * In some rare cases though, the validator would benefit having access to the original field instance.
     * This is the case for CSRFValidator, which would drain the csrf token from the CSRFField.
     *
     *
     *
     * @param $value
     * @param string $fieldName
     * @param FieldInterface $field
     * @param string|null $error
     * @return bool
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool;
}