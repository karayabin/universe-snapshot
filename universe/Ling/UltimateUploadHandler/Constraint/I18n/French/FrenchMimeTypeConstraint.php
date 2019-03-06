<?php


namespace Ling\UltimateUploadHandler\Constraint\I18n\French;


use Ling\UltimateUploadHandler\Constraint\MimeTypeConstraint;

class FrenchMimeTypeConstraint extends MimeTypeConstraint
{


    public function __construct()
    {
        parent::__construct();
        $this->messages["invalid_mime"] = "Le type mime du fichier est invalide ({{mimeType}}). Les types mime autorisés sont {{allowedMimeTypes}}";
    }
}