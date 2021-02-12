<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\FileSystemTool;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\Light_PlanetInstaller\Exception\LpiIncompatibleException;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;
use Ling\UniverseTools\Util\StandardReadmeUtil;

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
    public static function getDependencyListByPlanetDir(string $planetDir, array $options = []): array
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
     * Updates the lpi-deps file for the planet which dir is given.
     * If the file doesn't exist, it's created.
     *
     * @param string $planetDir
     */
    public static function updateLpiDepsByPlanetDir(string $planetDir)
    {

        $lpiDepsFilePath = $planetDir . "/lpi-deps.byml";
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
    public static function createLpiDepsFileByPlanetDir(string $planetDir, array $options = [])
    {
        $uniDir = $options['uniDir'] ?? $planetDir . "/../../";
        $lpiDepsFilePath = $planetDir . "/lpi-deps.byml";

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