<?php


namespace FormModel\Control;


class TextAreaControl extends HtmlControl
{

    private $_value;

    public function __construct()
    {
        parent::__construct();
        $this->type = "textarea";
    }

    public function value($value)
    {
        $this->_value = $value;
        return $this;
    }

    public function setValue($value)
    {
        return $this->value($value);
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    protected function prepareArray(array &$array)
    {
        $array['value'] = $this->_value;
    }
}