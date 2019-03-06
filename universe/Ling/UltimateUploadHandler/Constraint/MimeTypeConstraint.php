<?php


namespace Ling\UltimateUploadHandler\Constraint;


use Ling\Bat\MimeTypeTool;

class MimeTypeConstraint extends BaseConstraint
{

    protected $allowedMimeTypes;

    public function __construct()
    {
        parent::__construct();
        $this->allowedMimeTypes = null; // null means all mime types accepted
        $this->messages["invalid_mime"] = "The mime type of the file is invalid ({{mimeType}}). Allowed mime types are {{allowedMimeTypes}}";
    }

    public function setAllowedMimeTypes(array $allowedMimeTypes)
    {
        $this->allowedMimeTypes = $allowedMimeTypes;
        return $this;
    }

    public function check(array $phpFile, string &$errorMessage = null)
    {
        $mimeType = MimeTypeTool::getMimeType($phpFile['tmp_name']);
        if (false === in_array($mimeType, $this->allowedMimeTypes)) {
            $errorMessage = str_replace([
                '{{mimeType}}',
                '{{allowedMimeTypes}}',
            ], [
                $mimeType,
                implode(' , ', $this->allowedMimeTypes),
            ], $this->messages['invalid_mime']);
            return false;
        }

        return true;
    }


}