<?php


namespace Ling\Light_PlanetInstaller\Helper;

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Light_PlanetInstaller\Exception\LightPlanetInstallerException;
use Ling\UniverseTools\LocalUniverseTool;
use Ling\UniverseTools\MetaInfoTool;
use Ling\UniverseTools\PlanetTool;

/**
 * The LpiFileHelper class.
 */
class LpiFileHelper
{


    /**
     * Upgrades planets in the lpi.byml file of the application, for either the specified planetDotName only, or for all the planets found in the application (by default), then return the file's planets.
     *
     * The latest versions are fetched from the @page(local universe) first, then from the web otherwise.
     * A plus symbol is added to that version number.
     *
     * The returned array is an array of planetDotName => versionExpression.
     *
     *
     * @param string $appDir
     * @param string|null $planetDotName
     * @return array
     */
    public static function upgradeLpiPlanets(string $appDir, string $planetDotName = null): array
    {
        $uniDir = $appDir . "/universe";
        if (false === is_dir($uniDir)) {
            throw new LightPlanetInstallerException("The universe directory wasn't found: $uniDir. Aborting.");
        }


        //--------------------------------------------
        // CREATING THE MAP
        //--------------------------------------------
        $map = self::getPlanetsMap($appDir);
        $planetDirs = PlanetTool::getPlanetDirs($uniDir);
        foreach ($planetDirs as $planetDir) {
            $_planetDotName = PlanetTool::getPlanetDotNameByPlanetDir($planetDir);


            if (null !== $planetDotName && $_planetDotName !== $planetDotName) {
                continue;
            }
            // local?
            if (null !== ($localPlanetDir = LocalUniverseTool::getPlanetDir($_planetDotName))) {
                $version = MetaInfoTool::getVersion($localPlanetDir);
                if (null === $version) {
                    throw new LightPlanetInstallerException("meta-info file not found for planet $_planetDotName ($planetDir). Aborting.");
                }
            } else {
                // web ?
                $version = LpiWebHelper::getPlanetCurrentVersion($_planetDotName);
            }
            $map[$_planetDotName] = $version;
        }

        $lpiPath = self::getLpiPathByAppDir($appDir);
        $arr = [
            "planets" => $map,
        ];
        BabyYamlUtil::writeFile($arr, $lpiPath);

        return $map;
    }


    /**
     * Returns the planet maps defined in the lpi.byml file of the application, if any.
     * Or an empty array otherwise.
     *
     *
     * @param string $appDir
     * @return array
     */
    public static function getPlanetsMap(string $appDir): array
    {
        $ret = [];
        $lpiFile = self::getLpiPathByAppDir($appDir);
        if (true === is_file($lpiFile)) {
            $arr = BabyYamlUtil::readFile($lpiFile);
            $ret = $arr["planets"] ?? [];
        }
        return $ret;
    }


    /**
     * Returns the path to the lpi.byml file of the given application.
     *
     * @param string $appDir
     * @return string
     */
    public static function getLpiPathByAppDir(string $appDir): string
    {
        return $appDir . "/lpi.byml";
    }

}