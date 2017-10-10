<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpHeadersParser;

use BeeFramework\Component\Bag\CaseInsensitiveReadOnlyBag;
use BeeFramework\Component\Bag\CaseInsensitiveReadOnlyBagInterface;
use BeeFramework\Component\Http\HttpHeadersParser\Exception\HttpHeadersParserException;


/**
 * HttpHeadersParser
 * @author Lingtalfi
 * 2015-06-10
 *
 * In this implementation, headers all use the same formatting for the keys:
 *
 *          Camel-Case-Separated-With-Dash: value
 *
 */
class HttpHeadersParser implements HttpHeadersParserInterface
{
    private $rawHeaders;
    private $httpVersion;
    private $statusCode;
    private $reasonPhrase;
    private $headers;
    private $contentType;

    public function __construct()
    {

    }


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS HttpHeadersParserInterface
    //------------------------------------------------------------------------------/
    /**
     * This is the one method to call before any others.
     * @return HttpHeadersParserInterface
     */
    public function setRawHeaders($rawHeaders)
    {
        $this->rawHeaders = $rawHeaders;
        $lines = explode(PHP_EOL, $rawHeaders);
//        az($lines);
        $firstLine = array_shift($lines);
        $p = explode(' ', $firstLine, 3);
        if (3 === count($p)) {
            $this->httpVersion = $p[0];
            $this->statusCode = (int)$p[1];
            $this->reasonPhrase = $p[2];

            $headers = [];
            foreach ($lines as $line) {
                if ('' !== trim($line)) {
                    $p = explode(':', $line, 2);
                    if (2 === count($p)) {
                        $header = strtolower($p[0]);
                        if (array_key_exists($header, $headers)) {
                            if (!is_array($headers[$header])) {
                                $headers[$header] = [$headers[$header]];
                            }
                            $headers[$header][] = $p[1];
                        }
                        else {
                            $headers[$header] = $p[1];
                        }
                    }
                    else {
                        throw new HttpHeadersParserException("Invalid header: not compliant with rfc7230: " . $line);
                    }
                }
            }
            $this->headers = new CaseInsensitiveReadOnlyBag($headers);
        }
        else {
            throw new HttpHeadersParserException("Invalid headers: the first line is not compliant with rfc7230: " . $firstLine);
        }

        return $this;
    }

    //------------------------------------------------------------------------------/
    public function getHttpVersion()
    {
        $this->check();
        return $this->httpVersion;
    }

    public function getStatusCode()
    {
        $this->check();
        return $this->statusCode;
    }

    public function getReasonPhrase()
    {
        $this->check();
        return $this->reasonPhrase;
    }

    //------------------------------------------------------------------------------/
    /**
     * @return CaseInsensitiveReadOnlyBagInterface
     */
    public function headers()
    {
        $this->check();
        return $this->headers;
    }


    //------------------------------------------------------------------------------/
    public function getContentType()
    {
        $this->check();
        if (null === $this->contentType) {
            $ret = $this->headers()->get('Content-Type', 'text/html');
            $ret = trim(explode(';', $ret)[0]);
            $this->contentType = $ret;
        }
        return $this->contentType;
    }







    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function check()
    {
        if (null === $this->rawHeaders) {
            throw new HttpHeadersParserException("Please set the rawHeaders first");
        }
    }
}
