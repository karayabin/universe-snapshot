<?php


namespace Kamille\Architecture\ModuleInstaller;


use Kamille\Architecture\ModuleInstaller\Exception\ModuleInstallerException;


/**
 * This is a module installer for the kamille framework.
 * See motivation notes in "implementation notes" from the kaminos framework.
 */
interface ModuleInstallerInterface
{


    /**
     * Note: if a module is already installed, the module will
     * be reinstalled.
     * (one should use the isInstalled method to check whether or not
     * a module is already installed)
     *
     *
     *
     * @throws ModuleInstallerException when something wrong happens
     * @return true if the installation of the module was successful
     */
    public function install($moduleName);

    /**
     * @throws ModuleInstallerException when something wrong happens
     * @return true if the uninstallation of the module was successful
     */
    public function uninstall($moduleName);

    /**
     * @return bool
     */
    public function isInstalled($moduleName);


    /**
     * @return array, list of installed module names
     */
    public function getInstalledModulesList();


}