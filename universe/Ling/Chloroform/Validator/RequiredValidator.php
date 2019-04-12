<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The RequiredValidator class.
 *
 * If the value is a string, it validates only if it's not the empty string.
 * If the value is array-ish (an html name ending with []), it validates only if the value is not null.
 *
 *
 * So if the value is null, the validation will fail.
 * But if the value is 0, the validation will succeed.
 *
 *
 *
 *
 */
class RequiredValidator extends AbstractValidator
{
    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (
            null === $value ||
            (is_string($value) && '' === trim($value)) ||
            (is_array($value) && empty($value))
        ) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
            ]);
            return false;
        }
        return true;
    }
}