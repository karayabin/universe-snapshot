<?php


namespace Kamille\Architecture\Request\Web;


use Kamille\Architecture\Request\Request;

class HttpRequest extends Request implements HttpRequestInterface
{

    protected $server;
    private $uriNoQuery;

    public static function create()
    {

        $o = new static();
        $o->server = $_SERVER;
        return $o;
    }

    public function uri($withQueryString = true)
    {
        if (true === $withQueryString) {
            return $this->server['REQUEST_URI'];
        } else {
            if (null === $this->uriNoQuery) {
                $this->uriNoQuery = explode('?', $this->server["REQUEST_URI"], 2)[0];
            }
            return $this->uriNoQuery;
        }
    }


    public function queryString()
    {
        return $this->server['QUERY_STRING'];
    }

    public function isHttps()
    {
        return array_key_exists("HTTPS", $this->server);
    }

    public function method()
    {
        return strtolower($this->server['REQUEST_METHOD']);
    }

    public function host()
    {
        return $this->server['SERVER_NAME'];
    }

    public function port()
    {
        return (int)$this->server['SERVER_PORT'];
    }

    public function protocol()
    {
        return $this->server['SERVER_PROTOCOL'];
    }

    public function remoteAddress()
    {
        return $this->server['REMOTE_ADDR'];
    }

    public function remotePort()
    {
        return $this->server['REMOTE_PORT'];
    }

    public function header($headerName)
    {
        $headerName = "HTTP_" . strtoupper(str_replace("-", "_", $headerName));
        if (array_key_exists($headerName, $this->server)) {
            return $this->server[$headerName];
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public function hack(array $server)
    {
        $this->uriNoQuery = null;
        $this->server = array_replace($this->server, $server);
    }
}