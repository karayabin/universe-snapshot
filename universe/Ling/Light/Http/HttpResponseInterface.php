<?php


namespace Ling\Light\Http;


/**
 * The HttpResponseInterface interface.
 */
interface HttpResponseInterface
{

    /**
     * Sends the headers and prints the response body to the output.
     *
     * @return void
     */
    public function send();


    /**
     * Adds a header to this instance.
     * In case the header already exists:
     *      - if the replace flag is set to true (by default), it will replace the existing header
     *      - if the replace flag is set to false, it will add another header with the same name
     *
     * @param string $name
     * @param string $value
     * @param bool $replace = true
     */
    public function setHeader(string $name, string $value, bool $replace = true);
}







