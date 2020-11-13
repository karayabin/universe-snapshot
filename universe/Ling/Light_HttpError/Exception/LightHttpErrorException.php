<?php


namespace Ling\Light_HttpError\Exception;


use Throwable;

/**
 * The LightHttpErrorException class.
 */
class LightHttpErrorException extends \Exception
{

    /**
     * This property holds the httpStatusCode for this instance.
     * @var int
     */
    protected $httpStatusCode;



    /**
     * Builds the LightException instance.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    /**
     * Returns the httpStatusCode of this instance.
     *
     * @return int
     */
    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    /**
     * Sets the httpStatusCode.
     *
     * @param int $httpStatusCode
     */
    public function setHttpStatusCode(int $httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }
}