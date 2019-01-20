<?php


namespace SokoForm\Form;


use SokoForm\Translator\SokoValidationRuleTranslator;

class FrenchSokoForm extends SokoForm
{
    public function __construct()
    {
        parent::__construct();
        SokoValidationRuleTranslator::setLang("fra");
    }

}