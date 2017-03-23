<?php


namespace Kamille\Utils\ModuleInstaller;


use Kamille\Utils\ModuleInstaller\Exception\ModuleInstallerException;
use Kamille\Module\ModuleInterface;
use Kamille\Utils\StepTracker\StepTrackerAwareInterface;
use Kamille\Utils\StepTracker\StepTrackerInterface;

/**
 * This is a hacked version of the ModuleInstaller class (from the Kamille framework).
 * It works exactly the same, except on how to access the modules.txt file.
 *
 */
class ModuleInstaller implements StepTrackerAwareInterface
{

    private $file;
    private $appDir;
    private $stepTracker;


    public function install($moduleName)
    {
        $oClass = $this->getClassInstance($moduleName);
        if (null !== $this->stepTracker && $oClass instanceof StepTrackerAwareInterface) {
            $oClass->setStepTracker($this->stepTracker);
        }
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
        if (null !== $this->stepTracker && $oClass instanceof StepTrackerAwareInterface) {
            $oClass->setStepTracker($this->stepTracker);
        }
        $oClass->uninstall();
        $list = $this->getInstalledModulesList();
        unset($list[array_search($moduleName, $list)]);
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


    public function setAppDir($appDir)
    {
        $this->appDir = $appDir;
        return $this;
    }

    public function setStepTracker(StepTrackerInterface $stepTracker)
    {
        $this->stepTracker = $stepTracker;
        return $this;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    private function getFile()
    {
        if (null === $this->file) {
            $this->file = $this->appDir . "/modules.txt";
        }
        return $this->file;
    }


    /**
     * @param $moduleName
     * @throws ModuleInstallerException
     */
    private function getClassInstance($moduleName)
    {
        $modulesDir = $this->appDir . "/class-modules/$moduleName";
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