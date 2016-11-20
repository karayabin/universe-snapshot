<?php

namespace RssUtil\RssWriter\Exception;

/*
 * LingTalfi 2015-10-23
 */
use Exception;

class RssWriterException extends \Exception
{

    private $simpleXmlErrors;

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous); 
        $this->simpleXmlErrors = [];
    }

    public function getSimpleXmlErrors()
    {
        return $this->simpleXmlErrors;
    }

    public function setSimpleXmlErrors(array $simpleXmlErrors)
    {
        $this->simpleXmlErrors = $simpleXmlErrors;
        return $this;
    }
    
    
    


}
