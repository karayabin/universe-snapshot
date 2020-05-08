<?php


namespace Ling\Light\Http;


/**
 * The HttpJsonResponse class.
 *
 */
class HttpJsonResponse extends HttpResponse
{

    /**
     * @overrides
     */
    public function __construct($body = "", $code = 200)
    {
        parent::__construct(json_encode($body), $code);
    }


    /**
     * Creates and returns the http json response instance.
     *
     *
     * @param mixed $data
     * The raw data. Note: this method will convert it to json internally.
     *
     *
     *
     * Note: this method has no benefit over a regular constructor, but I keep it for legacy purpose.
     *
     *
     * @return $this
     */
    public static function create($data)
    {
        return new static($data);
    }


    /**
     * @overrides
     */
    protected function sendHeaders()
    {
        $this->setHeader("Content-type", 'application/json');
        return parent::sendHeaders();
    }


}