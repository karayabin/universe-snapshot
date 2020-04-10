<?php


namespace Ling\Light\Http;


/**
 * The HttpResponse class.
 */
class HttpResponse implements HttpResponseInterface
{
    /**
     * This property holds a map of http status code => description.
     * The list below has last been checked on 2019-01-18.
     *
     * @link http://www.iana.org/assignments/http-status-codes/
     * @var array
     *
     *
     */
    private static $statusTexts = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        103 => 'Early Hints',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Too Early',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    );

    /**
     * This property holds the body of the http response.
     * @var string
     */
    protected $body;

    /**
     * This property holds the status code of the http response.
     * @var int
     */
    protected $statusCode;

    /**
     * This property holds the http version of the http response.
     * @var int
     */
    protected $httpVersion;


    /**
     * This property holds the mimeType for this instance.
     * If set, the Content-type header will be sent, otherwise it won't.
     *
     * @var string|null
     */
    protected $mimeType;

    /**
     * This property holds the fileName for this instance.
     *
     * You generally want to use this when your body is a file content
     * that you intend to serve to the user, and you want to override the default fileName provided by the browser.
     *
     * If null, the browser fileName will not be overridden.
     *
     *
     * @var string|null
     */
    protected $fileName;

    /**
     * This property holds the headers for this instance.
     * @var array
     */
    protected $headers;


    /**
     * Builds the HttpResponse instance.
     *
     * @param string $body
     * @param int $code
     */
    public function __construct($body = "", $code = 200)
    {
        $this->body = $body;
        $this->statusCode = $code;
        $this->httpVersion = "1.1";
        $this->mimeType = null;
        $this->fileName = null;
        $this->headers = [];
    }

    /**
     * Sets the http version of this http response.
     * @param string $version
     */
    public function setHttpVersion(string $version)
    {
        $this->httpVersion = $version;
    }

    /**
     * Sets the mimeType.
     *
     * @param string|null $mimeType
     */
    public function setMimeType(?string $mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @implementation
     */
    public function setHeader(string $name, string $value, bool $replace = true)
    {
        $this->headers[] = [$name, $value, $replace];
    }

    /**
     * Sets the fileName.
     *
     * @param string|null $fileName
     */
    public function setFileName(?string $fileName)
    {
        $this->fileName = $fileName;
    }


    /**
     * @implementation
     */
    public function send()
    {
        $this->sendHeaders();
        $this->displayBody();
    }
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sends the http headers of the http response.
     */
    protected function sendHeaders()
    {
        if (headers_sent()) {
            return;
        }

        foreach ($this->headers as $header) {
            list($name, $value, $replace) = $header;
            header($name . ": " . $value, $replace);
        }


        $statusText = "";
        if (array_key_exists($this->statusCode, self::$statusTexts)) {
            $statusText = self::$statusTexts[$this->statusCode];
        }
        header(sprintf('HTTP/%s %s %s', $this->httpVersion, $this->statusCode, $statusText), true, $this->statusCode);

        if (null !== $this->fileName) {
            $fileName = str_replace('"', '\"', $this->fileName);
            header("Content-Disposition: inline; filename=\"$fileName\"");
        }

        if (null !== $this->mimeType) {
            header("Content-type: " . $this->mimeType);
        }


    }


    /**
     * Displays the body of the http response.
     */
    protected function displayBody()
    {
        echo $this->body;
    }

}