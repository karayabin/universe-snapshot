<?php


namespace Ling\FormModel\Control;


class InputCheckBoxControl extends InputTickableControl
{

    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttribute("type", "checkbox");
    }
}