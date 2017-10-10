<?php


namespace Kamille\Utils\ModuleInstallationRegister;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;

class ModuleInstallationRegister
{

    private static $listInstalled;

    public static function isInstalled($module)
    {
        $list = self::getInstalled();
        return (in_array($module, $list, true));
    }

    public static function getInstalled()
    {
        if (null === self::$listInstalled) {
            $ret = [];
            $appDir = ApplicationParameters::get("app_dir", null, true);
            $modulesFile = $appDir . "/modules.txt";
            if (file_exists($modulesFile)) {
                $ret = file($modulesFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $ret = array_filter($ret);
                $ret = array_unique($ret);
            }
            self::$listInstalled = $ret;
        }
        return self::$listInstalled;
    }

    public static function getUninstalled()
    {
        $installed = self::getInstalled();
        $all = self::getAllModules();
        return array_diff($all, $installed);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getAllModules()
    {
        $ret = [];
        $appDir = ApplicationParameters::get("app_dir", null, true);
        $modulesDir = $appDir . "/class-modules";
        $files = scandir($modulesDir);
        foreach ($files as $f) {
            if ('.' !== $f && '..' !== $f && is_dir($modulesDir . "/" . $f)) {
                $ret[] = $f;
            }
        }
        return $ret;
    }
}

