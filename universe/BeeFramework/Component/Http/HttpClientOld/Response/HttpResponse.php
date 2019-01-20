<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Response;

use BeeFramework\Component\Bag\CaseInsensitiveReadOnlyBagInterface;
use BeeFramework\Component\Bag\ReadOnlyBag;
use BeeFramework\Component\Bag\ReadOnlyBagInterface;
use BeeFramework\Component\Http\HttpClient\Exception\HttpClientException;
use BeeFramework\Component\Http\HttpHeadersParser\HttpHeadersParser;
use BeeFramework\Component\Http\HttpHeadersParser\HttpHeadersParserInterface;


/**
 * HttpResponse
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class HttpResponse implements HttpResponseInterface
{
    /**
     * @var HttpHeadersParserInterface
     */
    private $headersParser;


    /**
     * @var ReadOnlyBagInterface
     */
    private $cookies;
    private $body;


    public function __construct()
    {
        $this->body = '';
    }


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS HttpResponseInterface
    //------------------------------------------------------------------------------/
    public function getHttpVersion()
    {
        $this->check();
        return $this->headersParser->getHttpVersion();
    }

    public function getStatusCode()
    {
        $this->check();
        return $this->headersParser->getStatusCode();
    }

    public function getReasonPhrase()
    {
        $this->check();
        return $this->headersParser->getReasonPhrase();
    }

    /**
     * @return CaseInsensitiveReadOnlyBagInterface
     */
    public function headers()
    {
        $this->check();
        return $this->headersParser->headers();
    }

    /**
     * @return ReadOnlyBagInterface
     */
    public function cookies()
    {
        $this->check();
        return $this->cookies;
    }

    public function getContentType()
    {
        $this->check();
        return $this->headersParser->getContentType();
    }

    public function getBody()
    {
        $this->check();
        return $this->body;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function prepareFromRawRequest($raw)
    {

        $p = preg_split('!^\s$!m', $raw, 2);
        if (2 === count($p)) {
            $this->headersParser = HttpHeadersParser::create()->setRawHeaders($p[0]);
            $cookies = $this->headersParser->headers()->get('Set-Cookie', []);
            if (!is_array($cookies)) {
                $cookies = [$cookies];
            }
            $this->cookies = new ReadOnlyBag($cookies);
            $this->body = ltrim($p[1]);
        }
        else {
            $this->error("Invalid response, blank line not found");
        }
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function check()
    {
        if (null === $this->headersParser) {
            $this->error("Please prepare the response first");
        }
    }

    private function error($m)
    {
        throw new HttpClientException($m);
    }


}
