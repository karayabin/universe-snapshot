<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient;

use BeeFramework\Component\Http\HttpClient\Connexion\ConnexionInterface;
use BeeFramework\Component\Http\HttpClient\Connexion\StreamConnexion;
use BeeFramework\Component\Http\HttpClient\CookieJar\CookieJarInterface;
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;
use BeeFramework\Component\Http\HttpClient\Response\Cookie\HttpResponseCookie;
use BeeFramework\Component\Http\HttpClient\Response\HttpResponse;
use BeeFramework\Component\Http\HttpClient\Response\HttpResponseInterface;
use BeeFramework\Component\Http\HttpClient\Tool\RequestTool;


/**
 * HttpClient
 * @author Lingtalfi
 * 2015-06-17
 *
 * In this implementation, the requestInfo is an array with following info:
 *      0: first line (http request's status line)
 *      1: rawHeaders, a string containing the CRLF separated headers
 *      2: body, a string containing the body of the request (if any, or empty string otherwise)
 *
 */
class HttpClient implements HttpClientInterface
{

    /**
     * @var CookieJarInterface
     */
    private $cookieJar;
    private $onRawResponseReady;
    private $onRawRequestReady;

    /**
     * @var ConnexionInterface $connexion
     */
    private $connexion;

    public function __construct()
    {
        $this->cookieJar = null;
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS HttpClientInterface
    //------------------------------------------------------------------------------/
    public function send(HttpRequestInterface $req)
    {

        $this->prepareHeaders($req);


        if (is_callable($this->onRawRequestReady)) {
            $info = RequestTool::getRequestInfo($req, $this->cookieJar);
            $r = RequestTool::getRawRequestByRequestInfo($info);
            call_user_func($this->onRawRequestReady, $r);
        }

        $rawResponse = $this->_getConnexion()->send($req);


        if (is_callable($this->onRawResponseReady)) {
            call_user_func($this->onRawResponseReady, $rawResponse);
        }
        $response = HttpResponse::create()->prepareFromRawResponse($rawResponse);
        $this->updateCookieJar($response);
        return $response;
    }

    /**
     * @return static
     */
    public function setCookieJar(CookieJarInterface $j)
    {
        $this->cookieJar = $j;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setOnRawRequestReady(callable $onRawRequestReady)
    {
        $this->onRawRequestReady = $onRawRequestReady;
        return $this;
    }

    public function setOnRawResponseReady(callable $onRawResponseReady)
    {
        $this->onRawResponseReady = $onRawResponseReady;
        return $this;
    }


    public function setConnexion(ConnexionInterface $connexion)
    {
        $this->connexion = $connexion;
        return $this;
    }

    /**
     * @return ConnexionInterface
     */
    public function getConnexion()
    {
        return $this->connexion;
    }
    
    




    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function prepareHeaders(HttpRequestInterface $req)
    {
        if (false === $req->headers()->has('Connection')) {
            $req->headers()->set('Connection', 'Close');
        }
    }




    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/

    private function error($m)
    {
        throw new HttpClientException($m);
    }


    private function updateCookieJar(HttpResponseInterface $response)
    {
        if (null !== $this->cookieJar) {
            foreach ($response->cookies()->all() as $name => $value) {
                $c = HttpResponseCookie::create(trim($value));
                $this->cookieJar->setCookie(
                    $c->getName(),
                    $c->getValue(),
                    $c->getExpire(),
                    $c->getPath(),
                    $c->getDomain(),
                    $c->getSecure(),
                    $c->getHttpOnly()
                );
            }
        }
    }

    /**
     * The code works for non ssl connection, but fails when one tries to connect to ssl.
     */
//    private function getRequestStream(HttpRequestInterface $req)
//    {
//        $host = $req->headers()->get('Host');
//        if (null === $host) {
//            $this->error("Please define the httpRequest host");
//        }
//        $this->prepareHeaders($req);
//
//        $port = $req->getPort();
//        if ('https' === $req->getScheme()) {
//            $host = 'ssl://' . $host;
//        }
//        $timeOut = 30; // this is the socket connexion timeout only
//        if (false === $fp = fsockopen($host, $port, $errNo, $errMsg, $timeOut)) {
//            $this->error("$errMsg ($errNo)");
//        }
//        return $fp;
//    }


    /**
     * @return ConnexionInterface
     */
    private function _getConnexion()
    {
        if (null === $this->connexion) {
            $this->connexion = new StreamConnexion();
        }
        return $this->connexion;
    }
}
