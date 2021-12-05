<?php


namespace Ling\Light_PlanetInstaller\Helper;


use Ling\Bat\ClassTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiHelper class.
 */
class LpiHelper
{


    /**
     * Returns the app id used by this planet.
     *
     * @return string
     */
    public static function getAppId(): string
    {
        return 'lpi';
    }


    /**
     * Returns a temporary directory used internally by this planet.
     *
     * Note: this directory is not automatically deleted unless you reboot your machine (i.e. never on a server), you need to delete it manually.
     *
     *
     * @return string
     */
    public static function getSelfTmpDir(): string
    {
        return "/tmp/universe/Ling/Light_PlanetInstaller";
    }

    /**
     * Returns the location of the "session dirs" directory.
     * @return string
     */
    public static function getSessionDirsPath(): string
    {
        return self::getSelfTmpDir() . "/session-dirs";
    }


    /**
     * Returns the path to the universe maps directory.
     * @param string $appDir
     * @return string
     */
    public static function getUniverseMapsDir(string $appDir): string
    {
        return $appDir . "/_universe_maps";
    }


    /**
     * Returns the planet installer instance for the given planet, if it exists, or false otherwise.
     *
     *
     * @param string $planetDotName
     * @return object|false
     */
    public static function getPlanetInstallerInstance(string $planetDotName): object|false
    {

        list($galaxy, $planet) = PlanetTool::extractPlanetDotName($planetDotName);

        $tightPlanet = PlanetTool::getTightPlanetName($planet);
        $installerClass = "$galaxy\\$planet\\Light_PlanetInstaller\\${tightPlanet}PlanetInstaller";
        if (true === ClassTool::isLoaded($installerClass)) {
            return new $installerClass;
        }
        return false;
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