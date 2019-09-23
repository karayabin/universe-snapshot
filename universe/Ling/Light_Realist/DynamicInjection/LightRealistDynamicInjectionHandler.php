<?php


namespace Ling\Light_Realist\DynamicInjection;


use Ling\Light\ReverseRouter\LightReverseRouterInterface;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;

/**
 * The LightRealistDynamicInjectionHandler class.
 */
class LightRealistDynamicInjectionHandler extends ContainerAwareRealistDynamicInjectionHandler
{


    /**
     * @implementation
     */
    public function handle(array $arguments)
    {
        $actionId = array_shift($arguments);
        switch ($actionId) {
            case "route":
                /**
                 * @var $router LightReverseRouterInterface
                 */
                $router = $this->container->get("reverse_router");
                $route = array_shift($arguments);
                $urlParams = [];
                if ($arguments) {
                    $urlParams = array_shift($arguments);
                }
                return $router->getUrl($route, $urlParams);
                break;
            default:
                throw new LightKitAdminException("Action not recognized: $actionId.");
                break;
        }
    }


}