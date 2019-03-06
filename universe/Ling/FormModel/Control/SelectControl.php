<?php


namespace Ling\FormModel\Control;


class SelectControl extends HtmlControl
{

    private $_items;
    private $_multiple;
    private $_value;

    public function __construct()
    {
        parent::__construct();
        $this->type = "select";
        $this->_items = [];
        $this->_multiple = false;
    }

    /**
     * $items: array of value => label
     */
    public function setItems(array $items)
    {
        $this->_items = $items;
        return $this;
    }

    public function multiple()
    {
        $this->addHtmlAttribute(null, "multiple");
        return $this;
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
        $array['items'] = $this->_items;
    }
}