<?php


namespace Kamille\Architecture\ModuleInstaller;


use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Architecture\ModuleInstaller\Exception\ModuleInstallerException;
use Kamille\Module\ModuleInterface;

/**
 * This module installer will create a modules.txt file at the application root level.
 * This modules.txt file contains the list of available modules, one per line.
 *
 *
 *
 */
class ModuleInstaller implements ModuleInstallerInterface
{

    private $file;


    public function install($moduleName)
    {
        $oClass = $this->getClassInstance($moduleName);
        $oClass->install();
        $list = $this->getInstalledModulesList();
        if (!in_array($moduleName, $list)) {
            $list[] = $moduleName;
        }
        $this->writeList($list);
        return true;
    }

    public function uninstall($moduleName)
    {
        $oClass = $this->getClassInstance($moduleName);
        $oClass->uninstall();
        $list = $this->getInstalledModulesList();
        unset($list[$moduleName]);
        $this->writeList($list);
        return true;
    }

    public function isInstalled($moduleName)
    {
        $list = $this->getInstalledModulesList();
        return in_array($moduleName, $list, true);
    }

    public function getInstalledModulesList()
    {
        $ret = [];
        $f = $this->getFile();
        if (file_exists($f)) {
            $ret = file($f, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $ret = array_filter($ret);
        }
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function getFile()
    {
        if (null === $this->file) {
            $this->file = ApplicationParameters::get('app_dir') . "/modules.txt";
        }
        return $this->file;
    }


    /**
     * @param $moduleName
     * @return ModuleInterface
     * @throws ModuleInstallerException
     */
    private function getClassInstance($moduleName)
    {
        $modulesDir = ApplicationParameters::get('app_dir') . "/class-modules/$moduleName";
        if (is_dir($modulesDir)) {
            $moduleFile = $modulesDir . "/$moduleName" . "Module.php";
            if (file_exists($moduleFile)) {

                require_once $moduleFile;


                $className = $moduleName . '\\' . $moduleName . "Module";
                $oClass = new $className();
                if ($oClass instanceof ModuleInterface) {

                    return $oClass;


                } else {
                    throw new ModuleInstallerException(sprintf("$className must be an instance of ModuleInterface, instance of %s given", get_class($oClass)));
                }
            } else {
                throw new ModuleInstallerException("module file not found: $moduleFile");
            }
        } else {
            throw new ModuleInstallerException("module not imported yet: $moduleName. Please import the module before you can install it");
        }
    }


    private function writeList(array $list)
    {
        $f = $this->getFile();
        file_put_contents($f, implode(PHP_EOL, $list));
    }
}