<?php


namespace Ling\Light\Http;


use Ling\Light\Stream\LightStreamInterface;
use Ling\Light\Stream\LightStringStream;

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
     * The text message accompanying the status code.
     *
     * The null value means use the default text (see array above).
     *
     * @var string=null
     */
    protected $statusText;

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
     * @param string|LightStreamInterface $body
     * @param int $code
     */
    public function __construct($body = "", $code = 200)
    {

        if ($body instanceof LightStreamInterface) {
            $this->body = $body;
        } else {
            $this->body = new LightStringStream();
            $this->body->append($body);
        }


        $this->statusCode = $code;
        $this->statusText = null;
        $this->httpVersion = "1.1";
        $this->mimeType = null;
        $this->fileName = null;
        $this->headers = [];
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function send()
    {
        $this->sendHeaders();
        $this->displayBody();
    }


    /**
     * @implementation
     */
    public function getBody(): LightStreamInterface
    {
        return $this->body;
    }


    /**
     * @implementation
     */
    public function setHeader(string $name, $value): HttpResponseInterface
    {
        if (false === is_array($value)) {
            $value = [$value];
        }
        $this->headers[$this->getNormalizedKey($name)] = $value;
        return $this;
    }

    /**
     * @implementation
     */
    public function addHeader(string $name, string $value): HttpResponseInterface
    {
        $name = $this->getNormalizedKey($name);
        if (false === array_key_exists($name, $this->headers)) {
            $this->headers[$name] = [];
        }
        $this->headers[$name][] = $value;
        return $this;
    }

    /**
     * @implementation
     */
    public function getHeader(string $name): ?array
    {
        $ret = null;

        $name = $this->getNormalizedKey($name);
        if (array_key_exists($name, $this->headers)) {
            return $this->headers[$name];
        }
        return $ret;
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
    public function setStatusCode(int $code, string $text = null): HttpResponseInterface
    {
        $this->statusCode = $code;
        $this->statusText = $text;
        return $this;
    }

    /**
     * @implementation
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @implementation
     */
    public function getStatusText(): string
    {
        $statusText = $this->statusText;
        if (null === $statusText && array_key_exists($this->statusCode, self::$statusTexts)) {
            $statusText = self::$statusTexts[$this->statusCode];
        }
        return (string)$statusText;
    }

    /**
     * @implementation
     */
    public function setHttpVersion(string $httpVersion): HttpResponseInterface
    {
        $this->httpVersion = $httpVersion;
        return $this;
    }

    /**
     * @implementation
     */
    public function getHttpVersion(): string
    {
        return $this->httpVersion;
    }





    //--------------------------------------------
    //
    //--------------------------------------------


    /**
     * Shortcut to set the value of the Content-type header.
     *
     * @param string $mimeType
     */
    public function setContentType(string $mimeType)
    {
        $this->addHeader("Content-type", $mimeType);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the response as a string.
     *
     * @return string
     */
    public function __toString()
    {
        $eol = "\r\n";

        $output = sprintf(
            'HTTP/%s %s %s',
            $this->getHttpVersion(),
            $this->getStatusCode(),
            $this->getStatusText()
        );
        $output .= $eol;
        foreach ($this->headers as $name => $values) {
            // note: the comma might not suit every use case, we might set a custom separator in the future...
            $output .= sprintf('%s: %s', $name, implode(", ", $values)) . $eol;
        }
        $output .= $eol;
        $output .= (string)$this->body;
        return $output;
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

        foreach ($this->headers as $name => $values) {
            header($name . ": " . implode(', ', $values), false);
        }
        header(sprintf('HTTP/%s %s %s', $this->httpVersion, $this->statusCode, $this->getStatusText()), true, $this->statusCode);
    }


    /**
     * Displays the body of the http response.
     */
    protected function displayBody()
    {
        echo $this->body;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns a normalized name for the given header name.
     * We can do this because http header are case INSENSITIVE.
     *
     * https://stackoverflow.com/questions/5258977/are-http-headers-case-sensitive
     *
     * @param string $key
     * @return string
     */
    private function getNormalizedKey(string $key): string
    {
        return strtolower($key);
    }
}