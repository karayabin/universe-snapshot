<?php

namespace Ling\UniverseTools;


use Ling\Bat\FileSystemTool;
use Ling\DirScanner\YorgDirScannerTool;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;
use Ling\UniverseTools\Exception\UniverseToolsException;
use Ling\UniverseTools\Util\StandardReadmeUtil;

/**
 * The PlanetTool class.
 *
 * Contains methods related to a planet, like listing the @kw(bsr-0) classes found in a planet for instance.
 *
 */
class PlanetTool
{


    /**
     * Returns the list of the planet dot names present in the given working dir.
     * The working dir can be either of those:
     *
     * - universe dir
     * - app dir (which contains the universe dir as a direct child)
     *
     *
     * @param string $workingDir
     * @return array
     */
    public static function getPlanetDotNamesByWorkingDir(string $workingDir): array
    {
        $ret = [];
        $uniDir = null;
        if ('universe' === basename($workingDir)) {
            $uniDir = $workingDir;
        } elseif (true === is_dir($workingDir . "/universe")) {
            $uniDir = $workingDir . "/universe";
        }

        if (null !== $uniDir) {
            $planetDirs = self::getPlanetDirs($uniDir);
            foreach ($planetDirs as $planetDir) {
                $ret[] = self::getPlanetDotNameByPlanetDir($planetDir);
            }
        }

        return $ret;
    }


    /**
     * Returns the version number of the planet if found, or null otherwise.
     *
     * @param string $planetDir
     * @return string|null
     * @throws \Exception
     */
    public static function getVersionByPlanetDir(string $planetDir)
    {
        $version = MetaInfoTool::getVersion($planetDir);
        if (true === empty($version)) {
            $ru = new StandardReadmeUtil();
            $rf = $planetDir . "/README.md";
            if (file_exists($rf)) {
                $errors = [];
                $versionInfo = $ru->getLatestVersionInfo($rf, $errors);
                if ($errors) {
                    throw new UniverseToolsException("Some errors found while parsing the README.md file for the current version: " . implode(PHP_EOL, $errors));
                }
                $version = $versionInfo[0];
            }
        }
        return $version;
    }

    /**
     * Returns whether the given planet exists in the given app.
     *
     *
     * @param string $planetDotName
     * @param string $applicationDir
     * @return bool
     */
    public static function exists(string $planetDotName, string $applicationDir): bool
    {
        $planetDir = self::getPlanetDirByPlanetDotName($planetDotName, $applicationDir);
        return (true === file_exists($planetDir));
    }


    /**
     * Returns the [planet slash name](https://github.com/karayabin/universe-snapshot#the-planet-slash-name) from the given planet dot name.
     *
     *
     * @param string $planetDotName
     * @return string
     */
    public static function getPlanetSlashNameByDotName(string $planetDotName): string
    {
        return str_replace(".", "/", $planetDotName);
    }


    /**
     * Returns the location of the planet directory from the given planet dot name and app dir.
     *
     * @param string $planetDotName
     * @param string $appDir
     * @return string
     */
    public static function getPlanetDirByPlanetDotName(string $planetDotName, string $appDir): string
    {
        return $appDir . "/universe/" . self::getPlanetSlashNameByDotName($planetDotName);
    }

    /**
     * Parses the given directory recursively and returns an array containing the names of all @kw(bsr-1) classes found.
     *
     * Example:
     * -----------
     *
     * The following code:
     *
     * ```php
     * $planetDir = "/komin/jin_site_demo/universe/Ling/UniverseTools";
     * az(PlanetTool::getClassNames($planetDir));
     * ```
     *
     *
     * Will output:
     *
     * ```html
     * array(3) {
     * [0] => string(33) "Ling\UniverseTools\DependencyTool"
     * [1] => string(51) "Ling\UniverseTools\Exception\UniverseToolsException"
     * [2] => string(29) "Ling\UniverseTools\PlanetTool"
     * }
     *
     * ```
     *
     *
     *
     *
     * Available options are:
     * - ignoreFilesStartingWith: array of prefixes to look for. If a prefix matches the beginning of a (relative) file path (relative to the planet root dir),
     *          then the file is excluded.
     *
     *
     * @param $planetDir
     * @param array $options
     * @return array
     * @throws UniverseToolsException
     */
    public static function getClassNames($planetDir, array $options = []): array
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $ignoreFilesStartingWith = $options['ignoreFilesStartingWith'] ?? [];


        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {
            list($galaxy, $planetName) = $pInfo;
            $classNames = [];
            $dirName = basename($planetDir);


            $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);
            foreach ($files as $file) {


                /**
                 * Skip files starting with the specified prefixes
                 */
                if ($ignoreFilesStartingWith) {
                    foreach ($ignoreFilesStartingWith as $prefix) {
                        if (0 === strpos($file, $prefix)) {
                            continue 2;
                        }
                    }
                }

                $absFile = $planetDir . "/" . $file;
                $content = file_get_contents($absFile);
                /**
                 * filtering scripts starting with
                 *
                 *      #!/usr/bin/env php
                 *
                 *
                 */
                if ('<?php' === substr($content, 0, 5)) {


                    $relativeClassName = str_replace('/', '\\', substr($file, 0, -4));
                    $className = $galaxy . '\\' . $dirName . '\\' . $relativeClassName;


                    $tokens = token_get_all(file_get_contents($absFile));
                    $_items = TokenFinderTool::getClassNames($tokens, true, [
                        "includeInterfaces" => true,
                    ]);


                    if ($_items) { // ensure that the file contains a class

                        try {

                            $class = new \ReflectionClass($className);
                            $classNames[] = $className;

                        } catch (\ReflectionException $e) {
                        }
                    }

                }
            }
            return $classNames;
        } else {
            throw new UniverseToolsException("Invalid planet directory. A valid planet dir should be of the form /my/universe/\$galaxyName/\$shortPlanetName.");
        }
    }


    /**
     * Returns the list of planet dirs for a given $universeDir.
     *
     * If the given universe directory does not exist, a UniverseToolsException is thrown.
     *
     *
     * @param string $universeDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getPlanetDirs(string $universeDir): array
    {
        if (false === is_dir($universeDir)) {
            throw new UniverseToolsException("Dir not found: $universeDir");
        }
        $ret = [];
        $galaxies = YorgDirScannerTool::getDirs($universeDir);
        foreach ($galaxies as $galaxy) {
            $ret = array_merge($ret, YorgDirScannerTool::getDirs($galaxy));
        }
        return $ret;
    }


    /**
     * Returns the array of planet dot names found in the given universe directory.
     *
     * @param string $uniDir
     * @return array
     * @throws \Exception
     */
    public static function getPlanetDotNames(string $uniDir): array
    {
        $ret = [];
        $pdirs = self::getPlanetDirs($uniDir);
        foreach ($pdirs as $pdir) {
            $ret[] = self::getPlanetDotNameByPlanetDir($pdir);
        }
        return $ret;
    }


    /**
     * Returns an array containing the galaxy name and the short planet name extracted from the given $planetDir.
     * Returns false if the given $planetDir is not valid.
     *
     * @param string $planetDir
     * @return array|false
     */
    public static function getGalaxyNamePlanetNameByDir(string $planetDir)
    {
        if (false !== strpos($planetDir, "/")) {
            return [
                basename(dirname($planetDir)),
                basename($planetDir),
            ];
        }
        return false;
    }


    /**
     * Returns the planet dot name from the given planet dir.
     *
     * @param string $planetDir
     * @return string
     */
    public static function getPlanetDotNameByPlanetDir(string $planetDir): string
    {
        list($galaxy, $planet) = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        return $galaxy . "." . $planet;
    }


    /**
     * Returns the @page(tight planet name) for a given planet.
     *
     * Note: it's the same as the getCompressedPlanetName method.
     * @param string $planetName
     * @return string
     */
    public static function getTightPlanetName(string $planetName): string
    {
        return str_replace("_", "", $planetName);
    }


    /**
     * Returns the [compressed planet name](https://github.com/karayabin/universe-snapshot#the-compressed-planet-name) for a given planet.
     *
     * Note: it's the same as the getTightPlanetName method.
     *
     * @param string $planetName
     * @return string
     */
    public static function getCompressedPlanetName(string $planetName): string
    {
        return str_replace("_", "", $planetName);
    }

    /**
     * Returns an array containing the galaxy name and the short planet name extracted from the given $planetName.
     * Returns false if the given $planetName is invalid.
     *
     *
     * @param string $longPlanetName
     * The long planet name (galaxy/planetShortName).
     * @return array|false
     */
    public static function getGalaxyNamePlanetNameByPlanetName(string $longPlanetName)
    {
        $p = explode("/", $longPlanetName);
        if (2 === count($p)) {
            return $p;
        }
        return false;
    }


    /**
     * Returns an array containing the galaxy and the planet, based on the given planetId.
     *
     * The array contains the following:
     * - 0: galaxy name
     * - 1: planet name
     *
     *
     *
     * @param string $planetId
     * @return array
     * @throws \Exception
     */
    public static function extractPlanetId(string $planetId): array
    {
        $p = explode("/", $planetId, 2);
        if (2 === count($p)) {
            return $p;
        }
        throw new UniverseToolsException("The given planetId is not valid: $planetId.");
    }


    /**
     * Returns an array containing the galaxy and the planet, based on the given [planetDotName](https://github.com/karayabin/universe-snapshot#the-planet-dot-name).
     *
     * The array contains the following:
     * - 0: galaxy name
     * - 1: planet name
     *
     *
     *
     * @param string $planetDotName
     * @return array
     * @throws \Exception
     */
    public static function extractPlanetDotName(string $planetDotName): array
    {
        $p = explode(".", $planetDotName, 2);
        if (2 === count($p)) {
            return $p;
        }
        throw new UniverseToolsException("The given planetDotName is not valid: $planetDotName.");
    }


    /**
     * Returns an array containing the galaxy and planet contained in the given class name.
     * Returns false if the given class name is not valid (i.e. @page(bsr-0) compliant).
     *
     * The given class name is the fully qualified class name.
     *
     *
     * @param string $className
     * @return array|false
     */
    public static function getGalaxyPlanetByClassName(string $className): array|false
    {
        $p = explode("\\", $className);
        if (count($p) > 2) {
            return [
                array_shift($p),
                array_shift($p),
            ];
        }
        return false;
    }


    /**
     * Returns the page(planet dot name) from the given class name.
     *
     *
     * @param string $className
     * @return string
     * @throws \Exception
     */
    public static function getPlanetDotNameByClassName(string $className): string
    {
        $p = explode("\\", $className);
        if (count($p) >= 2) {
            return $p[0] . "." . $p[1];
        }
        throw new UniverseToolsException("PlanetTool::getPlanetDotNameByClassName: Unexpected class name: $className.");
    }


    /**
     * Imports a planet by copying its given external source dir to the target application.
     * Optionally, the assets/map can be copied into the app.
     *
     * Available options are:
     * - assets: bool=false, if true, the assets/map will be copied to the application.
     * - symlinks: bool=false, if true, symlinks to the local universe will be created (if available) instead of copying
     *      the whole planet dirs.
     *
     * See more details in the @page(import install discussion).
     *
     * @param string $planetDot
     * @param string $extPlanetDir
     * @param string $appDir
     * @param array $options
     */
    public static function importPlanetByExternalDir(string $planetDot, string $extPlanetDir, string $appDir, array $options = [])
    {
        $assets = $options['assets'] ?? false;
        $symlinks = $options['symlinks'] ?? false;


        list($galaxy, $planet) = self::extractPlanetDotName($planetDot);
        if (false === file_exists($extPlanetDir)) {
            throw new UniverseToolsException("External source dir not found: $extPlanetDir.");
        }
        if (false === file_exists($appDir)) {
            throw new UniverseToolsException("Application dir not found: $appDir.");
        }

        $newPlanetDir = $appDir . "/universe/$galaxy/$planet";
        $symlinked = false;
        if (true === $symlinks) {
            $localDir = LocalUniverseTool::getPlanetDir($planetDot);
            if (true === is_dir($localDir)) {
                $symlinked = true;
                if (is_dir($newPlanetDir)) {
                    FileSystemTool::remove($newPlanetDir);
                }
                FileSystemTool::mkdir(dirname($newPlanetDir));
                symlink($localDir, $newPlanetDir);
            }
        }

        if (false === $symlinked) {
            FileSystemTool::copyDir($extPlanetDir, $newPlanetDir);
        }


        if (true === $assets) {
            $assetsMapDir = $newPlanetDir . "/assets/map";
            if (is_dir($assetsMapDir)) {
                AssetsMapTool::copyAssets($assetsMapDir, $appDir);
            }
        }
    }


    /**
     * Installs the assets of the given planet.
     *
     * See the @page(UniverseTool conception notes) for more details about assets.
     *
     * @param string $appDir
     * @param string $planetDotName
     */
    public static function installAssetsByPlanetDotName(string $appDir, string $planetDotName)
    {
        $planetDir = $appDir . "/universe/" . str_replace(".", "/", $planetDotName);
        $assetsMapDir = $planetDir . "/assets/map";
        if (is_dir($assetsMapDir)) {
            AssetsMapTool::copyAssets($assetsMapDir, $appDir);
        }
    }


    /**
     * Removes the assets for the given planet.
     *
     * See the @page(UniverseTool conception notes) for more details about assets.
     *
     * @param string $appDir
     * @param string $planetDotName
     */
    public static function removeAssetsByPlanetDotName(string $appDir, string $planetDotName)
    {
        $planetDir = $appDir . "/universe/" . str_replace(".", "/", $planetDotName);
        $assetMapDir = $planetDir . "/assets/map";
        if (is_dir($assetMapDir)) {
            AssetsMapTool::removeAssets($assetMapDir, $appDir);
        }
    }


    /**
     * Removes the given planet from the given app directory.
     * Optionally, the assets/map files are also removed.
     *
     * Available options are:
     * - assets: bool=false, if true, the assets/map will be removed from the application.
     *
     * See more details in the @page(import install discussion).
     *
     * @param string $planetDot
     * @param string $appDir
     * @param array $options
     */
    public static function removePlanet(string $planetDot, string $appDir, array $options = [])
    {
        $assets = $options['assets'] ?? false;

        list($galaxy, $planet) = self::extractPlanetDotName($planetDot);
        $planetDir = $appDir . "/universe/$galaxy/$planet";

        if (true === $assets) {
            $assetMapDir = $planetDir . "/assets/map";
            if (is_dir($assetMapDir)) {
                AssetsMapTool::removeAssets($assetMapDir, $appDir);
            }
        }

        if (is_dir($planetDir)) {
            FileSystemTool::remove($planetDir);
        }
    }

}