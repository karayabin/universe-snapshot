<?php


namespace Ling\Light\Http;


use Ling\Light\Stream\LightStreamInterface;

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
     * Returns the body as a stream.
     *
     * @return LightStreamInterface
     */
    public function getBody(): LightStreamInterface;


    /**
     * Sets a header to this instance.
     * This will replace any header with the same name.
     *
     * The value must be a string or an array of strings (not recursive).
     *
     *
     * @param string $name
     * @param string|array $value
     * @return HttpResponseInterface
     */
    public function setHeader(string $name, $value): HttpResponseInterface;


    /**
     * Adds an header to the response, with the given name and value.
     * This will not replace any header with the same name, but rather append a new value to it.
     *
     * @param string $name
     * @param string $value
     * @return HttpResponseInterface
     */
    public function addHeader(string $name, string $value): HttpResponseInterface;


    /**
     * Returns the array of headers with the given name.
     *
     * @param string $name
     * @return array|null
     */
    public function getHeader(string $name): ?array;


    /**
     * Returns an array of headerName => headerValues.
     *
     * headerValues is an array of the (string) values stacked for this header.
     *
     * Note: headerName might be normalized, since http headers are case insensitive.
     *
     * @return array
     */
    public function getHeaders(): array;


    /**
     * Set the status code for this response.
     *
     * Optionally, the status text can be provided (otherwise it will be guessed by default from the given status code).
     *
     *
     * @param int $code
     * @param string|null $text
     * @return HttpResponseInterface
     */
    public function setStatusCode(int $code, string $text = null): HttpResponseInterface;

    /**
     * Returns the status code attached to this response
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Returns the status text attached to this response.
     * @return string
     */
    public function getStatusText(): string;

    /**
     * Sets the http version for the response.
     *
     * By default it's "1.1".
     *
     * @param string $httpVersion
     * @return HttpResponseInterface
     */
    public function setHttpVersion(string $httpVersion): HttpResponseInterface;


    /**
     * Returns the http version used by this response.
     * @return string
     */
    public function getHttpVersion(): string;
}







