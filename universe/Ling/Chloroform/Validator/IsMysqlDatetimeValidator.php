<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Field\FieldInterface;

/**
 * The IsMysqlDatetimeValidator class.
 *
 * Validates only if the value is a valid mysql datetime (yyyy-mm-dd hh:mm:ss).
 *
 * If the acceptEmpty flag is true (defaults to false), will also accept the empty string.
 *
 *
 *
 */
class IsMysqlDatetimeValidator extends AbstractValidator
{


    /**
     * This property holds the acceptEmpty for this instance.
     * @var bool
     */
    protected $acceptEmpty;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->acceptEmpty = false;
    }


    /**
     * Sets the acceptEmpty.
     *
     * @param bool $acceptEmpty
     */
    public function setAcceptEmpty(bool $acceptEmpty)
    {
        $this->acceptEmpty = $acceptEmpty;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {

        if (false === $this->acceptEmpty && (
                null === $value ||
                (is_string($value) && '' === trim($value))
            )) {
            $error = $this->getErrorMessage("acceptEmpty", [
                "fieldName" => $fieldName,
            ]);
            return false;
        }


        if (false ===is_string($value) || 0 === preg_match('![0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}!', $value)) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
            ]);
            return false;
        }
        return true;
    }



    /**
     * @overrides
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            "acceptEmpty" => $this->acceptEmpty,
        ]);
    }
}