<?php


namespace Ling\Light_DeveloperWizard\Helper;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The CreateFileHelper class.
 */
class CreateFileHelper
{


    /**
     * Returns the theoretical path to the create file for the given planet.
     *
     * @param string $galaxy
     * @param string $planet
     * @param LightServiceContainerInterface $container
     * @return string
     */
    public static function getCreateFilePath(string $galaxy, string $planet, LightServiceContainerInterface $container): string
    {
        $appDir = $container->getApplicationDir();
        return $appDir . "/universe/$galaxy/$planet/assets/fixtures/create-structure.sql";
    }

}