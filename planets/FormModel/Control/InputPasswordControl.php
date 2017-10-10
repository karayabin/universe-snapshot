<?php


namespace FormModel\Control;


class InputPasswordControl extends InputTextControl
{
    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttribute("type", "password");
    }
}