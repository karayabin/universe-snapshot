<?php


namespace Ling\SimpleCurl\Response;


/**
 * The SimpleCurlResponse class.
 * It represents the response of a curl method call.
 *
 * A response contains the following elements:
 *
 * - a http code: the returned http code
 * - a body: the body returned with the response, if available (i.e. some methods don't return a body)
 *
 *
 *
 */
class SimpleCurlResponse implements SimpleCurlResponseInterface
{


    /**
     * This property holds the headers for this instance.
     * @var array
     */
    protected $headers;

    /**
     * This property holds the body for this instance.
     * @var null
     */
    protected $body;

    /**
     * This property holds the rawInfo array for this instance.
     * @var array
     */
    protected $rawInfo;


    /**
     * Builds the SimpleCurlResponse instance.
     */
    public function __construct()
    {
        $this->headers = [];
        $this->rawInfo = [];
        $this->body = null;
    }


    /**
     * @implementation
     */
    public function getHttpCode()
    {
        return $this->rawInfo['http_code'];
    }

    /**
     * @implementation
     */
    public function getHeaders()
    {
        return $this->headers;
    }


    /**
     * @implementation
     */
    public function getBody()
    {
        return $this->body;
    }


    /**
     * @implementation
     */
    public function getRawInfo()
    {
        return $this->rawInfo;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the headers.
     *
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Sets the body.
     *
     * @param null $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Sets the rawInfo.
     *
     * @param array $rawInfo
     */
    public function setRawInfo(array $rawInfo)
    {
        $this->rawInfo = $rawInfo;
    }




}