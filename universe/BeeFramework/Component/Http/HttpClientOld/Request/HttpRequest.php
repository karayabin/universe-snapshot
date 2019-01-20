<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Request;

use BeeFramework\Component\Bag\Bag;
use BeeFramework\Component\Bag\BagInterface;
use BeeFramework\Component\Http\HttpClient\BodyEntity\BodyEntityInterface;
use BeeFramework\Component\Http\HttpClient\Request\Body\HttpRequestBodyInterface;


/**
 * HttpRequest
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class HttpRequest implements HttpRequestInterface
{

    private $body;
    private $headers;
    private $httpVersion;
    private $requestTarget;
    private $method;
    private $scheme;
    private $port;

    public function __construct()
    {
        $this->body = '';
        $this->headers = new Bag();
        $this->httpVersion = 'HTTP/1.1';
        $this->requestTarget = '/';
        $this->method = 'GET';
        $this->scheme = 'http';
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS HttpRequestInterface
    //------------------------------------------------------------------------------/
    /**
     * @return BagInterface
     */
    public function headers()
    {
        return $this->headers;
    }

    /**
     * @return static
     */
    public function setBody($body)
    {
        $type = 'text/plain';
        if ($body instanceof BodyEntityInterface) {
            $type = $body->getContentType();
            $body = $body->getContent();
        }

        $this->body = $body;
        if (null !== $type) {
            $this->headers->set('Content-Type', $type);
        }
        $this->headers->set('Content-Length', strlen($body));
        return $this;
    }

    /**
     * @return static
     */
    public function setHttpVersion($httpVersion)
    {
        $this->httpVersion = $httpVersion;
        return $this;
    }

    /**
     * @return static
     */
    public function setRequestTarget($requestTarget)
    {
        $this->requestTarget = $requestTarget;
        return $this;
    }


    /**
     * @return static
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getRequestTarget()
    {
        return $this->requestTarget;
    }

    public function getHttpVersion()
    {
        return $this->httpVersion;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param $scheme , http|https
     * @return static
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @return static
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    public function getPort()
    {
        if (null !== $this->port) {
            return (int)$this->port;
        }
        if ('https' === $this->scheme) {
            return 443;
        }
        return 80;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/

    /**
     * Note: if you use this method, the urlParams will be lost, i.e. you have to call
     * setUrlParams AFTER the call to setUri.
     * @return static
     */
    public function setUri($uri)
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $this->requestTarget = implode('/', array_map(function ($v) {
            return rawurlencode($v);
        }, explode('/', $uri)));
        return $this;
    }

    /**
     * @return static
     */
    public function setUrlParams(array $urlParams)
    {
        if (false !== $pos = strpos($this->requestTarget, '?')) {
            $this->requestTarget = substr($this->requestTarget, 0, $pos);
        }
        if ($urlParams) {
            $this->requestTarget .= '?' . http_build_query($urlParams, '', '&', PHP_QUERY_RFC3986);
        }
        return $this;
    }


    /**
     * @return static
     */
    public function setHost($host)
    {
        $this->headers()->set('Host', $host);
        return $this;
    }

}
