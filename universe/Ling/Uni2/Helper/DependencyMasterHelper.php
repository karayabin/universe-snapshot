<?php


namespace Ling\Uni2\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Uni2\Exception\Uni2Exception;
use Ling\UniverseTools\PlanetTool;

/**
 * The DependencyMasterHelper class.
 * Contains helpers related to the @page(dependency master file).
 */
class DependencyMasterHelper
{


    /**
     * Returns the dependency master content as an array, or false if a problem occurs.
     *
     * @return array|false
     * @throws \Exception
     */
    public static function getDependencyMasterArrayFromWeb(): array|false
    {
        $url = "https://raw.githubusercontent.com/lingtalfi/universe-naive-importer/master/dependency-master.byml";
        $c = file_get_contents($url);
        if (false !== $c) {
            return BabyYamlUtil::readBabyYamlString($c, ['numbersAsString' => true]);
        }
        return false;
    }


    /**
     * Returns the name of the galaxy to which belongs the given $planetName.
     *
     * If no galaxy could be found, false is returned.
     *
     *
     * @param string $planetName
     * @param array $dependencyMaster
     * @return false|string
     */
    public static function findGalaxyByPlanet(string $planetName, array $dependencyMaster)
    {
        $galaxies = $dependencyMaster['galaxies'];
        foreach ($galaxies as $galaxy => $planets) {
            $planetNames = array_keys($planets);
            if (in_array($planetName, $planetNames, true)) {
                return $galaxy;
            }
        }
        return false;
    }


    /**
     *
     * Returns the names of the galaxies present in the dependency master array.
     *
     * @param array $dependencyMaster
     * @return array
     */
    public static function getGalaxies(array $dependencyMaster): array
    {
        $galaxies = $dependencyMaster['galaxies'];
        return array_keys($galaxies);
    }


    /**
     * Returns the dependencyItem corresponding to the $planetName if found in the given dependency master array,
     * or false otherwise (if the planet is not referenced in the dependency master array, or the planet name is invalid).
     *
     *
     * @param array $dependencyMaster
     * @param string $longPlanetName
     * The long planet name (galaxy/shortPlanetName).
     *
     * @return array|false
     * The returned planet item array is a dependency item array from the dependency master file
     * (see @page(the dependency master file page) for more info), but it also contains the following
     * extra-properties:
     *
     * - galaxy: string. The name of the galaxy
     *
     */
    public static function getPlanetItem(array $dependencyMaster, string $longPlanetName)
    {
        $planetInfo = PlanetTool::getGalaxyNamePlanetNameByPlanetName($longPlanetName);
        if (false !== $planetInfo) {
            list($galaxy, $planet) = $planetInfo;
            $item = BDotTool::getDotValue("galaxies.$galaxy.$planet", $dependencyMaster);
            if (null !== $item) {
                $item['galaxy'] = $galaxy;
                return $item;
            }
        }
        return false;
    }


    /**
     * Resolves the dependencies for the given $planetDir recursively, based on the given dependency master array,
     * and returns a dependency map array.
     *
     *
     *
     * The dependency map array is a useful tool to resolve the dependencies of a planet recursively:
     * it's basically a flat array which contains all the dependencies of a planet recursively.
     * It has the following structure:
     *
     * ```txt
     * - dependencies:
     * ----- $dependencySystemName:
     * --------- $packageName: $version
     * --------- ...
     * ----- ...
     * - post_installs:
     * ----- $packageId:
     * --------- (post install directives)
     *
     * ```
     *
     * With:
     *
     * - $dependencySystemName: the name of the dependency system
     * - $packageName: the name of the package (aka packageImportName)
     * - $version: the version of the package.
     *          If the package is a planet, this will be used in the reimport algorithm to decide whether or not to reimport the dependency.
     *          If the package is not a planet, this will be ignored and should be set to null.
     *
     * - $packageId: the identifier of the package: $dependencySystemName.$packageName.
     *          In fact, by design it should only be a galaxyName.planetName combo, since non-planets are ignored by the uni-tool.
     *          However, we keep it open for now, just in case.
     *
     *
     * The post_installs section contains the post install directives for the dependencies only (i.e. not the post_install
     * directives of the $planetName).
     *
     *
     * The intent is that armed with this array, a dependency resolver can resolve the dependencies of a planet by
     * proceeding linearly in two phases:
     *
     * - import all dependencies
     * - call all post installs directives
     *
     *
     *
     * Note: if no dependency was found, the returned array will still have its structure:
     *
     * ```txt
     * - dependencies: []
     * - post_installs: []
     * ```
     *
     *
     *
     *
     *
     *
     *
     *
     * @param string $planetName
     * @param array $dependencyMaster
     * @return array
     * @throws Uni2Exception
     */
    public static function getDependencyMapByPlanetName(string $planetName, array $dependencyMaster)
    {

        $dependencies = [];
        $postInstalls = [];
        $galaxies = self::getGalaxies($dependencyMaster);

        self::collectDependenciesByPlanetName($planetName, $dependencyMaster, $galaxies, $dependencies, $postInstalls, true);
        return [
            "dependencies" => $dependencies,
            "post_installs" => $postInstalls,
        ];
    }


    /**
     *
     * Collects the dependencies and post_installs entries for the getDependencyMapByPlanetName method of the same class.
     * This method is like the working horse of the getDependencyMapByPlanetName method if you will.
     *
     *
     * @param string $longPlanetName
     * @param array $dependencyMaster
     * @param array $galaxies
     * @param array $dependencies . Passed by reference.
     * @param array $postInstalls Passed by reference.
     * @param bool $isRoot = true
     * Indicates whether this is the original call or a recursive call.
     *
     * @return void
     * @throws Uni2Exception
     *
     *
     */
    private static function collectDependenciesByPlanetName(string $longPlanetName, array $dependencyMaster, array $galaxies, array &$dependencies = [], array &$postInstalls = [], bool $isRoot = false)
    {
        $planetInfo = PlanetTool::getGalaxyNamePlanetNameByPlanetName($longPlanetName);
        if (false !== $planetInfo) {


            list($galaxy, $planetName) = $planetInfo;

            $planetItem = self::getPlanetItem($dependencyMaster, $longPlanetName);


            if (false !== $planetItem) {


                $version = $planetItem['version'] ?? "0.0.0"; // 0.0.0 should never happen, but just in case...
                $version = (string)$version;


                if (false === $isRoot) {
                    if (false === array_key_exists($galaxy, $dependencies)) {
                        $dependencies[$galaxy] = [];
                    }
                    $dependencies[$galaxy][$planetName] = $version;
                }


                $planetDependencies = $planetItem['dependencies'];


                foreach ($planetDependencies as $dependencySystem => $packages) {
                    if (false === array_key_exists($dependencySystem, $dependencies)) {
                        $dependencies[$dependencySystem] = [];
                    }

                    if (in_array($dependencySystem, $galaxies)) {

                        foreach ($packages as $planet) {
                            if (false === array_key_exists($planet, $dependencies[$dependencySystem])) {
                                self::collectDependenciesByPlanetName($dependencySystem . "/" . $planet, $dependencyMaster, $galaxies, $dependencies, $postInstalls);
                            }
                        }

                        if (false === $isRoot) {
                            $planetPostInstalls = $planetItem['post_install'];
                            if ($planetPostInstalls) {
                                $packageId = $galaxy . "." . $planetName;
                                $postInstalls[$packageId] = $planetPostInstalls;
                            }
                        }

                    } else {
                        foreach ($packages as $package) {
                            $version = null;
                            $dependencies[$dependencySystem][$package] = $version;
                        }
                    }
                }
            }
        } else {
            throw new Uni2Exception("Invalid planet name: $longPlanetName. A valid planet name should be of the form \$galaxy/\$shortPlanetName.");
        }
    }

}