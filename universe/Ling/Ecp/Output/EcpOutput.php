<?php


namespace Ling\Ecp\Output;


class EcpOutput implements EcpOutputInterface
{
    private $successMsg;
    private $errorMsg;


    public function __construct()
    {
        $this->successMsg = null;
        $this->errorMsg = null;
    }

    public static function create()
    {
        return new static();
    }


    public function success($msg)
    {
        $this->successMsg = $msg;
        return $this;
    }

    public function error($msg)
    {
        $this->errorMsg = $msg;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    public function getSuccess()
    {
        return $this->successMsg;
    }

    public function getError()
    {
        return $this->errorMsg;
    }
}