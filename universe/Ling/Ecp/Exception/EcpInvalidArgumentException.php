<?php


namespace Ling\Ecp\Exception;


class EcpInvalidArgumentException extends EcpException
{
    protected $missingKey;

    public static function create()
    {
        return new static();
    }

    /**
     * @return mixed
     */
    public function getMissingKey()
    {
        return $this->missingKey;
    }

    public function setMissingKey($missingKey)
    {
        $this->missingKey = $missingKey;
        return $this;
    }
}


