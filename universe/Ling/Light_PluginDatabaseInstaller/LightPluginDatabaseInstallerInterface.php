<?php


namespace Ling\Light_PluginDatabaseInstaller;


use Ling\Light\ServiceContainer\LightServiceContainerInterface;

/**
 * The LightPluginDatabaseInstallerInterface interface.
 *
 * Light plugins who want to use our service should implement this interface.
 *
 */
interface LightPluginDatabaseInstallerInterface
{

    /**
     * Installs the database part of the light plugin.
     *
     * @param LightServiceContainerInterface $container
     * @return void
     * @throws \Exception
     */
    public function install(LightServiceContainerInterface $container);

    /**
     * Uninstalls the database part of the light plugin.
     *
     * @param LightServiceContainerInterface $container
     * @return void
     * @throws \Exception
     */
    public function uninstall(LightServiceContainerInterface $container);
}