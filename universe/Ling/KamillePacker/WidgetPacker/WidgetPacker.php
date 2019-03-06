<?php


namespace Ling\KamillePacker\WidgetPacker;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\KamillePacker\Packer\AbstractPacker;

class WidgetPacker extends AbstractPacker
{


    protected function specificPack($name, $appDir, $updateMode, $itemTargetDir)
    {
        //--------------------------------------------
        // FILES
        //--------------------------------------------
        $entriesToPack = $this->getEntriesToPack($appDir, $name);
        $lenAppDir = mb_strlen($appDir);
        foreach ($entriesToPack as $path) {

            if (false === $updateMode && file_exists($path)) {
                continue;
            }

            $relPath = substr($path, $lenAppDir);
            $targetEntry = $itemTargetDir . "/files/app" . $relPath;
            $c = file_get_contents($path);
            FileSystemTool::mkfile($targetEntry, $c);
        }


        //--------------------------------------------
        // FILES BACKWARD MODE (from app to item)
        //--------------------------------------------
        // lang
        $langDir = $appDir . "/lang";
        $dirs = YorgDirScannerTool::getDirs($langDir, false, true);
        foreach ($dirs as $lang) {
            $widgetDir = $langDir . "/" . $lang . "/widgets/$name";
            if (is_dir($widgetDir)) {
                $itemDir = $itemTargetDir . "/files/app/lang/$lang/widgets/$name";
                FileSystemTool::copyDir($widgetDir, $itemDir);
            }
        }


    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function getTargetDir($appDir)
    {
        return $appDir . "/class-widgets";
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
        return $name . "WidgetInstaller.php";
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * returns locations of entries to pack
     */
    private function getEntriesToPack($appDir, $name)
    {
        // override this per implementation
        // here I'm doing the Widget implementation

//        $name = lcfirst($name);
        $ret = [];

        $laws2CssFile = $appDir . "/www/theme/_default_/widgets/$name/$name.default.css";
        $tplFile = $appDir . "/theme/_default_/widgets/$name/default.tpl.php";
        if (file_exists($laws2CssFile)) {
            $ret[] = $laws2CssFile;
        }
        if (file_exists($tplFile)) {
            $ret[] = $tplFile;
        }

        return $ret;
    }
}