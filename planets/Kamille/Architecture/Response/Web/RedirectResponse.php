<?php


namespace Kamille\Architecture\Response\Web;



class RedirectResponse implements HttpResponseInterface
{

    /**
     * Note: this is an absolute url
     */
    private $url;


    public function __construct($url)
    {
        $this->url = $url;
    }

    public static function create($url)
    {
        return new static($url);
    }

    public function send()
    {
        header("Location: " . $this->url);
    }


}