<?php


namespace Kamille\Utils\Claws\Error;


class ClawsWidgetError
{
    private $errorCode;
    private $errorTitle;
    private $errorMessage;


    public function __construct()
    {
        $this->errorCode = 0;
        $this->errorTitle = "";
        $this->errorMessage = "";
    }

    public static function create()
    {
        return new static();
    }

    public function getModel()
    {
        return [
            "errorCode" => $this->errorCode,
            "errorTitle" => $this->errorTitle,
            "errorMessage" => $this->errorMessage,
        ];
    }


    public static function modelIsErroneous(array $model)
    {
        return array_key_exists('errorCode', $model);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorTitle()
    {
        return $this->errorTitle;
    }

    public function setErrorTitle($errorTitle)
    {
        $this->errorTitle = $errorTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }


}