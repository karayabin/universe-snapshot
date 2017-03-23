<?php


namespace KaminosUtils\ModuleUtils;


use CopyDir\SimpleCopyDirUtil;
use Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Kamille\Module\ModuleInterface;
use Kamille\Utils\StepTracker\StepTrackerAwareInterface;

class ModuleInstallTool
{


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

        $moduleClassName = get_class($module);
        $p = explode('\\', $moduleClassName);
        $moduleName = $p[0];


        if ($module instanceof StepTrackerAwareInterface) {
            $module->getStepTracker()->startStep('files');
        }


        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $sourceAppDir = $appDir . "/class-modules/$moduleName/_files/app";
            if (file_exists($sourceAppDir)) {
                $o = SimpleCopyDirUtil::create();
                $o->setReplaceMode($replaceMode);
                $ret = $o->copyDir($sourceAppDir, $appDir);
                $errors = $o->getErrors();
            }
        }

        if ($module instanceof StepTrackerAwareInterface) {
            $module->getStepTracker()->stopStep('files');
        }
    }


//    public static function uninstallFiles(ModuleInterface $module)
//    {
//
//        $moduleClassName = get_class($module);
//        $p = explode('\\', $moduleClassName);
//        $moduleName = $p[0];
//
//
//        if ($module instanceof StepTrackerAwareInterface) {
//            $module->getStepTracker()->startStep('files');
//        }
//
//
//        $appDir = ApplicationParameters::get('app_dir');
//        if (is_dir($appDir)) {
//            $sourceAppDir = $appDir . "/class-modules/$moduleName/_files/app";
//            if (file_exists($sourceAppDir)) {
//                $o = SimpleCopyDirUtil::create();
//                $o->setReplaceMode($replaceMode);
//                $ret = $o->copyDir($sourceAppDir, $appDir);
//                $errors = $o->getErrors();
//            }
//        }
//
//        if ($module instanceof StepTrackerAwareInterface) {
//            $module->getStepTracker()->stopStep('files');
//        }
//    }
}