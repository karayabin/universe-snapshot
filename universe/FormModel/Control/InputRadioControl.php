<?php


namespace FormModel\Control;


class InputRadioControl extends InputTickableControl
{

    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttribute("type", "radio");
    }
}