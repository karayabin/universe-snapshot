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

use BeeFramework\Component\Http\HttpClient\CookieJar\CookieJarInterface;
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;
use BeeFramework\Component\Http\HttpClient\Response\Cookie\HttpResponseCookie;
use BeeFramework\Component\Http\HttpClient\Response\HttpResponse;
use BeeFramework\Component\Http\HttpClient\Response\HttpResponseInterface;


/**
 * HttpClient
 * @author Lingtalfi
 * 2015-06-11
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
        $host = $req->headers()->get('Host');
        if (null === $host) {
            $this->error("Please define the httpRequest host");
        }
        $this->prepareHeaders($req);

        $port = $req->getPort();
        if ('https' === $req->getScheme()) {
            $host = 'ssl://' . $host;
        }
        $timeOut = 30; // this is the socket connexion timeout only
        if (false === $fp = fsockopen($host, $port, $errNo, $errMsg, $timeOut)) {
            $this->error("$errMsg ($errNo)");
        }

        fclose($fp);
        az("jo");
        
        
        // convert the httpRequest object to actual http headers (and body)?
        $eol = "\r\n";
        $firstLine =
            $req->getMethod() .
            ' ' .
            $req->getRequestTarget() .
            ' ' .
            $req->getHttpVersion() .
            $eol;

        $out = $firstLine;
        foreach ($req->headers()->all() as $name => $value) {
            if (is_array($value)) {
                // http://stackoverflow.com/questions/3096888/standard-for-adding-multiple-values-of-a-single-http-header-to-a-request-or-resp
                // http://stackoverflow.com/questions/4843556/in-http-specification-what-is-the-string-that-separates-cookies
                // comma might be accepted, although semi-colon seems to be more adequate for cookies
                $out .= "$name: " . implode(',', $value) . $eol;
            }
            else {
                $out .= "$name: $value" . $eol;
            }
        }
        $this->addCookiesFromJar($out, $eol, $req);


        $out .= $eol;
        $out .= $req->getBody();
        $out .= $eol;
        if (is_callable($this->onRawRequestReady)) {
            call_user_func($this->onRawRequestReady, $out);
        }
        fwrite($fp, $out);

        $s = '';
        while (!feof($fp)) {
            $s .= fgets($fp);
        }
        if (is_callable($this->onRawResponseReady)) {
            call_user_func($this->onRawResponseReady, $s);
        }
        $response = HttpResponse::create()->prepareFromRawRequest($s);
        $this->updateCookieJar($response);


        fclose($fp);
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

    private function addCookiesFromJar(&$out, $eol, HttpRequestInterface $req)
    {
        if (null !== $this->cookieJar) {
            $cookies = $this->cookieJar->getCookies($req);
            if ($cookies) {

                $els = [];
                foreach ($cookies as $k => $v) {
                    $els[] = "$k=$v";
                }
                $sCook = implode('; ', $els);
                $out .= 'Cookie: ' . $sCook . $eol;
            }
        }
    }
}
