<?php


namespace Kamille\Services;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Services\Exception\XConfigException;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;

class XConfig
{

    /**
     * @var array of module names => configuration parameters
     *          configuration parameters: key => value
     *
     */
    private static $confs = [];


    /**
     * @param $key :
     *      key: <module> <.> <moduleKey>
     *      moduleKey, a dot separated string, each dot goes down one level in the array
     *
     *
     * For instance: Core.paramOne
     *
     */
    public static function get($key, $default = null, $throwEx = false)
    {
        $p = explode('.', $key, 2);
        $error = null;
        if (count($p) > 1) {
            $module = array_shift($p);


            if (ModuleInstallationRegister::isInstalled($module)) {


                if (false === array_key_exists($module, self::$confs)) {
                    $appDir = ApplicationParameters::get('app_dir');
                    $modConfFile = $appDir . "/config/modules/$module.conf.php";
                    $conf = [];
                    if (file_exists($modConfFile)) {
                        include $modConfFile;

                    }
                    self::$confs[$module] = $conf;
                }

                $holder = self::$confs[$module];
                $ret = null;
                $found = true;
                while ($parameter = array_shift($p)) {
                    if (array_key_exists($parameter, $holder)) {
                        $ret = $holder[$parameter];
                        $holder = $holder[$parameter];
                    } else {
                        $error = "Parameter not found: $key";
                        $found = false;
                        break;
                    }
                }
                if (true === $found) {
                    return $ret;
                }
            } else {
                $error = "Module $module is not installed, cannot access $key";
            }
        } else {
            $error = "Invalid parameter syntax: $key";
        }
        if (true === $throwEx) {
            throw new XConfigException($error);
        }
        return $default;
    }
}