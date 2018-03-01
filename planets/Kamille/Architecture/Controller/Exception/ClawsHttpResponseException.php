<?php


namespace Kamille\Architecture\Controller\Exception;


use Kamille\Architecture\Response\Web\HttpResponseInterface;
use Throwable;

class ClawsHttpResponseException extends \Exception
{
    /**
     * @var $httpResponse HttpResponseInterface
     */
    private $httpResponse;


    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    public static function create()
    {
        return new static();
    }

    /**
     * @return HttpResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    public function setHttpResponse(HttpResponseInterface $httpResponse)
    {
        $this->httpResponse = $httpResponse;
        return $this;
    }


}