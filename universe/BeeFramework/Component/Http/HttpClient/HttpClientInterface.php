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
use BeeFramework\Component\Http\HttpClient\Response\HttpResponseInterface;


/**
 * HttpClientInterface
 * @author Lingtalfi
 * 2015-06-11
 *
 */
interface HttpClientInterface
{

    /**
     * The host of the request must be set, or an exception will be thrown.
     *
     * If a cookieJar is set,
     *      all cookies that come from a httpResponse are put in that jar
     *      and reuse in subsequent requests.
     *
     *
     * @param HttpRequestInterface $req
     * @return HttpResponseInterface
     * @throws HttpClientException
     */
    public function send(HttpRequestInterface $req);

    /**
     * @return static
     */
    public function setCookieJar(CookieJarInterface $j);


}
