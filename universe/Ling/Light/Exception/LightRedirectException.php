<?php


namespace Ling\Light\Exception;


use Throwable;

/**
 * The LightRedirectException class.
 */
class LightRedirectException extends LightException
{

    /**
     * This property holds the redirectRoute for this instance.
     * @var string
     */
    protected $redirectRoute;


    /**
     * @overrides
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->redirectRoute = null;
    }


    /**
     * Sets the redirectRoute.
     *
     * @param string $redirectRoute
     * @return $this
     */
    public function setRedirectRoute(string $redirectRoute): LightRedirectException
    {
        $this->redirectRoute = $redirectRoute;
        return $this;
    }



    /**
     * Returns the redirectRoute of this instance.
     *
     * @return string
     */
    public function getRedirectRoute(): string
    {
        return $this->redirectRoute;
    }


}