<?php


namespace Ling\Light_PluginInstaller\Extension;

/**
 * The PluginInstallerExtensionInterface interface.
 */
interface PluginInstallerExtensionInterface
{


    /**
     * Triggers the event which name was given.
     *
     * @param string $eventName
     * @param $parameter
     * @return void
     */
    public function trigger(string $eventName, $parameter): void;
}