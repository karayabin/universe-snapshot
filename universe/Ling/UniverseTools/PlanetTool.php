<?php

namespace Ling\UniverseTools;


use Ling\DirScanner\YorgDirScannerTool;
use Ling\TokenFun\TokenFinder\Tool\TokenFinderTool;
use Ling\UniverseTools\Exception\UniverseToolsException;

/**
 * The PlanetTool class.
 *
 * Contains methods related to a planet, like listing the @kw(bsr-0) classes found in a planet for instance.
 *
 */
class PlanetTool
{


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
     * @param $planetDir
     * @return array
     * @throws UniverseToolsException
     */
    public static function getClassNames($planetDir)
    {
        if (false === is_dir($planetDir)) {
            throw new UniverseToolsException("Dir not found: $planetDir");
        }

        $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
        if (false !== $pInfo) {
            list($galaxy, $planetName) = $pInfo;
            $classNames = [];
            $dirName = basename($planetDir);


            $files = YorgDirScannerTool::getFilesWithExtension($planetDir, 'php', false, true, true);

            foreach ($files as $file) {
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
                    $_classNames = TokenFinderTool::getClassNames($tokens);
                    if ($_classNames) { // ensure that the file contains a class

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

}