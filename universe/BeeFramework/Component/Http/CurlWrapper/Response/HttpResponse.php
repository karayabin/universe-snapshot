<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\CurlWrapper\Response;

use BeeFramework\Component\Bag\ReadOnlyBagInterface;


/**
 * HttpResponse
 * @author Lingtalfi
 * 2015-06-10
 *
 */
class HttpResponse implements HttpResponseInterface
{

    private $body;
    private $headers;

    public function __construct()
    {
        $this->raw = '';
        $this->body = '';
        $this->headers = '';
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS HttpResponseInterface
    //------------------------------------------------------------------------------/
    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->headers . PHP_EOL . $this->body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setRaw($raw)
    {
        $p = preg_split('!^\s$!m', $raw);
        $this->headers = $p[0];
        $this->body = trim($p[1]);
        return $this;
    }


}
