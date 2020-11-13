<?php


namespace Ling\Light\Http;


/**
 * The HttpRedirectResponse class.
 *
 */
class HttpRedirectResponse extends HttpResponse
{

    /**
     * The absolute url to redirect the user to.
     *
     * @var string
     */
    protected $url;


    /**
     * Builds the HttpRedirectResponse instance.
     *
     * @param string $body
     * @param int $code
     */
    public function __construct($body = "", $code = 200)
    {
        parent::__construct($body, 301);
        $this->url = null;
    }

    /**
     * Sets the url.
     *
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        $this->getBody()->append($this->getRedirectBody());
    }


    /**
     * Creates and returns the http redirect response instance.
     *
     * @param string $url
     * @return $this
     */
    public static function create(string $url)
    {
        $o = new static('', 301);
        $o->setUrl($url);
        return $o;
    }








    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns the body of the redirect page.
     */
    private function getRedirectBody(): string
    {
        $url = $this->url;

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
        return $body;
    }

}