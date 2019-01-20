<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\CookieJar;

use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;
use BeeFramework\Notation\File\BabyYaml\Tool\BabyYamlTool;


/**
 * CookieJar
 * @author Lingtalfi
 * 2015-06-13
 *
 *
 * Internally, cookies are stored using babyYaml format:
 *
 * - (cookie)
 * ----- name: string
 * ----- value: string=''
 * ----- expire: int=0 (timestamp after which the cookie is not valid anymore, the timestamp depends from the local machine's time server)
 *                      If the value is 0, it means that the cookie is always fresh (as far as time is concerned)
 * ----- path:  string=false
 * ----- domain:  string=false
 * ----- secure:  bool=false
 * ----- httpOnly: bool=false
 *
 *
 *
 */
class CookieJar implements CookieJarInterface
{

    private $path;
    private $cookies;

    public function __construct()
    {
        $this->path = null;
        $this->cookies = [];
    }

    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS CookieJarInterface
    //------------------------------------------------------------------------------/
    /**
     * @return static
     */
    public function setCookie($name, $value = '', $maxAge = 0, $path = false, $domain = false, $secure = false, $httpOnly = false)
    {
        $this->check();
        $cookies = $this->retrieveCookies();
        $updated = false;
        if ('' === $value) { // remove cookie
            foreach ($cookies as $k => $info) {
                if (
                    $name === $info['name'] && // we don't care about the age
                    $path === $info['path'] &&
                    $domain === $info['domain'] &&
                    $secure === $info['secure'] &&
                    $httpOnly === $info['httpOnly']
                ) {
                    unset($cookies[$k]);
                    $updated = true;
                    break;
                }
            }
        }
        else { // add a cookie
            $expire = $maxAge;
            if ($expire < 0) { // allow -1 notation for session cookie
                $expire = 0;
            }
            if ($expire !== 0) {
                $expire += time();
            }

            $cookies[] = [
                'name' => $name,
                'value' => $value,
                'expire' => $expire,
                'path' => $path,
                'domain' => $domain,
                'secure' => $secure,
                'httpOnly' => $httpOnly,
            ];
            $updated = true;
        }

        if (true === $updated) {
            $this->storeCookies($cookies);
        }
        return $this;
    }

    public function getCookies(HttpRequestInterface $req)
    {
        $this->check();
        $cookiesPairs = [];
        $cookies = $this->retrieveCookies();
        $time = time();
        foreach ($cookies as $info) {
            if (0 === $info['expire'] || $info['expire'] > $time) {
                if (false === $info['path'] || (is_string($info['path']) && 0 === strpos($req->getRequestTarget(), $info['path']))) {


                    if (true === $info['secure'] && 'https' !== $req->getScheme()) {
                        continue;
                    }

                    // domain matching
                    $domainMatch = false;
                    if (false === $info['domain']) {
                        $domainMatch = true;
                    }
                    else {
                        if ($req->headers()->has('Host')) {
                            $domain = ltrim($info['domain'], '.');
                            if (0 === strpos(strrev($req->headers()->get('Host')), strrev($domain))) {
                                $domainMatch = true;
                            }
                        }
                    }
                    if (true === $domainMatch) {
                        $cookiesPairs[$info['name']] = $info['value'];
                    }
                }
            }
        }
        return $cookiesPairs;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setPath($path)
    {
        if (!is_string($path)) {
            $this->error(sprintf("path must be of type string, %s given", gettype($path)));
        }
        $this->path = $path;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function check()
    {
        if (null === $this->path) {
            $this->error("Please set the jar path first");
        }
    }

    private function error($m)
    {
        throw new HttpClientException($m);
    }

    private function storeCookies(array $cookies)
    {
        BabyYamlTool::export($cookies, $this->path);
    }

    private function retrieveCookies()
    {
        if (file_exists($this->path)) {
            return BabyYamlTool::parseFile($this->path);
        }
        return [];
    }

}
