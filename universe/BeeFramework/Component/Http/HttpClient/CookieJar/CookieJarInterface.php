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
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;


/**
 * CookieJarInterface
 * @author Lingtalfi
 * 2015-06-11
 *
 */
interface CookieJarInterface
{

    /**
     * One can use this method to actually set/unset a cookie.
     * Depending on the concrete implementation, one will have to pass the exact same parameters (except maxAge) to remove an existing cookie.
     * 
     * maxAge: the number of seconds the cookie is valid from now.
     *              If 0, it is always valid, as far as time is concerned.
     * 
     * 
     * @return static
     * 
     */
    public function setCookie($name, $value = '', $maxAge = 0, $path = false, $domain = false, $secure = false, $httpOnly = false);

    /**
     * Returns the array of cookies available for the given request.
     * In this case, not two cookies can have the same name, so the returned array is of form:
     *              cookieName => cookieValue
     */
    public function getCookies(HttpRequestInterface $req);
}
