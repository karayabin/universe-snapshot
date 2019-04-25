<?php


namespace Ling\Chloroform\Validator;


use Ling\Chloroform\Exception\ChloroformException;
use Ling\Chloroform\Field\FieldInterface;

/**
 * The FileMimeTypeValidator class.
 * This class validates the mime type of the posted file (usually in $_FILES).
 *
 *
 *
 */
class FileMimeTypeValidator extends AbstractValidator
{


    /**
     * This property holds the allowedMimeTypes for this instance.
     * @var array
     */
    protected $allowedMimeTypes;


    /**
     * @overrides
     */
    public function __construct()
    {
        parent::__construct();
        $this->allowedMimeTypes = [];
    }

    /**
     * Sets the allowedMimeTypes.
     *
     * @param array $allowedMimeTypes
     * @return $this
     */
    public function setMimeTypes(array $allowedMimeTypes)
    {
        $this->allowedMimeTypes = $allowedMimeTypes;
        return $this;
    }


    /**
     * @implementation
     */
    public function test($value, string $fieldName, FieldInterface $field, string &$error = null): bool
    {
        if (false === is_array($value)) {
            throw new ChloroformException("This validator only works with a file array.");
        }

        if (false === array_key_exists('type', $value)) {
            throw new ChloroformException("This validator only works with a file array containing the type key.");
        }

        if (false === array_key_exists('error', $value)) {
            throw new ChloroformException("This validator only works with a file array containing the type error.");
        }

        if (empty($this->allowedMimeTypes)) {
            throw new ChloroformException("The allowedMimeTypes array cannot be empty. Use the setMimeTypes method.");
        }


        if (\UPLOAD_ERR_NO_FILE === $value['error']) {
            // if the file wasn't uploaded, we validate (it's not the wrong mime type)
            return true;
        }


        $type = $value['type'];


        if (false === in_array($type, $this->allowedMimeTypes)) {
            $error = $this->getErrorMessage("main", [
                "fieldName" => $fieldName,
                "mimeType" => $type,
                "allowedMimeTypes" => implode(', ', $this->allowedMimeTypes),
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
            "allowed_mime_types" => $this->allowedMimeTypes,
        ]);
    }
}