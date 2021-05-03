<?php


namespace Ling\Light_ControllerHub\Controller;


use Ling\Light\Controller\LightController;
use Ling\Light\Helper\ControllerHelper;
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

        } elseif (array_key_exists("execute", $get)) {
            $execute = $get['execute'];
            $p = explode('->', $execute, 2);
            if (2 === count($p)) {
                $class = array_shift($p);
                $method = array_shift($p);
                $r = new \ReflectionClass($class);
                if (true === $r->implementsInterface("Ling\Light\Controller\LightControllerInterface")) {
                    $controller = $class . '->' . $method;
                    $light = $this->getLight();
                    return ControllerHelper::executeController($controller, $light);
                } else {
                    $this->error("This class is not a LightControllerInterface instance ($class). Aborting.");
                }
            } else {
                $this->error("Invalid execute string: $execute. Aborting.");
            }

        } else {
            $this->error("Unknown request type. Aborting.");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Throws an exception.
     * @param string $msg
     * @param int|null $code
     * @throws \Exception
     */
    private function error(string $msg, int $code = null)
    {
        throw new LightControllerHubException(static::class . ": " . $msg, $code);
    }


}

