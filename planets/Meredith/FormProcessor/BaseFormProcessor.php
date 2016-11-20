<?php

namespace Meredith\FormProcessor;

/*
 * LingTalfi 2015-12-21
 */
abstract class BaseFormProcessor implements FormProcessorInterface
{

    private $successMsg;
    private $errorMsg;

    public function __construct()
    {
        $this->errorMsg = "Data not received yet";
    }


    abstract protected function doProcess(array $data);


    public static function create()
    {
        return new static();
    }

    public function getSuccessMsg()
    {
        return $this->successMsg;
    }

    public function getErrorMsg()
    {
        return $this->errorMsg;
    }


    /**
     * @param array $data
     * @return static
     */
    public function process(array $data)
    {
        $this->doProcess($data);
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function setErrorMsg($errorMsg)
    {
        $this->errorMsg = $errorMsg;
        return $this;
    }

    protected function setSuccessMsg($successMsg)
    {
        $this->successMsg = $successMsg;
        return $this;
    }

}
