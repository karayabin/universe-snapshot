<?php


namespace Ling\Light_ControllerHub\ControllerHubHandler;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;

/**
 * The LightControllerHubHandlerInterface interface.
 */
interface LightControllerHubHandlerInterface
{


    /**
     * Process the given controllerIdentifier and returns an appropriate http response.
     *
     *
     * @param string $controllerIdentifier
     * @param HttpRequestInterface $request
     * @return HttpResponseInterface
     */
    public function handle(string $controllerIdentifier, HttpRequestInterface $request): HttpResponseInterface;
}