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

use BeeFramework\Component\Bag\BagInterface;
use BeeFramework\Component\Http\HttpClient\BodyEntity\BodyEntityInterface;


/**
 * HttpRequestInterface
 * @author Lingtalfi
 * 2015-06-11
 * 
 * 
 * We recommend that the following logic is used:
 *      
 *      - the port is based on the scheme (80 for http and 443 for https)
 *      - for non standard ports, use the setPort method,
 *                  and do not use the Host: www.example.com:54321 notation
 * 
 *      This might not be the most flexible solution, but a handy and simple one.
 * 
 *
 *
 */
interface HttpRequestInterface
{

    /**
     * @return BagInterface
     */
    public function headers();

    /**
     * @param $scheme , http|https
     * @return static
     */
    public function setScheme($scheme);

    public function getScheme();

    /**
     * @return static
     */
    public function setPort($port);

    /**
     * @return int
     */
    public function getPort();

    /**
     *
     * @param BodyEntityInterface|string $body
     *                  If string, the text/plain content type will be used.
     * @return static
     */
    public function setBody($body);

    /**
     * @return static
     */
    public function setHttpVersion($httpVersion);

    /**
     * Low level method, does not handle encoding.
     *
     * Alternatively, you can use setUri and setUrlParam methods
     * to have the encoding handled automatically.
     *
     * @return static
     */
    public function setRequestTarget($requestTarget);


    /**
     * @return static
     */
    public function setMethod($method);


    //------------------------------------------------------------------------------/
    // GETTERS
    //------------------------------------------------------------------------------/
    public function getMethod();

    public function getRequestTarget();

    public function getHttpVersion();

    /**
     * @return string
     */
    public function getBody();
}
