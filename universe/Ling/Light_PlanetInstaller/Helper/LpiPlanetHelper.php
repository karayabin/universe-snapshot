<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Ling\UniverseTools\PlanetTool;

/**
 * The LpiPlanetHelper class.
 */
class LpiPlanetHelper
{


    /**
     * Returns an array of planetDot => version of the planets in the given universe dir.
     *
     * @param string $universeDir
     * @return array
     */
    public static function getPlanetsVersionsByUniverseDir(string $universeDir): array
    {
        $ret = [];
        $planetDirs = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planetDirs as $planetDir) {
            $version = PlanetTool::getVersionByPlanetDir($planetDir);
            list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            $ret[$galaxy . "." . $planet] = $version;
        }
        return $ret;
    }
}