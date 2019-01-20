<?php


namespace FormModel\Control;


class InputFileControl extends InputControl
{
    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttribute("type", "file");
    }
}