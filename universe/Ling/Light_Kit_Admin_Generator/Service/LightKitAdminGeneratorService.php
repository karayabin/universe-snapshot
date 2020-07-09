<?php


namespace Ling\Light_Kit_Admin_Generator\Service;

use Ling\Light_Kit_Admin_Generator\Generator\ControllerGenerator;
use Ling\Light_Kit_Admin_Generator\Generator\MenuConfigGenerator;
use Ling\Light_RealGenerator\Service\LightRealGeneratorService;

/**
 * The LightKitAdminGeneratorService class.
 */
class LightKitAdminGeneratorService extends LightRealGeneratorService
{

    /**
     * @overrides
     */
    protected function onGenerateAfter(array $configBlock)
    {

        $debugCallable = [$this, "debugLog"];




        if (array_key_exists("menu", $configBlock)) {
            $this->debugLog("Menu configuration found.");
            $menuGenerator = new MenuConfigGenerator();
            $menuGenerator->setDebugCallable($debugCallable);
            $menuGenerator->setContainer($this->container);
            $menuGenerator->generate($configBlock);
        } else {
            $this->debugLog("No menu configuration found.");
        }

        if (array_key_exists("controller", $configBlock)) {
            $this->debugLog("Controller configuration found.");
            $controllerGenerator = new ControllerGenerator();
            $controllerGenerator->setDebugCallable($debugCallable);
            $controllerGenerator->setContainer($this->container);
            $controllerGenerator->generate($configBlock);
        } else {
            $this->debugLog("No controller configuration found.");
        }

//        if (array_key_exists("route", $configBlock)) {
//            $routeGenerator = new RouteGenerator();
//            $routeGenerator->setContainer($this->container);
//            $routeGenerator->generate($configBlock);
//        }

    }


}