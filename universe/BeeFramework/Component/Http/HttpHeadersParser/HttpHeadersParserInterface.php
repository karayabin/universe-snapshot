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
use BeeFramework\Component\Bag\CaseInsensitiveReadOnlyBagInterface;


/**
 * HttpHeadersParserInterface
 * @author Lingtalfi
 * 2015-06-10
 *
 * Current relevant rfc
 * https://tools.ietf.org/html/rfc7230
 *
 *
 */
interface HttpHeadersParserInterface
{

    /**
     * This is the one method to call before any others.
     * @return HttpHeadersParserInterface
     */
    public function setRawHeaders($rawHeaders);


    //------------------------------------------------------------------------------/
    // STATUS LINE
    //------------------------------------------------------------------------------/
    public function getHttpVersion();

    public function getStatusCode();

    public function getReasonPhrase();



    //------------------------------------------------------------------------------/
    // HEADERS ACCESS
    //------------------------------------------------------------------------------/
    /**
     * @return CaseInsensitiveReadOnlyBagInterface
     */
    public function headers();

    //------------------------------------------------------------------------------/
    // MOST COMMON HEADERS RELATED METHODS
    //------------------------------------------------------------------------------/
    public function getContentType();

}
