<?php


namespace Ling\Light_Kit_Admin\ControllerHub;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler;


/**
 * The LightKitAdminControllerHubHandler class.
 */
class LightKitAdminControllerHubHandler extends LightBaseControllerHubHandler
{


    /**
     * @implementation
     */
    public function handle(string $controllerIdentifier, HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->doHandle(__DIR__ . "/../Controller", $controllerIdentifier, $request);

    }


}