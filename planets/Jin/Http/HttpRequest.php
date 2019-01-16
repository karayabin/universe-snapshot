<?php


namespace Jin\Http;

/**
 *
 * @info The HttpRequest class represents the http request.
 *
 * Various info can be accessed (and/or stored), including:
 * uri, http method, query string, request time, host, isHttps, the port number, the ip,
 * the http headers...
 *
 */
class HttpRequest
{

    /**
     * @info This property holds the http method used for the request.
     * It is one of: GET, POST, ...
     */
    public $method;

    /**
     * @info This property holds the uri of the http request. The uri
     * being composed of the uriPath and the queryString if not empty (in which case
     * a question mark separates the uriPath from the queryString.
     */
    public $uri;

    /**
     * @info This property holds the uriPath of the http request.
     * The uriPath is the uri without the queryString part (and without the question mark
     * separator).
     */
    public $uriPath; // the uri without the query string part

    /**
     * @info This property holds the queryString of the http request.
     * The queryString contains parameters for the application.
     */
    public $queryString;

    /**
     * @info This property holds the time when the http request was created.
     * It is a decimal number representing the unix timestamp (number of seconds since 1970 january 1st),
     * but with two extra digits after the comma (micro time), giving more precision.
     * @type float
     */
    public $time; // REQUEST_TIME_FLOAT

    /**
     * @info This property holds the host of the http request.
     */
    public $host;

    /**
     * @info This property holds whether or not the request is a secure http request (using https).
     * @type bool
     */
    public $isHttps;

    /**
     * @info This property holds the port number of the http request.
     */
    public $port;

    /**
     * @info This property holds the ip address of the user.
     */
    public $ip;

    /**
     * @info This property holds the http referer of the http request when available, or null otherwise.
     * @type string|null
     */
    public $referer; // null if none

    /**
     * @info This property holds an array of the http headers attached to the http request.
     * Each header is a key/value pair, the key follows the following naming convention: all lowercase,
     * using dash instead of underscores.
     *
     * For instance:
     * - user-agent
     * - accept-encoding
     * - ...
     *
     */
    public $headers;


    /**
     * @info Returns an array containing the query arguments of the http request (queryString converted to an array).
     * @return array
     */
    public function getQueryArgs()
    {
        // nocache, because queryString could be set on the fly
        $arr = [];
        if ($this->queryString) {
            parse_str($this->queryString, $arr);
        }
        return $arr;
    }

    /**
     *
     * @info Returns a specific header, or the provided default value if the header was not found.
     *
     * $headerName (use dashes, not underscores, and all lowercase):
     *
     *      - user-agent
     *      - accept
     *      - accept-language
     *      - ...
     * @return string|mixed
     *
     */
    public function header($headerName, $default = null)
    {
        return $this->headers[$headerName] ?? $default;
    }


    /**
     * @info Returns the http request using the info provided by the webserver ($_SERVER environment variables).
     * @return HttpRequest
     */
    public static function createFromEnv()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uriPath = explode('?', $_SERVER["REQUEST_URI"])[0];
        $qString = $_SERVER['QUERY_STRING'];
        $uri = $uriPath;
        if ($qString) {
            $uri .= "?" . $qString;
        }
        $time = $_SERVER["REQUEST_TIME_FLOAT"];
        $host = $_SERVER["HTTP_HOST"];
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
        $port = $_SERVER['SERVER_PORT'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $referer = null;
        if (array_key_exists("HTTP_REFERER", $_SERVER)) {
            $referer = $_SERVER["HTTP_REFERER"];
        }
        $headers = [];
        foreach ($_SERVER as $k => $v) {
            if (0 === strpos($k, "HTTP_")) {
                $key = str_replace('_', '-', strtolower(substr($k, 5)));
                if ('host' !== $key) {
                    $headers[$key] = $v;
                }
            }
        }


        //--------------------------------------------
        //
        //--------------------------------------------
        $o = new self();
        $o->method = $method;
        $o->uri = $uri;
        $o->uriPath = $uriPath;
        $o->queryString = $qString;
        $o->time = $time;
        $o->host = $host;
        $o->isHttps = $isHttps;
        $o->port = $port;
        $o->ip = $ip;
        $o->referer = $referer;
        $o->headers = $headers;
        return $o;
    }

}