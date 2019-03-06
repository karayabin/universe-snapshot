<?php


namespace Ling\KamillePacker\ModulePacker;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\KamillePacker\Packer\AbstractPacker;

class ModulePacker extends AbstractPacker
{


    protected function specificPack($name, $appDir, $updateMode, $itemTargetDir)
    {
        //--------------------------------------------
        // CONF FILE
        //--------------------------------------------
        $appConfFile = "$appDir/config/modules/$name.conf.php";
        if (file_exists($appConfFile)) {
            $itemConfFile = "$itemTargetDir/conf.php";
            copy($appConfFile, $itemConfFile);
        }

        //--------------------------------------------
        // CONTROLLERS
        //--------------------------------------------
        $appControllersDir = "$appDir/class-controllers/$name";
        if (is_dir($appControllersDir)) {
            $appControllers = YorgDirScannerTool::getFilesWithExtension($appControllersDir, "php", false, true, true);
            if (count($appControllers) > 0) {
                $itemControllerDir = "$itemTargetDir/Controller";
                foreach ($appControllers as $appController) {
                    $appControllerPath = $appControllersDir . "/" . $appController;
                    $itemController = $itemControllerDir . "/" . $appController;
                    FileSystemTool::mkfile($itemController, file_get_contents($appControllerPath));
                }
            }
        }


        //--------------------------------------------
        // FILES BACKWARD MODE (from app to item)
        //--------------------------------------------
        // lang
        $langDir = $appDir . "/lang";
        $dirs = YorgDirScannerTool::getDirs($langDir, false, true);
        foreach ($dirs as $lang) {
            $ctrlDir = $langDir . "/" . $lang . "/controllers/$name";
            if (is_dir($ctrlDir)) {
                $itemDir = $itemTargetDir . "/files/app/lang/$lang/controllers/$name";
                FileSystemTool::copyDir($ctrlDir, $itemDir);
            }
        }


        // laws
        $appLawsDir = $appDir . "/config/laws/$name";
        if (is_dir($appLawsDir)) {
            $itemLawsDir = $itemTargetDir . "/files/app/config/laws/$name";
            FileSystemTool::copyDir($appLawsDir, $itemLawsDir);
        }

        // dataTable profiles
        $appSrc = $appDir . "/config/datatable-profiles/$name";
        if (is_dir($appSrc)) {
            $itemTarget = $itemTargetDir . "/files/app/config/datatable-profiles/$name";
            FileSystemTool::copyDir($appSrc, $itemTarget);
        }

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getTargetDir($appDir)
    {
        return $appDir . "/class-modules";
    }

    protected function getReadmeTemplatePath()
    {
        return __DIR__ . "/assets/README.tpl.md";
    }

    protected function getInstallerTemplatePath()
    {
        return __DIR__ . "/assets/InstallerClass.tpl.php";
    }

    protected function getInstallerClassTargetRelativePath($name)
    {
        return $name . "Module.php";
    }
}