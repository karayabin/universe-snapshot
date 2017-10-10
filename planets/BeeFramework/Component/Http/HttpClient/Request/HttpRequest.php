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
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Request\Body\HttpRequestBodyInterface;


/**
 * HttpRequest
 * @author Lingtalfi
 * 2015-06-16
 *
 * This request provides an intuitive uri property.
 * The uri in this case is quite flexible and accepts the following forms:
 *
 *      - <scheme> <://> <host> <uriPath> (<?> <urlEncodedQueryString>)? (<#> <fragment>)?
 *      - <host>? <uriPath> (<?> <urlEncodedQueryString>)? (<#> <fragment>)?
 *
 *      With:
 *          scheme: http|https
 *          host: the name of the server (www.example.com, or myApp:8080)
 *          uriPath: the uri path, starting with a slash
 *          urlEncodedQueryString: the encoded url parameters if any,
 *                                  but we recommend that you rather use the uriParams property,
 *                                  that handles the encoding for you.
 *                                  see more details below in the comments of the appropriate methods.
 *
 *
 *
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

    /**
     * @return static
     */
    public static function fromUri($uri, array $uriParams = [])
    {
        $o = self::create();
        $o->setUri($uri, $uriParams);
        return $o;
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
        $this->method = strtoupper($method);
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
     * This method allows you to specify the uri of the request, but also the scheme, the host and the port,
     * all in once (more concise than calling the setScheme, setHost and setPort separately).
     * It accepts the flexible notation described in the top comment of this class.
     *
     *
     * We can either pass the url params using the urlParams
     * parameter (recommended because url encoding is handled),
     * or use the query string notation of the uri (they have to be in their url encoded form).
     * Alternatively, it is also possible to mix both notations, in which case this method
     * will simply concatenate the generated urlParams to the queryString of the uri.
     *
     *
     *
     *
     * @return static
     */
    public function setUri($uri, array $urlParams = [])
    {
        $qString = '';

        // get rid of the fragment right away if any
        $uri = explode('#', $uri, 2)[0];
        $p = explode('?', $uri, 2);
        if (2 === count($p)) {
            $qString = $p[1];
        }
        $uri = $p[0];

        if ('/' === $uri[0]) {
            $uriPath = $uri;
        } else {
            $uriPath = '/';
            $auth = null;
            if (0 === strpos($uri, 'http://')) {
                $this->setScheme('http');
                $auth = substr($uri, 7);
            } elseif (0 === strpos($uri, 'https://')) {
                $this->setScheme('https');
                $auth = substr($uri, 8);
            } else {
                $this->error("Unknown uri format: $uri");
            }
            $p0 = explode('/', $auth, 2);
            if (2 === count($p0)) {
                $uriPath = '/' . $p0[1];
            }
            $auth = $p0[0];

            $p = explode(':', $auth, 2);
            if (2 === count($p)) {
                $this->setPort($p[1]);
            }
            $this->setHost($p[0]);
        }

        if ($urlParams) {
            if('' !== $qString){
                $qString .= '&';
            }
            $qString .= http_build_query($urlParams, '', '&', PHP_QUERY_RFC3986);
        }

        $requestTarget = implode('/', array_map(function ($v) {
            return rawurlencode($v);
        }, explode('/', $uriPath)));

        if ('' !== $qString) {
            $requestTarget .= '?' . $qString;

        }
        $this->requestTarget = $requestTarget;


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

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function error($m)
    {
        throw new HttpClientException($m);
    }
}
