<?php


namespace Ling\Light_Kit_Admin_UserData\ControllerHub;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler;


/**
 * The LightKitAdminUserDataControllerHubHandler class.
 */
class LightKitAdminUserDataControllerHubHandler extends LightBaseControllerHubHandler
{


    /**
     * @implementation
     */
    public function handle(string $controllerIdentifier, HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->doHandle(__DIR__ . "/../Controller", $controllerIdentifier, $request);

    }


}