<?php


namespace Ling\FormModel\Validation\ControlTest;


abstract class ControlTest implements ControlTestInterface
{
    private $errorFormatString;

    public function __construct()
    {
        //
    }

    public static function create()
    {
        return new static();
    }

    public function getErrorFormatString()
    {
        return $this->errorFormatString;
    }

    public function setErrorFormatString($errorFormatString)
    {
        $this->errorFormatString = $errorFormatString;
        return $this;
    }


}