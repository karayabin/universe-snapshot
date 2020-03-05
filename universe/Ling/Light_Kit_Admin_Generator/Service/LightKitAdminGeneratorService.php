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
        if (array_key_exists("menu", $configBlock)) {
            $menuGenerator = new MenuConfigGenerator();
            $menuGenerator->setContainer($this->container);
            $menuGenerator->generate($configBlock);
        }

        if (array_key_exists("controller", $configBlock)) {
            $controllerGenerator = new ControllerGenerator();
            $controllerGenerator->setContainer($this->container);
            $controllerGenerator->generate($configBlock);
        }

//        if (array_key_exists("route", $configBlock)) {
//            $routeGenerator = new RouteGenerator();
//            $routeGenerator->setContainer($this->container);
//            $routeGenerator->generate($configBlock);
//        }

    }


}