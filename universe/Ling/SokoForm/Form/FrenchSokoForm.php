<?php


namespace Ling\SokoForm\Form;


use Ling\SokoForm\Translator\SokoValidationRuleTranslator;

class FrenchSokoForm extends SokoForm
{
    public function __construct()
    {
        parent::__construct();
        SokoValidationRuleTranslator::setLang("fra");
    }

}