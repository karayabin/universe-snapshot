<?php


namespace Ling\Light\Exception;


use Throwable;

/**
 * The LightException class.
 */
class LightException extends \Exception
{

    /**
     * This property holds the lightErrorCode for this instance.
     * It's a code that summarizes the error, and is meant to be handled by the error handlers
     * of the @object(Light) class.
     *
     *
     * @var string|null
     */
    protected $lightErrorCode;


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
        $this->lightErrorCode = null;
    }


    /**
     * Returns a static instance.
     *
     * @param string $message = ""
     * @param string $lightErrorCode = null
     * @return LightException
     */
    public static function create(string $message = "", string $lightErrorCode = null): self
    {
        $o = new static($message);
        $o->lightErrorCode = $lightErrorCode;
        return $o;
    }


    /**
     * Sets the lightErrorCode.
     *
     * @param string|null $lightErrorCode
     * @return $this
     */
    public function setLightErrorCode(string $lightErrorCode): LightException
    {
        $this->lightErrorCode = (string)$lightErrorCode;
        return $this;
    }


    /**
     * Returns the light error code, or null if not set.
     * @return string|null
     */
    public function getLightErrorCode()
    {
        return $this->lightErrorCode;
    }


}

