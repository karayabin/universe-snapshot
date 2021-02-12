<?php


namespace Ling\LingTalfi\Util;

use Ling\Bat\ConvertTool;
use Ling\Bat\FileSystemTool;
use Ling\Bat\ZipTool;
use Ling\LingTalfi\Exception\LingTalfiException;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The AppBoilerplateUtil class.
 */
class AppBoilerplateUtil
{

    public function upgradeBoilerplate()
    {

        $dir = FileSystemTool::mkTmpDir();


        FileSystemTool::mkdir($dir);


        //--------------------------------------------
        // BASIC FILES
        //--------------------------------------------
        $boilerplateDir = __DIR__ . "/../assets/light-app-boilerplate";
        $otherFiles = [
            "config/services/_zzz.byml",
            "universe/bigbang.php",
            "www/index.php",
        ];
        foreach ($otherFiles as $rpath) {
            $file = $boilerplateDir . "/$rpath";
            $dst = $dir . "/$rpath";
            FileSystemTool::copyFile($file, $dst);
        }


        //--------------------------------------------
        // PLANETS
        //--------------------------------------------
        $uniDir = "/myphp/universe";
        $planets = [
            "Ling.BumbleBee",
            "Ling.Light_Cli",
            "Ling.Light_PlanetInstaller",
        ];
        $errors = [];
        $deps = DependencyTool::getDependencyListRecursiveByUniverseDirPlanets($uniDir, $planets, true, $errors, [
            "recursive" => true,
        ]);


        if ($errors) {
            throw new LingTalfiException("Some errors occurred while collecting dependencies: " . implode(PHP_EOL, $errors));
        }


        if ($deps) {

            $nbDeps = count($deps);

            $c = 1;
            foreach ($deps as $pDotName) {

                $pSlashName = PlanetTool::getPlanetSlashNameByDotName($pDotName);
                $planetDir = $uniDir . "/" . $pSlashName;
                $sizeHuman = ConvertTool::convertBytes(FileSystemTool::getDirectorySize($planetDir), 'h');


                echo "Processing planet $pDotName ($c/$nbDeps) ($sizeHuman)<br>";
                flush();

                if (true === is_dir($planetDir)) {
                    PlanetTool::importPlanetByExternalDir($pDotName, $planetDir, $dir, [
                        "assets" => true,
                    ]);
                } else {
                    throw new LingTalfiException("Planet dir not found: $planetDir.");
                }
                $c++;
            }
        }


        //--------------------------------------------
        // CREATE ZIP ARCHIVE
        //--------------------------------------------

        echo "Creating zip archive...<br>";
        flush();


        $zipFile = $dir . ".zip";
        ZipTool::zip($dir, $zipFile, [
            "ignoreName" => [
                ".git",
                ".gitignore",
            ]
        ]);
        FileSystemTool::remove($dir);


        $zipFileDst = $uniDir . "/Ling/Light_AppBoilerplate/assets/light-app-boilerplate.zip";
        echo "moving zip file to $zipFileDst.";
        FileSystemTool::move($zipFile, $zipFileDst);


    }
}

