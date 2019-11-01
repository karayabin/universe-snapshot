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
     * This property holds the csrfProtector for this instance.
     * @var CSRFProtector
     */
    protected $csrfProtector;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->csrfProtector = null;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if ($field instanceof CSRFField) {

            if (null === $value) {
                $value = "";
            }
            if (false === $this->csrfProtector->isValid($field->getCsrfIdentifier(), $value, true)) {
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



    /**
     * Sets the csrfProtector.
     *
     * @param CSRFProtector $csrfProtector
     * @return CSRFValidator
     */
    public function setCsrfProtector(CSRFProtector $csrfProtector)
    {
        $this->csrfProtector = $csrfProtector;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the csrf protector instance.
     * @return CSRFProtector
     */
    protected function getCsrfProtector(): CSRFProtector
    {
        if (null === $this->csrfProtector) {
            $this->csrfProtector = CSRFProtector::inst();
        }
        return $this->csrfProtector;
    }
}