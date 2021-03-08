<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Exception\LpiIncompatibleException;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\Util\StandardReadmeUtil;

/**
 * The LpiDepsFileHelper class.
 */
class LpiDepsFileHelper
{

    /**
     * Returns the lpi-deps.byml file location from the given planetDir.
     *
     * @param string $planetDir
     * @return string
     */
    public static function getLpiDepsFilePathByPlanetDir(string $planetDir): string
    {
        return $planetDir . "/lpi-deps.byml";
    }


    /**
     * Returns an array containing @page(lpi-deps) info for the last version of the given planet.
     *
     * The returned array has the following structure:
     *
     * - 0: real version number
     * - 1: array of planetDotName => version expression
     *
     *
     * Links: [version expression](https://github.com/lingtalfi/Light_PlanetInstaller/blob/master/doc/pages/conception-notes.md#version-expression).
     *
     *
     *
     *
     * @param string $planetDir
     * @return array
     */
    public static function getLatestLpiDependenciesByPlanetDir(string $planetDir): array
    {
        $lpiDepsFilePath = self::getLpiDepsFilePathByPlanetDir($planetDir);
        if (false === file_exists($lpiDepsFilePath)) {
            throw new LightPlanetInstallerException("No lpi-deps.byml file found in $lpiDepsFilePath.");
        }


        $data = BabyYamlUtil::readFile($lpiDepsFilePath);
        $last = array_key_last($data);
        $deps = array_pop($data);


        return [
            $last,
            $deps,
        ];
    }


    /**
     * Updates the lpi-deps file for the planet which dir is given.
     * If the file doesn't exist, it's created.
     *
     * @param string $planetDir
     */
    public static function updateLpiDepsByPlanetDir(string $planetDir)
    {

        $lpiDepsFilePath = self::getLpiDepsFilePathByPlanetDir($planetDir);
        if (true === file_exists($lpiDepsFilePath)) {
            $data = BabyYamlUtil::readFile($lpiDepsFilePath);
            $version = MetaInfoTool::getVersion($planetDir);
            $deps = self::getDependencyListByPlanetDir($planetDir);
            $data[$version] = $deps;
            BabyYamlUtil::writeFile($data, $lpiDepsFilePath);
        } else {
            self::createLpiDepsFileByPlanetDir($planetDir);
        }
    }





    /**
     * Takes the lpi-deps.byml file of the given source planet, and updates all dependencies of the given dstPlanetDotName found in it with the given version expression.
     *
     *
     * @param string $srcPlanetDir
     * @param string $dstPlanetDotName
     * @param string $dstVersionExpr
     */
//    public static function updateDependency(string $srcPlanetDir, string $dstPlanetDotName, string $dstVersionExpr)
//    {
//        $lpiDepsFile = self::getLpiDepsFilePathByPlanetDir($srcPlanetDir);
//        list($galaxy, $planet) = explode(".", $dstPlanetDotName);
//        $content = file_get_contents($lpiDepsFile);
//        if (false === $content) {
//            throw new LpiIncompatibleException("The lpi-deps.byml file was not found at \"$lpiDepsFile\".");
//        }
//        $deps = BabyYamlUtil::readBabyYamlString($content);
//
//        foreach ($deps as $version => $items) {
//            $found = false;
//            foreach ($items as $k => $v) {
//                if (true === str_starts_with($v, "$galaxy:$planet:")) {
//                    $found = true;
//                    $deps[$version][$k] = "$galaxy:$planet:$dstVersionExpr";
//                }
//            }
//
//            if (false === $found) {
//                $deps[$version][] = "$galaxy:$planet:$dstVersionExpr";
//            }
//        }
//
//        BabyYamlUtil::writeFile($deps, $lpiDepsFile);
//
//    }


    /**
     *
     * Returns the dependencies for the given version, found in the lpi-deps.byml file which location is given.
     * The returned array items have the following structure:
     *
     * - 0: planetDot
     * - 1: versionExpression
     *
     * Throws an exception if it can't return the array.
     *
     * The location can be either an url or a filesystem path.
     *
     *
     *
     *
     *
     * @param string $location
     * @param string $version
     * @return array
     * @throws \Exception
     */
    public static function getLpiDepsByLocation(string $location, string $version)
    {
        $content = file_get_contents($location);
        if (false === $content) {
            throw new LpiIncompatibleException("The lpi-deps.byml file was not found at \"$location\".");
        }
        $deps = BabyYamlUtil::readBabyYamlString($content);


        if (array_key_exists($version, $deps)) {
            $depsUnprocessed = $deps[$version];
            $ret = [];
            foreach ($depsUnprocessed as $item) {
                $p = explode(':', $item);
                list($galaxy, $planet, $versionExpr) = $p;
                $ret[] = [
                    $galaxy . "." . $planet,
                    $versionExpr,
                ];
            }
            return $ret;
        } else {
            throw new LpiIncompatibleException("Version $version not found in the lpi-deps.byml file (at \"$location\").");
        }
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     *
     * Builds and returns an array of items representing the dependencies in their latest version for the planet which dir is given.
     * It's mainly used to create the lpi-deps file for the planet if it has not one already.
     *
     *
     * Each item has the following format:
     * - $galaxy:$planet:$version
     *
     * Available options are:
     * - universeDir: string, the location of the universe directory. This is where the dependencies are searched for.
     *      By default it's the directory two parents above the given planet directory.
     * - versionPlus: bool=true, whether to add the plus symbol at the end of the version number for each item.
     *
     * @param string $planetDir
     * @param array $options
     * @return array
     * @throws \Exception
     *
     *
     */
    private static function getDependencyListByPlanetDir(string $planetDir, array $options = []): array
    {
        $deps = [];
        $uniDir = $options['universeDir'] ?? null;
        $versionPlus = $options['versionPlus'] ?? true;
        if (null === $uniDir) {
            $uniDir = realpath($planetDir . "/../../");
            if ('universe' !== basename($uniDir)) {
                throw new LightPlanetInstallerException("The universe dir name should be \"universe\", not the case with $uniDir.");
            }
        }

        $rawDependencies = DependencyTool::getDependencyList($planetDir);
        foreach ($rawDependencies as $dependency) {
            list($galaxy, $planet) = $dependency;
            $depPlanetDir = $uniDir . "/$galaxy/$planet";
            $version = MetaInfoTool::getVersion($depPlanetDir);
            $sPlus = (true === $versionPlus) ? '+' : '';
            $deps[] = implode(':', [$galaxy, $planet, $version . $sPlus]);
        }
        return $deps;
    }

    /**
     * Creates the lpi-deps file for the given planetDir.
     *
     *
     * Available options are:
     * - uniDir, string, the universe dir where to look for planets.
     *      The default is two parents above the given planet dir.
     *
     * This method assumes that you are listing all the planet versions in the README.md file of your planet,
     * and in the history log section. See the source code for more details.
     * If that's not the case, don't use this method: it won't work.
     *
     *
     *
     *
     * @param string $planetDir
     * @param array $options
     */
    private static function createLpiDepsFileByPlanetDir(string $planetDir, array $options = [])
    {
        $uniDir = $options['uniDir'] ?? $planetDir . "/../../";
        $lpiDepsFilePath = self::getLpiDepsFilePathByPlanetDir($planetDir);

        $data = [];
        $versionNumbers = StandardReadmeUtil::getReadmeVersionsByPlanetDir($planetDir);
        $deps = self::getDependencyListByPlanetDir($planetDir, [
            'universeDir' => $uniDir,
            'versionPlus' => true,
        ]);
        foreach ($versionNumbers as $number) {
            $data[$number] = $deps;
        }
        BabyYamlUtil::writeFile($data, $lpiDepsFilePath);

    }
}