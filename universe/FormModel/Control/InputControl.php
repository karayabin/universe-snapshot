<?php


namespace FormModel\Control;


class InputControl extends HtmlControl
{
    public function __construct()
    {
        parent::__construct();
        $this->type = "input";
    }

    public function value($value)
    {
        $this->addHtmlAttribute('value', $value);
        return $this;
    }

    public function setValue($value)
    {
        return $this->value($value);
    }
}