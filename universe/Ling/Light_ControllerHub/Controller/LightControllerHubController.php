<?php


namespace Ling\Light_ControllerHub\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Http\HttpResponseInterface;
use Ling\Light_ControllerHub\Exception\LightControllerHubException;
use Ling\Light_ControllerHub\Service\LightControllerHubService;

/**
 * The LightControllerHubController class.
 */
class LightControllerHubController extends LightController
{


    /**
     * Understands the incoming http request an returns the appropriate HttpResponseInterface.
     * @return HttpResponseInterface
     * @throws \Exception
     */
    public function render(): HttpResponseInterface
    {
        $httpRequest = $this->getHttpRequest();
        $get = $httpRequest->getGet();
        if (
            array_key_exists('plugin', $get) &&
            array_key_exists('controller', $get)
        ) {
            $plugin = $get['plugin'];
            $controller = $get['controller'];


            /**
             * @var $service LightControllerHubService
             */
            $service = $this->getContainer()->get("controller_hub");
            $handler = $service->getControllerHubHandler($plugin);


            return $handler->handle($controller, $httpRequest);

        } else {
            throw new LightControllerHubException("Missing parameter(s): plugin and/or controller.");
        }
    }
}