<?php


namespace Ling\UltimateUploadHandler\Constraint\I18n\French;


use Ling\UltimateUploadHandler\Constraint\SizeConstraint;

class FrenchSizeConstraint extends SizeConstraint
{


    public function __construct()
    {
        parent::__construct();
        $this->messages["too_large"] = "
Le fichier est trop gros ({{currentFileSize}}). 
La taille maximum autorisée est {{maxFileSize}}.";
    }
}