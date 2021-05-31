<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Exception;
use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiGlobalDirHelper class.
 */
class LpiGlobalDirHelper
{


    /**
     * Returns the version numbers available for the given planet (in the global dir repo), sorted by increasing value.
     *
     *
     * @param string $planetDot
     * @return array
     * @throws Exception
     */
    public static function getPlanetVersions(string $planetDot): array
    {
        $ret = [];
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $dir = LpiConfHelper::getGlobalDirPath();
        $planetDir = $dir . "/$galaxy/$planet";
        if (is_dir($planetDir)) {
            $planetDirs = YorgDirScannerTool::getDirs($planetDir);
            foreach ($planetDirs as $planetDir) {
                $version = basename($planetDir);
                $ret[] = $version;
            }
        }
        natsort($ret);
        return $ret;
    }


    /**
     * Copies the planetDir to the global dir.
     *
     * @param string $galaxy
     * @param string $planet
     * @param string $realVersion
     * @param string $planetDir
     */
    public static function copyToGlobalDir(string $galaxy, string $planet, string $realVersion, string $planetDir)
    {
        $path = self::getPlanetPath($galaxy, $planet, $realVersion);
        FileSystemTool::copyDir($planetDir, $path);
    }

    /**
     * Returns whether the global directory contains the planet identified by the given $planetDot, in the specified $realVersion.
     *
     * @param string $planetDot
     * @param string $realVersion
     * @return bool
     */
    public static function globalDirHasPlanet(string $planetDot, string $realVersion): bool
    {
        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDot);
        $dir = self::getPlanetPath($galaxy, $planet, $realVersion);
        return is_dir($dir);
    }


    /**
     * Returns the path to the planet in the global directory.
     *
     * @param string $galaxy
     * @param $planet
     * @param $realVersion
     * @return string
     */
    public static function getPlanetPath(string $galaxy, $planet, $realVersion): string
    {
        return LpiConfHelper::getGlobalDirPath() . "/$galaxy/$planet/$realVersion";
    }

}