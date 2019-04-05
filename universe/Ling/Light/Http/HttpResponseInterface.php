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
}







