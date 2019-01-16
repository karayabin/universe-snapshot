<?php


namespace Jin\Application;


use Jin\Http\HttpRequest;
use Jin\Http\HttpResponse;

/**
 *
 * @info The Application class represents the web application.
 */
class Application
{


    private $appDir;
    private $profile;


    public function __construct()
    {
    }

    public function init($appDir, $profile)
    {
        $this->appDir = $appDir;
        $this->profile = $profile;
    }


    public function handleRequest(HttpRequest $request)
    {
        $response = new HttpResponse();
        return $response;
    }

}