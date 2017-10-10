<?php


namespace Kamille\Utils\Routsy\Util\ConfigGenerator;


use Bat\FileSystemTool;
use Bat\FileTool;
use DirScanner\YorgDirScannerTool;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;
use Kamille\Utils\Routsy\Util\ConfigGenerator\Exception\ConfigGeneratorException;
use LinearFile\LineSet\LineSetInterface;
use LinearFile\LineSetFinder\BiggestWrapLineSetFinder;

class ConfigGenerator
{

    private $confDir;
    private $modulesTargetDir;


    public static function create()
    {
        return new static();
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

        if (file_exists($moduleFile)) {
            $routes = [];
            include $moduleFile;

            $lines = file($moduleFile);
            $lineSets = $this->getLineSets($lines);



            foreach ($routes as $id => $route) {
                // we only override routes that don't exist (don't want to accidentally override the user's work)
                if (!array_key_exists($id, $_routes)) {
                    // doesn't exist?
                    // ok, is it dynamic or static (make two groups)?

                    /**
                     * @var LineSetInterface $lineSet
                     */
                    $lineSet = $lineSets[$id];
                    $routeContent = $lineSet->toString();
                    if (true === $this->isDynamic($route[0])) {
                        $newRoutesDynamic[$id] = $routeContent;
                    } else {
                        $newRoutesStatic[$id] = $routeContent;
                    }
                }
            }
        }



        // append in static Section
        if (count($newRoutesStatic) > 0) {
            foreach ($newRoutesStatic as $id => $routeContent) {
                $dynamicSectionLineNumber = $this->getSectionLineNumber("dynamic", $appFile);
                FileTool::insert($dynamicSectionLineNumber, PHP_EOL . $routeContent . PHP_EOL, $appFile);
            }
        }



        // append in dynamic Section
        if (count($newRoutesDynamic) > 0) {
            foreach ($newRoutesDynamic as $id => $routeContent) {
                $userAfterSectionLineNumber = $this->getSectionLineNumber("user - after", $appFile);
                FileTool::insert($userAfterSectionLineNumber, PHP_EOL . $routeContent . PHP_EOL, $appFile);
            }
        }

        FileTool::cleanVerticalSpaces($appFile, 2);
    }


    private function unprocessModule($appRoutsyFile, $module)
    {

        if (file_exists($appRoutsyFile)) {
            $lines = file($appRoutsyFile);
            $lineSets = $this->getLineSets($lines);


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

    private function isDynamic($uri)
    {
        return (false !== strpos($uri, '{'));
    }

    private function getLineSets(array $lines)
    {
        $pat = '!^\$routes\[([^\]]+)\]\s*=!';
        $lineSets = BiggestWrapLineSetFinder::create()
            ->setPrepareNameCallback(function ($v) {
                return substr($v, 1, -1);
            })
            ->setNamePattern($pat)
            ->setStartPattern($pat)
            ->setPotentialEndPattern('!\];!')
            ->find($lines);
        return $lineSets;
    }

    private function getSectionLineNumber($section, $file)
    {
        $lines = file($file);


        $patternLine = '!//--------------------------------------------!';
        $pattern2 = '!//\s*' . strtoupper($section) . '!';
        $n = 1;
        $match1 = false;
        $match2 = false;
        foreach ($lines as $line) {
            if (false === $match1 && preg_match($patternLine, $line)) {
                $match1 = true;
            } elseif (true === $match1 && false === $match2 && preg_match($pattern2, $line)) {
                $match2 = true;
            } elseif (true === $match1 && true === $match2 && preg_match($patternLine, $line)) {
                return $n - 2;
            }
            $n++;
        }
        throw new ConfigGeneratorException("section not found $section");
    }

    private function createEmptyConfFile($appFile)
    {
        $data = file_get_contents(__DIR__ . "/assets/routsy.conf.tpl.php");
        FileSystemTool::mkfile($appFile, $data);
    }
}