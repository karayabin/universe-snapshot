<?php


namespace Ling\Light_Kit_Admin\Realist\DynamicInjection;


use Ling\Light\Router\LightRouterInterface;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Csrf\Service\LightCsrfService;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_Realist\DynamicInjection\RealistDynamicInjectionHandlerInterface;

/**
 * The LightKitAdminRealistDynamicInjectionHandler class.
 */
class LightKitAdminRealistDynamicInjectionHandler implements RealistDynamicInjectionHandlerInterface
{

    /**
     * This property holds the container for this instance.
     * @var LightServiceContainerInterface
     */
    protected $container;


    /**
     * Builds the LightKitAdminRealistDynamicInjectionHandler instance.
     */
    public function __construct()
    {
        $this->container = null;
    }


    /**
     * @implementation
     */
    public function handle(array $arguments)
    {
        $actionId = array_shift($arguments);
        switch ($actionId) {
            case "csrf_token":
                /**
                 * @var $router LightRouterInterface
                 */
                $router = $this->container->get("router");
                $matchingRoute = $router->getMatchingRoute();


                if (false !== $matchingRoute) {
                    if (false === $matchingRoute['is_ajax']) {

                        /**
                         * @var $csrf LightCsrfService
                         */
                        $csrf = $this->container->get("csrf");


                        $tokenName = array_shift($arguments);
                        $tokenValue = $csrf->createToken($tokenName);
                        return $tokenValue;
                    }
                    return "not_used_in_ajax";
                }
                return "not_set";
                break;
            default:
                throw new LightKitAdminException("Action not recognized: $actionId.");
                break;
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the container.
     *
     * @param LightServiceContainerInterface $container
     */
    public function setContainer(LightServiceContainerInterface $container)
    {
        $this->container = $container;
    }

}