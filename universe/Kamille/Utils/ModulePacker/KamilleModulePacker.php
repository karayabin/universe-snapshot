<?php


namespace Kamille\Utils\ModulePacker;


use Bat\FileSystemTool;
use ClassCooker\ClassCooker;
use DirScanner\YorgDirScannerTool;
use Kamille\Utils\ModulePacker\FileCreator\HooksClassCreator;
use Kamille\Utils\ModulePacker\FileCreator\RoutsyFileCreator;
use Kamille\Utils\ModulePacker\FileCreator\ServicesClassCreator;
use Kamille\Utils\ModulePacker\Exception\KamilleModulePackerException;
use Kamille\Utils\Routsy\Util\ConfigGenerator\Helper\RoutsyConfigFileGeneratorHelper;
use LinearFile\LineSet\LineSetInterface;

class KamilleModulePacker implements KamilleModulePackerInterface
{

    protected $appDir;
    protected $ignoreLinks;


    public function __construct()
    {
        $this->appDir = null;
        $this->ignoreLinks = true;
    }


    public static function create()
    {
        return new static();
    }

    public function setApplicationDir($appDir)
    {
        $this->appDir = $appDir;
        return $this;
    }

    public function pack($moduleName)
    {
        $appDir = $this->appDir;
        if ($appDir && file_exists($appDir)) {
            $moduleDir = $this->getModuleDir($moduleName);
            if (is_dir($moduleDir)) {


                $this->packConfig($moduleName);
                $this->packFiles($moduleName);
                $this->packHooks($moduleName);
                $this->packServices($moduleName);
                $this->packRoutsyRoutes($moduleName);
                $this->onPackAfter($moduleName);


            } else {
                $this->error("The module dir doesn't exist: $moduleDir");
            }
        } else {
            $this->error("appDir not found: $appDir");
        }
    }

    public function setIgnoreLinks($ignoreLinks)
    {
        $this->ignoreLinks = (bool)$ignoreLinks;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    protected function onPackAfter($moduleName)
    {

    }


    protected function packConfig($moduleName)
    {
        $configFile = $this->appDir . "/config/modules/$moduleName.conf.php";
        if (file_exists($configFile)) {
            $moduleDir = $this->getModuleDir($moduleName);
            $moduleConfigFile = $moduleDir . "/conf.php";
            $content = file_get_contents($configFile);
            FileSystemTool::mkfile($moduleConfigFile, $content);
        }
    }

    protected function packFiles($moduleName)
    {
        $moduleDir = $this->getModuleDir($moduleName);
        $packFile = $moduleDir . "/_pack.txt";
        if (file_exists($packFile)) {
            $entries = file($packFile, \FILE_SKIP_EMPTY_LINES | \FILE_IGNORE_NEW_LINES);
            foreach ($entries as $entry) {

                if ('#' === substr($entry, 0, 1)) {
                    continue;
                }

                // processing entries depending on the tag they contain
                if (0 === strpos($entry, '[app]')) {
                    $sourceDir = $this->appDir;
                    $targetDir = $moduleDir . "/files/app";

                    $entry = $this->replaceTags($entry, $moduleName);

                    $realEntryPath = str_replace('[app]', $sourceDir, $entry);
                    $realEntryTarget = str_replace('[app]', $targetDir, $entry);


                    if (file_exists($realEntryPath)) {
                        // do we copy links?
                        if (is_link($realEntryPath)) {
                            if (true === $this->ignoreLinks) {
                                continue;
                            }
                        }

                        // not a link? it's a dir or a file
                        if (is_dir($realEntryPath)) {
                            FileSystemTool::copyDir($realEntryPath, $realEntryTarget);
                        } elseif (is_file($realEntryPath)) {
                            // ensure that the target directory exist
                            $targetDir = dirname($realEntryTarget);
                            if (!file_exists($targetDir)) {
                                FileSystemTool::mkdir($targetDir, 0777, true);
                            }
                            copy($realEntryPath, $realEntryTarget);
                        }
                    }
                } else {
                    $this->error("Unknown packing baseNode with entry $entry");
                }
            }
        }
    }


    protected function packHooks($moduleName)
    {

        /**
         * Basically, reading the Core\Service\Hooks class for "inputs" of the given moduleName,
         * and packing them into the Module\<ModuleName>Hooks class.
         *
         * Note: this will overwrite the <ModuleName>Hooks class entirely (i.e. if you plan to use
         * the packer tool, don't put personal code into this <ModuleName>Hooks class.
         *
         * Note: this hooks parsing technique will only work if the signature of the method
         * lies on ONE line only (i.e. not multiple lines).
         *
         */


        /**
         * info: array
         *      - 0: signature
         *      - 1: built in content
         */
        $methodName2InfoFromThisModule = [];
        $methodName2InfoFromOtherModule = [];
        $hooksFile = $this->appDir . "/class-core/Services/Hooks.php";
        if (file_exists($hooksFile)) {
            // collecting method info
            /**
             * Packing methods from the current app file to the target module.
             *
             * Note: the module is allowed to have self built-in code, but it must wrap it with the
             *
             * // mit-start:{ModuleName}
             * // mit-end:{ModuleName}
             *
             * comments braces.
             *
             *
             */
            $cooker = ClassCooker::create()->setFile($hooksFile);

            $methods = $cooker->getMethods(['protected', "static"]);
            foreach ($methods as $method) {

                // get the content of the method
                $content = trim($cooker->getMethodContent($method, false));
                $startComment = '// mit-start' . ':' . $moduleName . '\b';
                $endComment = '// mit-end' . ':' . $moduleName . '\b';
                $pattern = '!' . $startComment . '.*' . $endComment . '!Ums';
                $match = [];
                $moduleRelatedContent = '';
                $hasRelatedContent = false;
                if (preg_match($pattern, $content, $match)) {
                    $moduleRelatedContent = trim($match[0]);
                    $hasRelatedContent = true;
                }

                //--------------------------------------------
                // THIS MODULE'S HOOKS
                //--------------------------------------------
                if (0 === strpos($method, $moduleName . "_")) {
                    $signature = $cooker->getMethodSignature($method);
                    $methodName2InfoFromThisModule[$method] = [$signature, $moduleRelatedContent];
                }
                //--------------------------------------------
                // MODULES TO WHICH THIS MODULE SUBSCRIBES TO
                //--------------------------------------------
                else {
                    if (true === $hasRelatedContent) {
                        $signature = $cooker->getMethodSignature($method);
                        $methodName2InfoFromOtherModule[$method] = [$signature, $moduleRelatedContent];
                    }
                }
            }


            //--------------------------------------------
            // CREATING THE MODULE'S HOOKS FILE
            //--------------------------------------------
            $moduleHooksFile = $this->appDir . "/class-modules/$moduleName/$moduleName" . "Hooks.php";
            HooksClassCreator::createClass($moduleName, $methodName2InfoFromThisModule, $methodName2InfoFromOtherModule, $moduleHooksFile);
        }
    }


    protected function packServices($moduleName)
    {

        /**
         * Basically, reading the Core\Service\X class for services created by the given moduleName,
         * and packing them into the Module\<ModuleName>Services class.
         *
         * Note: this will overwrite the <ModuleName>Services class entirely (i.e. if you plan to use
         * the packer tool, don't put personal code into this <ModuleName>Services class.
         */


        /**
         * info: array
         *      - 0: signature
         *      - 1: built in content
         */
        $methodName2Info = [];
        $servicesFile = $this->appDir . "/class-core/Services/X.php";
        if (file_exists($servicesFile)) {

            // collecting method info
            $cooker = ClassCooker::create()->setFile($servicesFile);

            $methods = $cooker->getMethods(['protected', "static"]);
            foreach ($methods as $method) {

                // get the content of the method
                $content = trim($cooker->getMethodContent($method, false));


                //--------------------------------------------
                // THIS MODULE'S SERVICES
                //--------------------------------------------
                if (0 === strpos($method, $moduleName . "_")) {
                    $signature = $cooker->getMethodSignature($method);
                    $methodName2Info[$method] = [$signature, $content];
                }
            }


            //--------------------------------------------
            // CREATING THE MODULE'S HOOKS FILE
            //--------------------------------------------
            $moduleServicesFile = $this->appDir . "/class-modules/$moduleName/$moduleName" . "Services.php";
            ServicesClassCreator::createClass($moduleName, $methodName2Info, $moduleServicesFile);
        }
    }


    protected function packRoutsyRoutes($moduleName)
    {

        /**
         * Basically, reading the config/routsy files and looking for routes owned by the given module,
         * then packing them into the Module\routsy corresponding file.
         *
         * Note: this will overwrite the existing routsy files in the module dir, you have been warned.
         */
        $appRoutsyDir = $this->appDir . "/config/routsy";
        if (file_exists($appRoutsyDir)) {
            // scan all routes files
            $files = YorgDirScannerTool::getFilesWithExtension($appRoutsyDir, "php");
            foreach ($files as $file) {


                $newRoutesDynamic = [];
                $newRoutesStatic = [];


                $routes = [];
                include $file;


                $lines = file($file);
                $lineSets = RoutsyConfigFileGeneratorHelper::getLineSets($lines);

                foreach ($routes as $id => $route) {

                    // filtering routes of the module
                    if (0 === strpos($id, $moduleName . "_")) {
                        /**
                         * @var LineSetInterface $lineSet
                         */
                        if (array_key_exists($id, $lineSets)) {

                            $lineSet = $lineSets[$id];
                            $routeContent = trim($lineSet->toString());
                            if (true === RoutsyConfigFileGeneratorHelper::isDynamic($route[0])) {
                                $newRoutesDynamic[$id] = $routeContent;
                            } else {
                                $newRoutesStatic[$id] = $routeContent;
                            }
                        } else {
                            throw new KamilleModulePackerException("id $id not found in the found lineStes");
                        }
                    }
                }

                if ($newRoutesStatic || $newRoutesDynamic) {
                    $baseName = basename($file);
                    $f = $this->getModuleDir($moduleName) . "/rousty/" . $baseName;
                    RoutsyFileCreator::createFile($newRoutesStatic, $newRoutesDynamic, $f);
                }
            }
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($msg)
    {
        throw new KamilleModulePackerException($msg);
    }


    private function getModuleDir($moduleName)
    {
        return $this->appDir . "/class-modules/$moduleName";
    }


    private function replaceTags($str, $moduleName)
    {
        return str_replace([
            '{moduleName}',
            '{ModuleName}',
        ], [
            lcfirst($moduleName),
            ucfirst($moduleName),
        ], $str);
    }
}