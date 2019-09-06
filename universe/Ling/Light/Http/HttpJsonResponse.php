<?php


namespace Ling\Light\Http;


/**
 * The HttpJsonResponse class.
 *
 */
class HttpJsonResponse extends HttpResponse
{


    /**
     * Creates and returns the http json response instance.
     *
     *
     * @param mixed $data
     * The raw data. Note: this method will convert it to json internally.
     *
     * @return $this
     */
    public static function create($data)
    {
        return new static(json_encode($data));
    }


    /**
     * @overrides
     */
    protected function sendHeaders()
    {
        header("Content-type: application/json");
        return parent::sendHeaders();
    }


}