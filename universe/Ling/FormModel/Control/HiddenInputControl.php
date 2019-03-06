<?php


namespace Ling\FormModel\Control;


class HiddenInputControl extends InputControl
{
    public function __construct()
    {
        parent::__construct();
        $this->type = "input";
        $this->addHtmlAttribute('type', 'hidden');
    }
}