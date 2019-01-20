<?php


namespace Kamille\Exception;


use Throwable;

class KamilleEcpUserMessageException extends \Exception
{


    /**
     * @var $type , string (error|success), default=error
     */
    private $type;

    public static function create($message = "", $code = 0, Throwable $previous = null)
    {
        return new static($message, $code, $previous);
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}