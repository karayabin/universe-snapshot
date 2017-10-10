<?php


namespace FormModel\Control;


class InputTickableControl extends InputControl
{

    private $_labelLeftSide;
    private $_value;
    private $_items;

    public function __construct()
    {
        parent::__construct();
        $this->_labelLeftSide = false;
        $this->_items = [];
    }


    public function value($value)
    {
        // should be an array?
        $this->_value = $value;
        return $this;
    }

    /**
     * $items: array of value => label
     */
    public function setItems(array $items)
    {
        $this->_items = $items;
        return $this;
    }

    public function labelLeftSide($labelLeftSide)
    {
        $this->_labelLeftSide = $labelLeftSide;
        return $this;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function prepareArray(array &$array)
    {
        $array['labelLeftSide'] = $this->_labelLeftSide;
        $array['value'] = $this->_value;
        $array['items'] = $this->_items;
    }
}