<?php


namespace Ling\Light\Http;


/**
 * The HttpRedirectResponse class.
 *
 */
class HttpRedirectResponse extends HttpResponse
{


    /**
     * Creates and returns the http redirect response instance.
     *
     * @param string $url
     * @return $this
     */
    public static function create(string $url)
    {

        $body = <<<EEE
            
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
    <head>
        <title>301 Moved Permanently</title>
        <meta http-equiv="refresh" content="0; URL='$url'" />
    </head>
    <body>
        <h1>Moved Permanently</h1>
        <p>The document has moved <a href="$url">here</a>.</p>
    </body>
</html>            
EEE;

        return new static($body, 301);
    }
}