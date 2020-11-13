<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The IsNumberValidator class.
 *
 * If the value is a number, it validates.
 *
 * A number is either an int, a float (the string form is accepted, since forms only provide string forms).
 *
 *
 * If the value is null, the validation will fail.
 *
 *
 *
 *
 */
class IsNumberValidator extends AbstractValidator
{
    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (
            false === is_numeric($value)
        ) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
            ]);
            return false;
        }
        return true;
    }
}