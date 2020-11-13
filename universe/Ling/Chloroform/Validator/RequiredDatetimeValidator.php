<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The RequiredDatetimeValidator class.
 *
 * Validates only if it's not the empty string and if the string doesn't contain the 0000-00-00 string/
 * So if the value is null, the validation will fail, because it will evaluate to the empty string.
 *
 *
 *
 */
class RequiredDatetimeValidator extends AbstractValidator
{
    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (
            null === $value ||
            (is_string($value) && '' === trim($value)) ||
            19 !== strlen($value) ||
            (false !== strpos($value, "0000-00-00 00:00:00"))
        ) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
            ]);
            return false;
        }
        return true;
    }
}