<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\CSRFField;
use Ling\Chloroform\Field\FieldInterface;
use Ling\CSRFTools\CSRFProtector;

/**
 * The CSRFValidator class.
 *
 *
 * It validates only if the user typed at least $min character(s) in a text field.
 *
 *
 */
class CSRFValidator extends AbstractValidator
{

    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if ($field instanceof CSRFField) {

            if (null === $value) {
                $value = "";
            }
            /**
             * Note: Chloroform implementation of CSRF token doesn't follow the recommendations
             * of the [CSRFTools](https://github.com/lingtalfi/CSRFTools#how-to).
             *
             * And so in this implementation the createToken method is called AFTER the isValid method.
             * But this works well.
             *
             *
             */
            if (false === CSRFProtector::inst()->isValid($value, $field->getCSRFIdentifier())) {
                $error = $this->getErrorMessage("main", [
                    "fieldName" => $fieldName,
                ]);
                return false;
            }
            return true;
        }

        $className = get_class($field);
        throw new ChloroformException("The CSRFValidator only works against a CSRFField, field of class $className given.");
    }
}