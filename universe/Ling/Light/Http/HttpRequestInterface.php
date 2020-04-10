<?php


namespace Ling\Light\Http;


/**
 * The HttpRequestInterface interface.
 */
interface HttpRequestInterface
{


    /**
     * Returns the http method used for the request, in lower case.
     * Examples: post, get, ...
     *
     * @return string
     */
    public function getMethod(): string;


    /**
     * Returns the uri of the http request.
     * The uri being composed of the uriPath and the queryString if not empty (in which
     * case a question mark separates the uriPath from the queryString).
     *
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Returns the uriPath of the http request.
     * The uriPath is the uri without the queryString part (and without the question mark
     * separator).
     *
     * @return string
     */
    public function getUriPath(): string;

    /**
     * Returns the queryString of the http request.
     * @return string
     */
    public function getQueryString(): string;


    /**
     * Returns the array version of the query string of the http request.
     * @return array
     */
    public function getQueryArgs(): array;


    /**
     * The time when the http request was created.
     *
     * It is a decimal number representing the unix timestamp (number of seconds since 1970 january 1st),
     * with two extra digits after the comma (micro time), giving more precision.
     *
     * @return float
     */
    public function getTime(): float;


    /**
     * Returns the host of the http request.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Returns whether the request is a secure http request (using https).
     * @return bool
     */
    public function isHttpsRequest(): bool;

    /**
     * Returns the port number of the http request.
     * @return int
     */
    public function getPort(): int;

    /**
     * Returns the ip address of the user.
     * @return string
     */
    public function getIp(): string;


    /**
     * Returns the http referer of the http request when available, or null otherwise.
     *
     * @return string|null
     */
    public function getReferer();


    /**
     * Returns an array of the http headers attached to the http request.
     * Each header is a key/value pair, the key follows the following naming convention: all lowercase,
     * using dash instead of underscores.
     *
     * For instance:
     * - user-agent
     * - accept-encoding
     * - ...
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * Returns the value of a specific header.
     *
     * @param string $header
     * The name of the header.
     * @param null $default
     *
     * @return string|mixed
     */
    public function getHeader(string $header, $default = null);

    /**
     * Returns the original $_GET array attached with the http request.
     * @return array
     */
    public function getGet(): array;

    /**
     * Returns the value corresponding to the given key in the $_GET array attached with the request.
     * If such key was not found:
     *
     * - if throwEx is true, an exception is thrown
     * - if throwEx is false, null is returned
     *
     * @param string $key
     * @param bool $throwEx
     * @return mixed
     */
    public function getGetValue(string $key, bool $throwEx = true);

    /**
     * Returns the original $_POST array attached with the http request.
     * @return array
     */
    public function getPost(): array;


    /**
     * Returns the value corresponding to the given key in the $_POST array attached with the request.
     * If such key was not found:
     *
     * - if throwEx is true, an exception is thrown
     * - if throwEx is false, null is returned
     *
     * @param string $key
     * @param bool $throwEx
     * @return mixed
     */
    public function getPostValue(string $key, bool $throwEx = true);

    /**
     * Returns the  flattened version (with dots) of the $_FILES array (see
     * https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix for more info).
     *
     * @return array
     */
    public function getFiles(): array;


    /**
     * Returns the value corresponding to the given key in the $_FILES array attached with the request.
     * If such key was not found:
     *
     * - if throwEx is true, an exception is thrown
     * - if throwEx is false, null is returned
     *
     * @param string $key
     * @param bool $throwEx
     * @return mixed
     */
    public function getFilesValue(string $key, bool $throwEx = true);

    /**
     * Returns the original $_COOKIE array attached with the http request.
     * @return array
     */
    public function getCookie(): array;


    /**
     * Returns the value corresponding to the given key in the $_COOKIE array attached with the request.
     * If such key was not found:
     *
     * - if throwEx is true, an exception is thrown
     * - if throwEx is false, null is returned
     *
     * @param string $key
     * @param bool $throwEx
     * @return mixed
     */
    public function getCookieValue(string $key, bool $throwEx = true);
}







