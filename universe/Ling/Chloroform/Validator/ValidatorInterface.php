<?php


namespace Ling\Chloroform\Validator;


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
     * @param $value
     * @param string $fieldName
     * @param string|null $error
     * @return bool
     */
    public function test($value, string $fieldName, string &$error = null): bool;
}