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


/**
 * EncoderTool
 * @author Lingtalfi
 * 2015-06-12
 *
 */
class EncoderTool
{

    /**
     * Wraps a string with double quotes,
     *      and escape the inner double quotes with a backslash.
     * 
     * @return string
     */
    public static function quoteString($string)
    {
        return '"' . str_replace('"', '\"', $string) . '"';
    }

    /**
     *
     * It converts non ascii (>=32, <127) chars to octal notation,
     * it also escape backslashes with a backslashes,
     * and then double quote with backslash.
     *
     * I'm not sure if this is rfc compliant (too complicated for me),
     * but the paw software was doing something like this.
     *
     *
     *
     *
     * This might be used in the name and filename parameters of the multipart/form-data.
     * For instance:
     *
     *
     *
     * POST / HTTP/1.1
     * Content-Type: multipart/form-data; boundary=__X_PAW_BOUNDARY__
     * Host: beerepo
     * Connection: close
     * User-Agent: Paw/2.2.2 (Macintosh; OS X/10.10.3) GCDHTTPRequest
     * Content-Length: 438
     *
     * --__X_PAW_BOUNDARY__
     * Content-Disposition: form-data; name="ar\303\251&d\342\202\254"; filename="tinye\314\201 trans\342\202\254.gif"
     * Content-Type: image/gif
     * ...
     *
     *
     *
     *
     * @param $string
     * @return string
     */
    public static function quotedNonAsciiToOctal($string)
    {
        $ret = str_replace('\\', '\\\\', $string);


        $replaceCallback = function ($v) {
            $s = '';
            $len = strlen($v);
            for ($i = 0; $i < $len; $i++) {
                $s .= '\\' . decoct(ord($v[$i]));
            }
            return $s;
        };
//        $pattern = '![^\x20-\x7E]!u';
        $pattern = '/[[:^print:]]/';
        $ret = preg_replace_callback($pattern, function ($m) use ($replaceCallback) {
            return call_user_func($replaceCallback, $m[0]);
        }, $ret);
        $ret = str_replace('"', '\\"', $ret);

        return '"' . $ret . '"';

    }

}
