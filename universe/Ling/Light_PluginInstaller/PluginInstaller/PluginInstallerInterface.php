<?php


namespace Ling\Light_PluginInstaller\PluginInstaller;


/**
 * The PluginInstallerInterface interface.
 */
interface PluginInstallerInterface
{
    /**
     * Installs the plugin in the light application.
     * If the plugin is already installed, this method does nothing.
     *
     * Throws an exception if the installation fails.
     *
     * @return void
     * @throws \Exception
     */
    public function install();


    /**
     * Returns whether the core install phase of the plugin is fully completed.
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * @return bool
     */
    public function isInstalled(): bool;

    /**
     * Uninstalls the plugin.
     * If the plugin is already uninstalled, this method does nothing.
     *
     * Throws an exception if the uninstallation fails.
     *
     * @return void
     * @throws \Exception
     */
    public function uninstall();




    /**
     * Returns the array of dependencies.
     * It's an array of plugin names.
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * @return array
     */
    public function getDependencies(): array;
}