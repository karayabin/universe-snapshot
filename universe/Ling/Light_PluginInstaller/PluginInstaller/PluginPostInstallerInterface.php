<?php


namespace Ling\Light_PluginInstaller\PluginInstaller;

/**
 * The PluginPostInstallerInterface interface.
 */
interface PluginPostInstallerInterface
{


    /**
     * Registers all the post installers for this plugin.
     *
     * See the @page(Light_PluginInstaller conception notes) for more details.
     *
     * Each item of the returned array is an array with the following structure:
     *
     * - 0: level: int, the level on which to register the post installer callable
     * - 1: callable: callable, the post installer callable to execute
     *
     *
     * @return array
     */
    public function registerPostInstallerCallables(): array;
}