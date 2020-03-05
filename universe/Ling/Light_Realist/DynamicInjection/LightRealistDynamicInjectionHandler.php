<?php


namespace Ling\Light_Realist\DynamicInjection;


use Ling\Light_CsrfSession\Service\LightCsrfSessionService;
use Ling\Light_Realist\Exception\LightRealistException;
use Ling\Light_ReverseRouter\Service\LightReverseRouterService;

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
            case "csrf_token":


                /**
                 * @var $csrfService LightCsrfSessionService
                 */
                $csrfService = $this->container->get('csrf_session');
                return $csrfService->getToken();


                //--------------------------------------------
                // old system with csrf service
                // I keep it just in case, but it's deprecated.
                //--------------------------------------------
//                if (true === LightTool::isAjax($this->container)) {
//                    return "not_created_because_ajax";
//                } else {
//
//                    /**
//                     * @var $csrf LightCsrfService
//                     */
//                    $csrf = $this->container->get("csrf");
//                    $tokenName = array_shift($arguments);
//                    $tokenValue = $csrf->createToken($tokenName);
//                    return $tokenValue;
//                }


                break;
            case "route":
                /**
                 * @var $router LightReverseRouterService
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
                throw new LightRealistException("Action not recognized: $actionId.");
                break;
        }
    }


}