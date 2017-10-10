<?php


namespace Kamille\Utils\ModuleUtils;


use ApplicationItemManager\ApplicationItemManagerInterface;
use ArrayToString\ArrayToStringTool;
use Authenticate\Util\ProfileMergeTool;
use Bat\FileSystemTool;
use ClassCooker\ClassCooker;
use CopyDir\SimpleCopyDirUtil;
use DirScanner\DirScanner;
use DirScanner\YorgDirScannerTool;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Module\ModuleInterface;
use Kamille\Utils\ModuleInstallationRegister\ModuleInstallationRegister;
use Kamille\Utils\Routsy\RoutsyUtil;
use Kamille\Utils\Routsy\Util\ConfigGenerator\ConfigGenerator;

class ModuleInstallTool
{

    /**
     * @var ConfigGenerator
     */
    private static $routsyGen;

    /**
     * Note: maybe we will change the fact that the first argument is an ApplicationItemManagerInterface object,
     * so don't rely too much on it.
     */
    public static function installWidgets(ApplicationItemManagerInterface $manager, array $widgets)
    {
        foreach ($widgets as $widget) {
            $manager->install($widget);
        }
    }


    public static function installProfiles(ModuleInterface $module)
    {
        $moduleName = self::getModuleName($module);
        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $profileFile = $appDir . "/class-modules/$moduleName/profiles.php";
            if (file_exists($profileFile)) {

                $store = [];
                include $profileFile;
                $storeProfile = $store;

                $target = $appDir . "/store/Authenticate/profiles.php";
                if (file_exists($target)) {
                    $store = [];
                    include $target;
                    $storeProfile = ProfileMergeTool::merge($storeProfile, $store);
                }


                $c = ArrayToStringTool::toPhpArray($storeProfile);
                FileSystemTool::mkfile($target, "<?php\n\n" . '$store = ' . $c . ";\n\n");
            }
        }
    }


    public static function uninstallProfiles(ModuleInterface $module)
    {
        $moduleName = self::getModuleName($module);
        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $profileFile = $appDir . "/class-modules/$moduleName/profiles.php";
            if (file_exists($profileFile)) {

                $store = [];
                include $profileFile;
                $storeProfile = $store;

                $target = $appDir . "/store/Authenticate/profiles.php";
                if (file_exists($target)) {
                    $store = [];
                    include $target;

                    foreach ($store['profiles'] as $k => $profile) {
                        foreach ($profile as $j => $v) {
                            if ('groups' === $j) {
                                foreach ($profile['groups'] as $l => $w) {
                                    if (0 === strpos($w, $moduleName)) {
                                        unset($store['profiles'][$k]['groups'][$l]);
                                    }
                                }
                            } elseif (0 === strpos($v, $moduleName)) {
                                unset($store['profiles'][$k][$j]);
                            }
                        }
                    }

                    foreach ($store['groups'] as $k => $v) {
                        if (0 === strpos($k, $moduleName)) {
                            unset($store['groups'][$k]);
                        }
                    }
                }
                $c = ArrayToStringTool::toPhpArray($store);
                FileSystemTool::mkfile($target, "<?php\n\n" . '$store = ' . $c . ";\n\n");
            }
        }
    }


    public static function installConfig(ModuleInterface $module, $replaceMode = true)
    {
        $moduleName = self::getModuleName($module);


        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $configFile = $appDir . "/class-modules/$moduleName/conf.php";
            if (file_exists($configFile)) {
                $target = $appDir . "/config/modules/$moduleName.conf.php";
                if (true === $replaceMode || false === file_exists($target)) {
                    FileSystemTool::copyFile($configFile, $target);
//                    copy($configFile, $target);
                }
            }
        }
    }

    public static function uninstallConfig(ModuleInterface $module, $replaceMode = true)
    {
        $moduleName = self::getModuleName($module);
        $appDir = ApplicationParameters::get('app_dir');
        $target = $appDir . "/config/modules/$moduleName.conf.php";
        if (is_file($target)) {
            unlink($target);
        }
    }

    public static function installRoutsy(ModuleInterface $module)
    {
        $moduleName = self::getModuleName($module);
        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $modulesDir = $appDir . "/class-modules";
            $appConf = RoutsyUtil::getRoutsyDir();
            $gen = self::getRoutsyGen($appConf, $modulesDir);
            $gen->registerModule($moduleName);
        }
    }

    public static function uninstallRoutsy(ModuleInterface $module)
    {
        $moduleName = self::getModuleName($module);
        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $modulesDir = $appDir . "/class-modules";
            $appConf = RoutsyUtil::getRoutsyDir();
            $gen = self::getRoutsyGen($appConf, $modulesDir);
            $gen->unregisterModule($moduleName);
        }
    }


    /**
     * The idea is to help a module copy its files to the target application.
     * The module must have a directory named "files" at its root, which contains
     * an app directory (i.e. files/app at the root of the module directory).
     *
     *
     * Usage:
     * ---------
     * From your module install code:
     * ModuleInstallTool::installFiles($this);
     *
     *
     * Note: this code assumes that a files step is created.
     *
     */
    public static function installFiles(ModuleInterface $module, $replaceMode = true)
    {

        $moduleName = self::getModuleName($module);

        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $sourceAppDir = $appDir . "/class-modules/$moduleName/files/app";
            if (file_exists($sourceAppDir)) {
                $o = SimpleCopyDirUtil::create();
                $o->setReplaceMode($replaceMode);
                $ret = $o->copyDir($sourceAppDir, $appDir);
                $errors = $o->getErrors();
            }
        }

    }


    public static function uninstallFiles(ModuleInterface $module, $replaceMode = true)
    {

        $moduleName = self::getModuleName($module);


        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $sourceAppDir = $appDir . "/class-modules/$moduleName/files/app";
            if (file_exists($sourceAppDir)) {
                DirScanner::create()->scanDir($sourceAppDir, function ($path, $rPath, $level) use ($appDir) {
                    $targetEntry = $appDir . "/" . $rPath;
                    /**
                     * For now we don't follow symlinks.
                     * We also don't delete directories, because we could potentially
                     * remove important app directories.
                     * Maybe this technique will be fine-tuned as time goes by.
                     *
                     */
                    if (
                        file_exists($targetEntry) &&
                        !is_link($targetEntry) &&
                        !is_dir($targetEntry)
                    ) {
                        FileSystemTool::remove($targetEntry);
                    }
                });
            }
        }

    }


    public static function bindModuleServices($moduleServicesClassName)
    {
        $moduleFile = self::getModuleFile($moduleServicesClassName);
        $xContainerFile = self::getXContainerFile();

        /**
         * Adding all methods from the ModuleServices class
         * to the X container, if they don't exist
         *
         * Note: methods from the ModuleServices class have to be
         * protected static.
         */

        $moduleCooker = ClassCooker::create()->setFile($moduleFile);
        $moduleMethods = $moduleCooker->getMethods(["protected", "static"]);

        $xCooker = ClassCooker::create()->setFile($xContainerFile);
        $xMethods = $xCooker->getMethods(["public", "static"]);
        $xMethods = array_reverse($xMethods);


        foreach ($moduleMethods as $method) {
            if (false === array_key_exists($method, $xMethods)) {
                // if it doesn't exist in the X class, we add it
                $methodContent = $moduleCooker->getMethodContent($method);

                // however, we change the visibility from protected to public
//                $methodContent = preg_replace('!protected!i', 'public', $methodContent, 1);

                $xCooker->addMethod($method, $methodContent);
            } else {
                // for now, if it doesn't exist, then
                // we don't update it (that might change)
            }
        }
    }


    public static function unbindModuleServices($candidateModule)
    {
        /**
         * remove all methods from the X container
         * that come from the candidate module
         */
        $moduleFile = self::getModuleFile($candidateModule);
        $xContainerFile = self::getXContainerFile();
        $moduleCooker = ClassCooker::create()->setFile($moduleFile);

        $moduleMethods = $moduleCooker->getMethods(["protected", "static"]);

        $xCooker = ClassCooker::create()->setFile($xContainerFile);
        foreach ($moduleMethods as $method) {
            $xCooker->removeMethod($method);
        }

    }


    public static function bindModuleHooks($candidateModule)
    {

        /**
         * The strategy here is that hook method which name starts with the module name is a provider method,
         * and other methods are subscriber methods.
         * So for instance for the Core module, one could find the following methods in the CoreHooks class:
         *
         * - Core_hook1
         * - Core_hook2
         * - OtherModule_doSomething
         * - OtherModule2_doSomethingElse
         *
         * The first two methods are provider methods,
         * and the last two methods are subscriber methods to the OtherModule and OtherModule2 modules respectively.
         *
         *
         *
         */
        $moduleFile = self::getModuleFile($candidateModule);

        $moduleCooker = ClassCooker::create()->setFile($moduleFile);
        $moduleMethods = $moduleCooker->getMethods(["protected", "static"]);

        $xHooksFile = self::getHooksFile();
        $hookCooker = ClassCooker::create()->setFile($xHooksFile);

        $p = explode('\\', $candidateModule); // Module is the first component
        $module = $p[1];


        // list all modules methods and distribute them into providers and subscribers
        $providerMethods = [];
        $subscriberMethods = [];
        foreach ($moduleMethods as $method) {
            $p = explode('_', $method, 2);
            $moduleName = $p[0];
            if ($module === $moduleName) {
                $providerMethods[] = $method;
            } else {
                $subscriberMethods[$moduleName][] = $method;
            }
        }


        $hookMethods = $hookCooker->getMethods(['protected', 'static']);
        $hookMethods = array_reverse($hookMethods);


        // installed modules
        $installed = ModuleInstallationRegister::getInstalled();

        //--------------------------------------------
        // FIRST, CREATE THE PROVIDERS AND BIND OTHER MODULES TO IT
        //--------------------------------------------
        foreach ($providerMethods as $method) {


            if (false === array_key_exists($method, $hookMethods)) {

                $signature = $moduleCooker->getMethodSignature($method);
                $currentInnerContent = trim($moduleCooker->getMethodContent($method, false));


                // do other modules want to subscribe to it?
                $innerContents = [];
                foreach ($installed as $mod) {

                    if ($module === $mod) {
                        continue;
                    }


                    $modFile = self::getModuleHooksFileByModuleName($mod);
                    if (file_exists($modFile)) {

                        $modCooker = ClassCooker::create()->setFile($modFile);
                        $modMethods = $modCooker->getMethods(["protected", "static"]);

                        foreach ($modMethods as $m) {
                            if ($m === $method) {

                                $innerContent = trim($modCooker->getMethodContent($m, false));
                                if ('' !== trim($innerContent)) {

                                    $startComment = self::getHookComment($mod, "start");
                                    $endComment = self::getHookComment($mod, "end");
                                    $innerContent = "\t\t" . $startComment . "\t\t" . $innerContent . PHP_EOL . "\t\t" . trim($endComment) . PHP_EOL;
                                    $innerContents[] = $innerContent;
                                }
                            }
                        }
                    }
                }

                if ("" !== $currentInnerContent) {
                    $newInnerContent = "\t\t" . $currentInnerContent . PHP_EOL;
                } else {
                    $newInnerContent = "";
                }
                $newInnerContent .= implode(PHP_EOL, $innerContents);
                $methodContent = "\t" . $signature . PHP_EOL . "\t{" . PHP_EOL . $newInnerContent . "\t}" . PHP_EOL;
                $hookCooker->addMethod($method, $methodContent);


            } else {
                /**
                 * If the provider already exist, we do nothing,
                 * we assume it has already been properly treated.
                 */
            }

        }


        //--------------------------------------------
        // BIND SUBSCRIBERS OF THIS MODULE TO OTHER MODULES' PROVIDERS
        //--------------------------------------------
        foreach ($installed as $mod) {
            if (array_key_exists($mod, $subscriberMethods)) {
                $methods = $subscriberMethods[$mod];
                foreach ($methods as $method) {


                    if (false !== ($innerContent = $moduleCooker->getMethodContent($method, false))) {

                        $targetInnerContent = $hookCooker->getMethodContent($method, false);

                        // does the target hook class already contain the hook?
                        $startComment = self::getHookComment($module, "start");


                        if (false === strpos($targetInnerContent, $startComment)) { // if not, we add the hook

                            $targetInnerContent = trim($targetInnerContent);

                            $endComment = self::getHookComment($module, "end");
                            $innerContent = "\t\t" . $startComment . "\t\t" . trim($innerContent) . PHP_EOL . "\t\t" . $endComment;
                            $targetInnerContent .= PHP_EOL . PHP_EOL . $innerContent;
                            $targetInnerContent = "\t\t" . $targetInnerContent;

                            $hookCooker->updateMethodContent($method, function ($v) use ($targetInnerContent) {
                                return $targetInnerContent;
                            });
                        }
                    }
                }
            }
        }
    }

    public static function unbindModuleHooks($candidateModule)
    {


        $p = explode('\\', $candidateModule); // Module is the first component
        $module = $p[1];


        $moduleFile = self::getModuleFile($candidateModule);
        $moduleCooker = ClassCooker::create()->setFile($moduleFile);
        $moduleMethods = $moduleCooker->getMethods(["protected", "static"]);


        $xHooksFile = self::getHooksFile();
        $hookCooker = ClassCooker::create()->setFile($xHooksFile);
        $hookMethods = $hookCooker->getMethods(["protected", 'static']);


        // parse all methods of the hook class, and remove this module code by matching of comments
        foreach ($hookMethods as $method) {
            // parsing a foreign module's method?
            if (0 !== strpos($method, $module . "_")) {


                $innerContent = $hookCooker->getMethodContent($method, false);

                // does the target hook class already contain the hook?
                $startComment = self::getHookComment($module, "start");
                $startComment = trim($startComment);

                if (false !== strpos($innerContent, $startComment)) {

                    $endComment = self::getHookComment($module, "end");
                    $endComment = trim($endComment);

                    $hookCooker->updateMethodContent($method, function ($content) use ($startComment, $endComment) {

                        $pattern = '!' . $startComment . '.*' . $endComment . '!Ums';
                        $innerContent = preg_replace($pattern, '', $content);
                        $innerContent = "\t\t" . trim($innerContent); // remove spacing left by the removal of the module's snippet
                        return $innerContent . PHP_EOL; // add a last phpeol to have the final wrapping } of the method on the next line
                    });
                }

            }
        }


        // remove provider methods
        foreach ($hookMethods as $method) {
            if (0 === strpos($method, $module . "_")) {
                $hookCooker->removeMethod($method);
            }
        }
    }

    public static function installControllers($moduleName)
    {
        $appDir = ApplicationParameters::get("app_dir");
        $controllersDir = $appDir . "/class-modules/$moduleName/Controller";
        if (is_dir($controllersDir)) {
            $files = YorgDirScannerTool::getFilesWithExtension($controllersDir, "php", false, true, true);
            foreach ($files as $f) {
                $file = $controllersDir . "/$f";
                if ('Controller.php' === substr($file, -14)) {
                    $c = file_get_contents($file);

                    /**
                     * non safe namespace replacing technique, but should work 98% of the time,
                     * good for now...
                     */
                    $newNamespace = "namespace Controller\\$moduleName;";
                    $c = preg_replace('!namespace .*;!', $newNamespace, $c, 1);
                    $targetFile = $appDir . "/class-controllers/$moduleName/$f";
                    FileSystemTool::mkfile($targetFile, $c);
                }
            }
        }
    }


    /**
     * I believe you don't want to remove userland code,
     * otherwise some users might get VERY upset!
     */
//    public static function uninstallControllers($moduleName)
//    {
//        $appDir = ApplicationParameters::get("app_dir");
//        $controllersDir = $appDir . "/class-controller/$moduleName";
//        if (is_dir($controllersDir)) {
//            FileSystemTool::remove($controllersDir);
//        }
//    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getHookComment($module, $type = "start")
    {
        return '// mit-' . $type . ':' . $module . PHP_EOL;
    }


    private static function getModuleName(ModuleInterface $module)
    {
        $moduleClassName = get_class($module);
        $p = explode('\\', $moduleClassName);
        array_shift($p); // drop Module prefix
        return $p[0];
    }

    private static function getModuleFile($moduleServicesClassName)
    {
        $appDir = ApplicationParameters::get("app_dir");
        $p = explode('\\', $moduleServicesClassName);
        array_shift($p); // drop Module prefix
        return $appDir . "/class-modules/" . implode('/', $p) . '.php';
    }

    private static function getModuleServicesFileByModuleName($moduleName)
    {
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-modules/$moduleName/$moduleName" . 'Services.php';
    }

    private static function getModuleHooksFileByModuleName($moduleName)
    {
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-modules/$moduleName/$moduleName" . 'Hooks.php';
    }

    private static function getXContainerFile()
    {
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-core/Services/X.php";
    }

    private static function getHooksFile()
    {
        $appDir = ApplicationParameters::get("app_dir");
        return $appDir . "/class-core/Services/Hooks.php";
    }

    private static function getRoutsyGen($confDir, $modulesDir)
    {
        if (null === self::$routsyGen) {
            self::$routsyGen = ConfigGenerator::create()
                ->setConfDir($confDir)
                ->setModulesTargetDir($modulesDir);
        }
        return self::$routsyGen;
    }
}