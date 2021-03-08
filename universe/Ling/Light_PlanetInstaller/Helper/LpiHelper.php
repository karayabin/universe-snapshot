<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\Bat\FileSystemTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiHelper class.
 */
class LpiHelper
{


    /**
     * Create a global dir planet for every planets listed in the given universe dir.
     * The location of the global dir is the one defined in the global configuration.
     *
     * See the conception notes for more details.
     *
     *
     * @param string $universeDir
     * @param bool $debug
     */
    public static function createGlobalDirByUniverseDir(string $universeDir, bool $debug = false)
    {
        $globalDir = LpiConfHelper::getGlobalDirPath();
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            $p = explode("/", $planetDir);
            $planet = array_pop($p);
            $galaxy = array_pop($p);


            if (true === $debug) {
                echo $planet . PHP_EOL;
            }


            $version = MetaInfoTool::getVersion($planetDir);
            $newPlanetDir = $globalDir . "/$galaxy/$planet/$version";
            FileSystemTool::copyDir($planetDir, $newPlanetDir);
        }
    }


    /**
     * Creates a list of planetDot names out of the given uni dependencies.
     *
     *
     * @param array $uniDependencies
     * @return array
     */
    public static function uniDependenciesToPlanetDotList(array $uniDependencies): array
    {
        $ret = [];
        foreach ($uniDependencies as $item) {
            list($galaxyId, $packageImportName) = $item;
            // assuming for now that all packageImportNames are planet names (i.e. not urls).
            $ret[] = $galaxyId . "." . $packageImportName;
        }
        return $ret;
    }
}