<?php


namespace Ling\Light_Kit\Helper;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Vars\Service\LightVarsService;

/**
 * The LightKitControllerHelper class.
 */
class LightKitControllerHelper
{


    /**
     * Returns the value of the global variable set in the "controller" namespace, with the given key.
     * If it doesn't exist, returns the given default value.
     *
     * @param LightServiceContainerInterface $container
     * @param string $key
     * @param null $default
     */
    public static function getControllerVar(LightServiceContainerInterface $container, string $key, $default = null)
    {
        /**
         * @var $_va LightVarsService
         */
        $_va = $container->get("vars");
        return $_va->getVar("controller.$key", $default);
    }


    /**
     * Returns the controller vars array.
     *
     * @param LightServiceContainerInterface $container
     * @return array
     * @throws \Exception
     */
    public static function getControllerVars(LightServiceContainerInterface $container): array
    {
        /**
         * @var $_va LightVarsService
         */
        $_va = $container->get("vars");
        return $_va->getVar("controller", []);
    }


}