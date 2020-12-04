<?php


namespace Ling\Light_Kit_Admin_UserPreferences\Light_ControllerHub\Generated;


use Ling\Light\Http\HttpRequestInterface;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_ControllerHub\ControllerHubHandler\LightBaseControllerHubHandler;


/**
 * The LightKitAdminUserPreferencesControllerHubHandler class.
 */
class LightKitAdminUserPreferencesControllerHubHandler extends LightBaseControllerHubHandler
{


    /**
     * @implementation
     */
    public function handle(string $controllerIdentifier, HttpRequestInterface $request): HttpResponseInterface
    {
        return $this->doHandle(__DIR__ . "/../../Controller", $controllerIdentifier, $request);

    }


}