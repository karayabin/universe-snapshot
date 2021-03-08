<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiLocalUniverseHelper class.
 */
class LpiLocalUniverseHelper
{

    /**
     * Returns whether the local universe contains the given planet.
     *
     * @param string $planetDot
     * @return bool
     */
    public static function hasPlanet(string $planetDot): bool
    {
        if (null !== ($localPath = self::getLocalUniversePath())) {
            $pSlash = PlanetTool::getPlanetSlashNameByDotName($planetDot);
            return is_dir($localPath . "/$pSlash");
        }
        return false;
    }

    /**
     * Returns the given planet's path, or null if it doesn't exist.
     *
     * @param string $planetDot
     * @return string|null
     */
    public static function getPlanetPath(string $planetDot): ?string
    {
        if (null !== ($localPath = self::getLocalUniversePath())) {
            $pSlash = PlanetTool::getPlanetSlashNameByDotName($planetDot);
            $pDir = $localPath . "/$pSlash";
            if (true === is_dir($pDir)) {
                return $pDir;
            }
        }
        return null;
    }


    /**
     * Returns the current version of the given planet from the local universe.
     * Throws an exception if the planet doesn't exist.
     *
     * @param string $planetDot
     * @return string
     * @throws \Exception
     */
    public static function getVersion(string $planetDot): string
    {
        if (null !== ($localPath = self::getLocalUniversePath())) {
            $pSlash = PlanetTool::getPlanetSlashNameByDotName($planetDot);
            $planetDir = $localPath . "/$pSlash";
            if (true === is_dir($planetDir)) {
                $version = PlanetTool::getVersionByPlanetDir($planetDir);
                if (null === $version) {
                    throw new LightPlanetInstallerException("Cannot get the version for existing planet $planetDot in the local universe.");
                }
                return $version;
            }
        }
        throw new LightPlanetInstallerException("Planet not found in local universe: $planetDot.");
    }


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the path to the local universe dir if it exists, or null otherwise.
     * @return string|null
     */
    private static function getLocalUniversePath(): ?string
    {
        $uniDir = LocalUniverseTool::getLocalUniversePath();
        if (true === is_dir($uniDir)) {
            return $uniDir;
        }
        return null;
    }
}