<?php


namespace Ling\Light\Http;

use Ling\PhpUploadFileFix\PhpUploadFileFixTool;

/**
 *
 * The HttpRequest class represents the http request.
 *
 * Various readonly info can be accessed, including:
 * uri, http method, query string, request time, host, isHttps, the port number, the ip,
 * the http headers...
 *
 * Also, the http request contain a copy of the original $_GET, $_POST, $_FILES and $_COOKIE arrays.
 *
 *
 */
class HttpRequest implements HttpRequestInterface
{

    /**
     * This property holds the http method sed for the request in lowercase.
     * It is one of: get, post, ...
     * @var string
     */
    protected $method;

    /**
     * This property holds the uri of the http request. The uri
     * being composed of the uriPath and the queryString if not empty (in which case
     * a question mark separates the uriPath from the queryString.
     * @var string
     */
    protected $uri;

    /**
     * This property holds the uriPath of the http request.
     * The uriPath is the uri without the queryString part (and without the question mark
     * separator).
     *
     * @var string
     */
    protected $uriPath; // the uri without the query string part

    /**
     * This property holds the queryString of the http request.
     * The queryString contains parameters for the application.
     *
     * @var string
     */
    protected $queryString;

    /**
     * This property holds the time when the http request was created.
     * It is a decimal number representing the unix timestamp (number of seconds since 1970 january 1st),
     * but with two extra digits after the comma (micro time), giving more precision.
     *
     * @var float
     */
    protected $time; // REQUEST_TIME_FLOAT

    /**
     * This property holds the host of the http request.
     *
     * @var string
     */
    protected $host;

    /**
     * This property holds whether or not the request is a secure http request (using https).
     * @var bool
     */
    protected $isHttps;

    /**
     * This property holds the port number of the http request.
     * @var int
     */
    protected $port;

    /**
     * This property holds the ip address of the user.
     * @var string
     */
    protected $ip;

    /**
     * This property holds the http referer of the http request when available, or null otherwise.
     * @var string|null
     */
    protected $referer; // null if none


    /**
     * This property holds an array of the http headers attached to the http request.
     * Each header is a key/value pair, the key follows the following naming convention: all lowercase,
     * using dash instead of underscores.
     *
     * For instance:
     * - user-agent
     * - accept-encoding
     * - ...
     *
     * @var array
     */
    protected $headers;

    /**
     * This property holds the initial $_GET array. It should be read only.
     * @var array
     */
    protected $get;

    /**
     * This property holds the initial $_POST array. It should be read only.
     * @var array
     */
    protected $post;

    /**
     * This property holds the initial flattened version with dots of the $_FILES array (see
     * https://github.com/karayabin/universe-snapshot/tree/master/planets/PhpUploadFileFix or the createFromEnv
     * method for more info).
     * It should be read only.
     * @var array
     */
    protected $files;

    /**
     * This property holds the initial $_COOKIE array. It should be read only.
     * @var array
     */
    protected $cookie;


    /**
     * Builds the HttpRequest instance.
     */
    protected function __construct()
    {

    }

    /**
     * Returns the http request using the info provided by the webserver ($_SERVER environment variables).
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
        $o->method = strtolower($method);
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
        $o->get = $_GET;
        $o->post = $_POST;
        $o->files = PhpUploadFileFixTool::fixPhpFiles($_FILES, true);
        $o->cookie = $_COOKIE;
        return $o;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @implementation
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @implementation
     */
    public function getUriPath(): string
    {
        return $this->uriPath;
    }

    /**
     * @implementation
     */
    public function getQueryString(): string
    {
        return $this->queryString;
    }

    /**
     * @implementation
     */
    public function getQueryArgs(): array
    {
        // nocache, because queryString could be set on the fly
        $arr = [];
        if ($this->queryString) {
            parse_str($this->queryString, $arr);
        }
        return $arr;
    }

    /**
     * @implementation
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @implementation
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @implementation
     */
    public function isHttpsRequest(): bool
    {
        return $this->isHttps;
    }

    /**
     * @implementation
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @implementation
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @implementation
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * @implementation
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @implementation
     */
    public function getHeader(string $header, $default = null)
    {
        return $this->headers[$header] ?? $default;
    }

    /**
     * @implementation
     */
    public function getGet(): array
    {
        return $this->get;
    }

    /**
     * @implementation
     */
    public function getPost(): array
    {
        return $this->post;
    }

    /**
     * @implementation
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @implementation
     */
    public function getCookie(): array
    {
        return $this->cookie;
    }


}