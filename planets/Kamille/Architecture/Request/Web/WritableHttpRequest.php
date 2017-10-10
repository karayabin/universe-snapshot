<?php


namespace Kamille\Architecture\Request\Web;


use Kamille\Architecture\Request\Request;

class WritableHttpRequest extends Request implements HttpRequestInterface
{
    private $_uri;
    private $_queryString;
    private $_isHttps;
    private $_method;
    private $_host;
    private $_port;
    private $_protocol;
    private $_remoteAddress;
    private $_remotePort;
    private $_headers;


    public function __construct()
    {
        parent::__construct();
        $this->_headers = [];
    }

    public static function create()
    {
        return new static();
    }


    public function uri($withQueryString = true)
    {
        $ret = $this->_uri;
        if (true === $withQueryString) {
            if (!empty($this->_queryString)) {
                $ret .= "?" . $this->_queryString;
            }
        }
        return $ret;
    }

    public function queryString()
    {
        return $this->_queryString;
    }

    public function isHttps()
    {
        return $this->_isHttps;
    }

    public function method()
    {
        $this->_method;
    }

    public function host()
    {
        $this->_host;
    }

    public function port()
    {
        $this->_port;
    }

    public function protocol()
    {
        $this->_protocol;
    }

    public function remoteAddress()
    {
        $this->_remoteAddress;
    }

    public function remotePort()
    {
        $this->_remotePort;
    }

    public function header($headerName)
    {
        if (array_key_exists($headerName, $this->_headers)) {
            return $this->_headers[$headerName];
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setUri($uri)
    {
        $this->_uri = $uri;
        return $this;
    }

    public function setQueryString($queryString)
    {
        $this->_queryString = $queryString;
        return $this;
    }

    public function setIsHttps($isHttps)
    {
        $this->_isHttps = $isHttps;
        return $this;
    }

    public function setMethod($method)
    {
        $this->_method = $method;
        return $this;
    }

    public function setHost($host)
    {
        $this->_host = $host;
        return $this;
    }

    public function setPort($port)
    {
        $this->_port = $port;
        return $this;
    }

    public function setProtocol($protocol)
    {
        $this->_protocol = $protocol;
        return $this;
    }

    public function setRemoteAddress($remoteAddress)
    {
        $this->_remoteAddress = $remoteAddress;
        return $this;
    }

    public function setRemotePort($remotePort)
    {
        $this->_remotePort = $remotePort;
        return $this;
    }

    public function setHeader($key, $value)
    {
        $this->_headers[$key] = $value;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->_headers = $headers;
        return $this;
    }


}
