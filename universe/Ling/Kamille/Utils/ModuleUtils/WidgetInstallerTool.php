<?php


namespace Ling\Kamille\Utils\ModuleUtils;


use Ling\Bat\FileSystemTool;
use Ling\CopyDir\SimpleCopyDirUtil;
use Ling\DirScanner\DirScanner;
use Ling\Kamille\Architecture\ApplicationParameters\ApplicationParameters;
use Ling\Kamille\Mvc\WidgetInstaller\WidgetInstallerInterface;
use Ling\Kamille\Utils\StepTracker\StepTrackerAwareInterface;

class WidgetInstallerTool
{


    /**
     * The idea is to help a widget copy its files to the target application.
     * The widget must have a directory named "files" at its root, which contains
     * an app directory (i.e. files/app at the root of the widget directory).
     *
     *
     * Usage:
     * ---------
     * From your widget install code:
     * WidgetInstallerTool::installFiles($this);
     *
     *
     * Note: this code assumes that a files step is created.
     *
     */
    public static function installFiles(WidgetInstallerInterface $widget, $replaceMode = true)
    {

        $widgetClassName = get_class($widget);
        $p = explode('\\', $widgetClassName);
        array_shift($p); // drop Widget prefix
        $widgetName = $p[0];


        if ($widget instanceof StepTrackerAwareInterface) {
            $widget->getStepTracker()->startStep('files');
        }


        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $sourceAppDir = $appDir . "/class-widgets/$widgetName/files/app";
            if (file_exists($sourceAppDir)) {
                $o = SimpleCopyDirUtil::create();
                $o->setReplaceMode($replaceMode);
                $ret = $o->copyDir($sourceAppDir, $appDir);
                $errors = $o->getErrors();
            }
        }

        if ($widget instanceof StepTrackerAwareInterface) {
            $widget->getStepTracker()->stopStep('files');
        }
    }


    public static function uninstallFiles(WidgetInstallerInterface $widget, $replaceMode = true)
    {

        $widgetClassName = get_class($widget);
        $p = explode('\\', $widgetClassName);
        array_shift($p); // drop Widget prefix
        $widgetName = $p[0];


        if ($widget instanceof StepTrackerAwareInterface) {
            $widget->getStepTracker()->startStep('files');
        }


        $appDir = ApplicationParameters::get('app_dir');
        if (is_dir($appDir)) {
            $sourceAppDir = $appDir . "/class-widgets/$widgetName/files/app";
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

        if ($widget instanceof StepTrackerAwareInterface) {
            $widget->getStepTracker()->stopStep('files');
        }
    }
}