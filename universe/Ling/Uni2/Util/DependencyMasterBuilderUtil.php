<?php


namespace Ling\Uni2\Util;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\UniverseTools\DependencyTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The DependencyMasterBuilderUtil class.
 * This class helps creating the dependency master file.
 *
 * See the @page(uni-tool dependency master file) section for more info.
 *
 */
class DependencyMasterBuilderUtil
{


    /**
     *
     * Creates the dependency master file for the given $universeDir.
     *
     * The dependency master file will be created at the given $file path.
     *
     * If the galaxy name of a planet cannot be found, an error message will be appended
     * to the given $errors array.
     *
     * Similarly, if the planet does not have a version number, an error message will be appended.
     *
     *
     *
     * Note: the galaxy name and the version number should be found in the meta info of the planet.
     * See the @page(meta-info of a planet) for more details.
     *
     *
     *
     * How to use:
     * ------------
     * ```php
     * $universeDir = "/myphp/universe";
     * $file = "/komin/jin_site_demo/tmp/dependency-master.byml";
     * $errors = [];
     * $util = new DependencyMasterBuilderUtil();
     * $util->createDependencyMasterByUniverseDir($universeDir, $file, $errors);
     * az($errors);
     * ```
     *
     *
     *
     *
     *
     * @param string $universeDir
     * @param string $file
     * @param array $errors
     *
     * @param array|null $allowedGalaxies
     * An array of allowed galaxies. If this is null, all galaxies are allowed.
     * If it's an array, only the galaxies specified in the array are allowed.
     *
     * @throws \Ling\UniverseTools\Exception\UniverseToolsException
     */
    public function createDependencyMasterByUniverseDir(string $universeDir, string $file, array &$errors = [], array $allowedGalaxies = null)
    {
        $galaxies = [];
        $planets = PlanetTool::getPlanetDirs($universeDir);
        foreach ($planets as $planetDir) {


            $pInfo = PlanetTool::getGalaxyNamePlanetNameByDir($planetDir);
            if (false !== $pInfo) {

                list($galaxy, $planetName) = $pInfo;


                if (null === $allowedGalaxies || in_array($galaxy, $allowedGalaxies, true)) {

                    $meta = MetaInfoTool::parseInfo($planetDir);
                    $version = $meta['version'] ?? null;

                    if (null !== $version) {

                        if (false === array_key_exists($galaxy, $galaxies)) {
                            $galaxies[$galaxy] = [];
                        }

                        $dependencyItem = DependencyTool::getDependencyItem($planetDir);
                        if (false === array_key_exists("post_install", $dependencyItem)) {
                            $dependencyItem['post_install'] = [];
                        }


                        $galaxies[$galaxy][$planetName] = [
                            "version" => $version,
                            "dependencies" => $dependencyItem['dependencies'],
                            "post_install" => $dependencyItem['post_install'],
                        ];
                    } else {
                        $errors[] = "The planet $planetName does not have a version number.";
                    }
                }

            } else {
                $errors[] = "Invalid planet directory: $planetDir. A valid planet directory should look like this: /my_app/universe/\$galaxy/\$planetShortName.";
            }
        }


        BabyYamlUtil::writeFile([
            "galaxies" => $galaxies,
        ], $file);
    }
}