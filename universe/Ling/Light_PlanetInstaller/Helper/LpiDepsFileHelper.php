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
     *
     * Returns the content of the lpi deps file as an array.
     *
     * Throws an LpiIncompatibleException exception the lpi deps file wasn't found at the given location.
     *
     * The location can be either an url or a filesystem path.
     *
     *
     *
     *
     *
     * @param string $location
     * @return array
     * @throws \Exception
     */
    public static function getLpiDepsContentByLocation(string $location)
    {
        $content = file_get_contents($location);
        if (false === $content) {
            throw new LpiIncompatibleException("The lpi-deps.byml file was not found at \"$location\".");
        }
        return BabyYamlUtil::readBabyYamlString($content);
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
            $deps[] = implode(':', [$galaxy, $planet, $version]);
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
        ]);
        foreach ($versionNumbers as $number) {
            $data[$number] = $deps;
        }
        BabyYamlUtil::writeFile($data, $lpiDepsFilePath);

    }


}