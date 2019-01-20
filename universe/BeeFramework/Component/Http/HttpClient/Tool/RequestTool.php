<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Http\HttpClient\Tool;

use BeeFramework\Component\Http\HttpClient\CookieJar\CookieJarInterface;
use BeeFramework\Component\Http\HttpClient\Request\HttpRequestInterface;


/**
 * RequestTool
 * @author Lingtalfi
 * 2015-06-17
 *
 */
class RequestTool
{
    public static function getRawRequestByRequestInfo(array $info)
    {
        // raw request
        $eol = "\r\n";
        $r = $info[0];
        $r .= $info[1];
        $r .= $eol;
        if ('' !== $info[2]) {
            $r .= $info[2];
            $r .= $eol;
        }
        return $r;
    }


    public static function getRequestInfo(HttpRequestInterface $req, CookieJarInterface $jar = null)
    {
        // convert the httpRequest object to actual http headers (and body)?
        $eol = "\r\n";
        $firstLine =
            $req->getMethod() .
            ' ' .
            $req->getRequestTarget() .
            ' ' .
            $req->getHttpVersion() .
            $eol;

        $out = '';
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

        if (null !== $jar) {
            $cookies = $jar->getCookies($req);
            if ($cookies) {
                $els = [];
                foreach ($cookies as $k => $v) {
                    $els[] = "$k=$v";
                }
                $sCook = implode('; ', $els);
                $out .= 'Cookie: ' . $sCook . $eol;
            }
        }


        return [
            $firstLine,
            $out,
            $req->getBody(),
        ];
    }

}
