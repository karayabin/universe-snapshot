<?php


namespace Ling\Light\Helper;


use Ling\Bat\FileSystemTool;

/**
 * The LightServiceHelper class.
 */
class LightServiceHelper
{

    /**
     * Returns the status of a service for a given app and planetDotName.
     * The return is an int, it can be one of:
     * - 0: not existing (or unrecognized)
     * - 1: enabled
     * - 2: disabled
     *
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return int
     */
    public static function getServiceStatusByPlanetDotName(string $appDir, string $planetDotName): int
    {
        $file = self::getServiceFileByPlanetDotName($appDir, $planetDotName);
        if (true === file_exists($file)) {
            return 1;
        }
        $file .= ".dis";
        if (true === file_exists($file)) {
            return 2;
        }
        return 0;
    }


    /**
     * Returns the service file for a given planet.
     *
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return string
     */
    public static function getServiceFileByPlanetDotName(string $appDir, string $planetDotName): string
    {
        return $appDir . "/config/services/$planetDotName.byml";
    }

    /**
     * Disables the service file for the given planet, and returns an int.
     * The int is:
     *
     * - 0: if the service file doesn't exist (in which case it cannot be disabled)
     * - 1: if the service file existed and has been successfully disabled
     *
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return int
     */
    public static function disableServiceByPlanetDotName(string $appDir, string $planetDotName): int
    {
        $file = self::getServiceFileByPlanetDotName($appDir, $planetDotName);
        if (true === file_exists($file)) {
            $dst = $file . ".dis";
            FileSystemTool::rename($file, $dst);
            return 1;
        }
        return 0;
    }


    /**
     * Enables the service file for the given planet, and returns an int.
     * The int is:
     *
     * - 0: if the disabled service file doesn't exist (in which case it cannot be enabled)
     * - 1: if the disabled service file existed and has been successfully enabled
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return int
     */
    public static function enableServiceByPlanetDotName(string $appDir, string $planetDotName): int
    {
        $file = self::getServiceFileByPlanetDotName($appDir, $planetDotName);
        if (true === file_exists($file . ".dis")) {
            FileSystemTool::rename($file . ".dis", $file);
            return 1;
        }
        return 0;
    }
}