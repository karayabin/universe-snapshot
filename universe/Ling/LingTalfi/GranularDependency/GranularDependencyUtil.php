<?php


namespace Ling\LingTalfi\GranularDependency;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_PlanetInstaller\Helper\LpiConfHelper;
use Ling\UniverseTools\PlanetTool;

/**
 * The GranularDependencyUtil class.
 */
class GranularDependencyUtil
{


    /**
     * Creates the Light_PlanetInstaller master lpi file at $rootDir/lpi-master.byml.
     *
     * See the @page(Light_PlanetInstaller conception notes) for more details.
     *
     * Feeds the $errors array when an error is triggered.
     *
     *
     * @param string $universeDir
     * @param array $errors
     */
    public static function createMasterDependencyFileByUniverseDir(string $universeDir, array &$errors = [])
    {
        $dst = LpiConfHelper::getMasterFilePath();
        $errors = [];
        $s = self::getMasterDependencyFileContentByUniverseDir($universeDir, $errors);
        FileSystemTool::mkfile($dst, $s);
    }


    /**
     * Creates the master dependency file content for the given universe directory and returns it.
     *
     * Feeds the errors array with errors that might happen.
     *
     *
     * @param string $universeDir
     * @param array $errors
     * @return string
     */
    public static function getMasterDependencyFileContentByUniverseDir(string $universeDir, array &$errors = []): string
    {
        $i4 = str_repeat(' ', 4);
        $s = '';
        $s .= 'dependencies:' . PHP_EOL;


        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            $planetDot = $galaxy . "." . $planet;
            $depsFile = $planetDir . "/lpi-deps.byml";
            if (false === file_exists($depsFile)) {
                $errors[] = "Planet $planetDot: no lpi-deps.byml file found, skipping";
                continue;
            }
            $deps = BabyYamlUtil::readFile($depsFile);
            $s .= $i4 . $planetDot . ':';
            if ($deps) {
                $s .= PHP_EOL;
                foreach ($deps as $version => $planetDeps) {
                    $s .= $i4 . $i4 . $version . ":";
                    if ($planetDeps) {
                        $s .= PHP_EOL;
                        foreach ($planetDeps as $planetDep) {
                            $s .= $i4 . $i4 . $i4 . "- " . $planetDep . PHP_EOL;
                        }
                    } else {
                        $s .= ' []' . PHP_EOL;
                    }
                }
            } else {
                $s .= ' []' . PHP_EOL;
            }

        }
        return $s;
    }

}