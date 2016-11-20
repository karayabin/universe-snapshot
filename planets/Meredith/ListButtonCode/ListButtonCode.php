<?php

namespace Meredith\ListButtonCode;

/**
 * LingTalfi 2015-12-28
 */
class ListButtonCode implements ListButtonCodeInterface
{
    private $code;
    protected $text;

    public function __construct()
    {
        //
    }

    public static function create()
    {
        return new static();
    }

    public function render()
    {
        return $this->code;
    }

//    public function getName()
//    {
//        $c = new \ReflectionClass(get_called_class());
//        return strtolower(substr($c->getShortName(), 0, -14));
//    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    protected function escape($str)
    {
        return str_replace('"', '\"', $str);
    }


}