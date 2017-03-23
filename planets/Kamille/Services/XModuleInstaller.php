<?php


namespace Kamille\Services;


use Kamille\Architecture\ModuleInstaller\ModuleInstaller;
use Kamille\Architecture\ModuleInstaller\ModuleInstallerInterface;

class XModuleInstaller
{

    private static $inst;


    /**
     * @return ModuleInstallerInterface
     */
    public static function inst()
    {
        if (null === self::$inst) {
            self::$inst = new ModuleInstaller();
        }
        return self::$inst;
    }


}