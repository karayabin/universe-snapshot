<?php


namespace Kamille\Utils\Routsy\Util\ConfigGenerator;


use Bat\FileSystemTool;
use Bat\FileTool;
use ClassCooker\Helper\ClassCookerHelper;
use DirScanner\YorgDirScannerTool;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;
use Kamille\Utils\Routsy\Util\ConfigGenerator\Exception\ConfigGeneratorException;
use Kamille\Utils\Routsy\Util\ConfigGenerator\Helper\RoutsyConfigFileGeneratorHelper;
use LinearFile\LineSet\LineSetInterface;

class ConfigGenerator
{

    private $confDir;
    private $modulesTargetDir;


    public static function create()
    {
        return new static();
    }

    public static function addSectionIfNotExist($routsyFile, $sectionLabel, $parentSectionLabel)
    {
        if (file_exists($routsyFile)) {
            // does the section already exist?
            $found = false;
            try {
                $lineNumber = self::getSectionLineNumber($sectionLabel, $routsyFile);
                $found = true;
            } catch (ConfigGeneratorException $e) {

            }


            if (false === $found) {


                $lineNumber = self::getSectionLineNumber($parentSectionLabel, $routsyFile);
                $lineNumber += 3; // sections are comments on 3 lines...


                /**
                 * Note that we always add one line above and below for security
                 */
                $sectionContent = <<<EEE
                
//--------------------------------------------
// $sectionLabel
//--------------------------------------------

EEE;


                FileTool::insert($lineNumber, $sectionContent . PHP_EOL, $routsyFile);


                // check that the routeId doesn't exist, if it does, we trigger an error.
                $routes = [];
            }
        } else {
            throw new \Exception("routsy file not found: $routsyFile");
        }
    }

    /**
     * This will insert the routeContent into the routsyFile if the routeId
     *
     * does not already exist in the given routsyFile..
     * It will trigger an error if the routeId already exists in the routsyFile.
     *
     *
     */
    public static function addRouteToRoutsyFile($routeId, $routeContent, $routsyFile, $section = null)
    {
        if (null === $section) {
            $section = "USER - BEFORE";
        }

        // check that the routeId doesn't exist, if it does, we trigger an error.
        $routes = [];
        if (file_exists($routsyFile)) {
            include $routsyFile;
            if (false === array_key_exists($routeId, $routes)) {

                try {
                    $lineNumber = self::getSectionLineNumber($section, $routsyFile);
                } catch (ConfigGeneratorException $e) {
                    // section not found? let's try another one
                    $section = "STATIC";
                    $lineNumber = self::getSectionLineNumber($section, $routsyFile);

                }

                $lineNumber += 3; // sections are comments on 3 lines...
                FileTool::insert($lineNumber, $routeContent . PHP_EOL, $routsyFile);
            } else {
                throw new ConfigGeneratorException("route already exists with id $routeId");
            }
        } else {
            throw new ConfigGeneratorException("routsy file not found: $routsyFile");
        }
    }

    public function refresh()
    {
        $installedModules = ModuleInstallationRegister::getInstalled();
        $uninstalledModules = ModuleInstallationRegister::getUninstalled();


        //--------------------------------------------
        // REGISTER INSTALLED MODULES
        //--------------------------------------------
        $this->registerModules($installedModules);


        //--------------------------------------------
        // UNREGISTER UNINSTALLED MODULES
        //--------------------------------------------
        $this->unregisterModules($uninstalledModules);
    }

    public function registerModule($module)
    {
        $modConfDir = $this->modulesTargetDir . "/$module/routsy";
        $appRoutsyDir = $this->confDir;
        if (is_dir($modConfDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($modConfDir, 'php', false, false, true);
            foreach ($files as $fileName) {
                $moduleFile = $modConfDir . "/$fileName";
                $appFile = $appRoutsyDir . "/$fileName";
                $this->processModule($moduleFile, $appFile);
            }
        }
    }

    public function unregisterModule($module)
    {

        $appRoutsyDir = $this->confDir;
        if (is_dir($appRoutsyDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($appRoutsyDir, 'php', false, false, false);
            foreach ($files as $f) {
                $this->unprocessModule($f, $module);
            }
        }
    }

    public function setConfDir($confDir)
    {
        $this->confDir = $confDir;
        return $this;
    }

    public function setModulesTargetDir($modulesTargetDir)
    {
        $this->modulesTargetDir = $modulesTargetDir;
        return $this;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getSectionLineNumber($section, $file)
    {
        $n = ClassCookerHelper::getSectionLineNumber($section, $file);
        if (false === $n) {
            throw new ConfigGeneratorException("section not found $section");
        }
        return $n;
    }


    private function processModule($moduleFile, $appFile)
    {

        $routes = [];
        if (file_exists($appFile)) {
            include $appFile;
        } else {
            $this->createEmptyConfFile($appFile);
        }
        $_routes = $routes;


        $newRoutesDynamic = [];
        $newRoutesStatic = [];

        $routes = [];
        if (file_exists($moduleFile)) {
            include $moduleFile;
        }


        // we only do something if the module contains at least one route
        if ($routes) {
            $lines = file($moduleFile);
            $lineSets = RoutsyConfigFileGeneratorHelper::getLineSets($lines);
            foreach ($routes as $id => $route) {
                // we only create routes that don't exist (don't want to accidentally override the user's work)
                if (!array_key_exists($id, $_routes)) {
                    // doesn't exist?
                    // ok, is it dynamic or static (make two groups)?

                    /**
                     * @var LineSetInterface $lineSet
                     */
                    $lineSet = $lineSets[$id];
                    $routeContent = trim($lineSet->toString());
                    if (true === RoutsyConfigFileGeneratorHelper::isDynamic($route[0])) {
                        $newRoutesDynamic[$id] = $routeContent;
                    } else {
                        $newRoutesStatic[$id] = $routeContent;
                    }
                }
            }


            // append in static Section
            if (count($newRoutesStatic) > 0) {
                foreach ($newRoutesStatic as $id => $routeContent) {
                    $dynamicSectionLineNumber = self::getSectionLineNumber("dynamic", $appFile);
                    FileTool::insert($dynamicSectionLineNumber, $routeContent . PHP_EOL, $appFile);
                }
            }


            // append in dynamic Section
            if (count($newRoutesDynamic) > 0) {
                foreach ($newRoutesDynamic as $id => $routeContent) {
                    $userAfterSectionLineNumber = self::getSectionLineNumber("user - after", $appFile);
                    FileTool::insert($userAfterSectionLineNumber, PHP_EOL . $routeContent . PHP_EOL, $appFile);
                }
            }

            FileTool::cleanVerticalSpaces($appFile, 2);
        }
    }


    private function unprocessModule($appRoutsyFile, $module)
    {

        if (file_exists($appRoutsyFile)) {
            $lines = file($appRoutsyFile);
            $lineSets = RoutsyConfigFileGeneratorHelper::getLineSets($lines);


            $slices = [];
            foreach ($lineSets as $id => $lineSet) {
                if (0 === strpos($id, $module . "_")) {
                    /**
                     * @var LineSetInterface $lineSet
                     */
                    $slices[] = [$lineSet->getStartLine(), $lineSet->getEndLine()];
                }

            }
            FileTool::extract($appRoutsyFile, $slices, true);
            FileTool::cleanVerticalSpaces($appRoutsyFile, 2);
        }
    }

    private function unregisterModules(array $uninstalledModules)
    {
        foreach ($uninstalledModules as $mod) {
            $this->unregisterModule($mod);
        }
    }


    private function registerModules(array $installedModules)
    {

        foreach ($installedModules as $mod) {
            $this->registerModule($mod);
        }
    }


    private function createEmptyConfFile($appFile)
    {
        $data = file_get_contents(__DIR__ . "/assets/routsy.conf.tpl.php");
        FileSystemTool::mkfile($appFile, $data);
    }
}