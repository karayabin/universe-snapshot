<?php


namespace FormModel\Control;


class InputTextControl extends InputControl
{

    public function __construct()
    {
        parent::__construct();
        $this->addHtmlAttribute("type", "text");
    }


    public function placeholder($placeholder)
    {
        $this->addHtmlAttribute("placeholder", $placeholder);
        return $this;
    }


}