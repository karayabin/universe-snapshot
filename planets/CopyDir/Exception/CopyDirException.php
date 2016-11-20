<?php

namespace CopyDir\Exception;

/*
 * LingTalfi 2015-10-19
 */
use Exception;

class CopyDirException extends \Exception
{


    public $errorArray;

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorArray = [];
    }


}
