<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Response\Cookie;

use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;


/**
 * HttpResponseCookie
 * @author Lingtalfi
 * 2015-06-13
 *
 * In this implementation, we only use Max-Age parameter for determining the expire value;
 * because we don't know if the server's expire is sync with our machine's internal clock.
 * If the Max-Age parameter is not found, the default expire value is set to 0, which creates a session cookie.
 *
 *
 */
class HttpResponseCookie
{

    private $name;
    private $value; // string|<emptyString>
    private $expire; // timestamp|0
    private $path; // false|string
    private $domain; // false|string
    private $secure; // bool
    private $httpOnly; // bool

    public function __construct()
    {
        $this->value = '';
        $this->expire = 0;
        $this->path = false;
        $this->domain = false;
        $this->secure = false;
        $this->httpOnly = false;
    }

    /**
     * @return static
     */
    public static function create($rawValue)
    {
        $o = new static();
        $p = explode(';', $rawValue);
        if (null !== $firstComp = array_shift($p)) {
            $parts = explode('=', $firstComp, 2);
            $name = $parts[0];
            $value = $parts[1];
            $expire = 0;
            $path = false;
            $domain = false;
            $secure = false;
            $httpOnly = false;
            foreach ($p as $comp) {
                $n = explode('=', $comp, 2);
                if (2 === count($n)) {
                    $cName = trim($n[0]);
                    $cVal = $n[1];
                    if ('Max-Age' === $cName) {
                        $expire = $cVal;
                    }
                    elseif ('path' === $cName) {
                        $path = $cVal;
                    }
                    elseif ('domain' === $cName) {
                        $domain = $cVal;
                    }
                }
                else {
                    $cName = trim($n[0]);
                    if ('secure' === $cName) {
                        $secure = true;
                    }
                    elseif ('httponly' === $cName) {
                        $httpOnly = true;
                    }
                }
            }
            $o->name = $name;
            $o->value = $value;
            $o->expire = $expire;
            $o->path = $path;
            $o->domain = $domain;
            $o->secure = $secure;
            $o->httpOnly = $httpOnly;
        }
        else {
            throw new HttpClientException("Invalid cookie: the name was not set");
        }
        return $o;
    }





    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function getDomain()
    {
        return $this->domain;
    }

    public function getExpire()
    {
        return $this->expire;
    }

    public function getHttpOnly()
    {
        return $this->httpOnly;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getSecure()
    {
        return $this->secure;
    }

    public function getValue()
    {
        return $this->value;
    }


}
