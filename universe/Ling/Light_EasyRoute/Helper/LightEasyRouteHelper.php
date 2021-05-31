<?php


namespace Ling\Light_EasyRoute\Helper;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The LightEasyRouteHelper class.
 */
class LightEasyRouteHelper
{


    /**
     * Merges the planet's route declaration file (if it exists) into the master.
     * See the @page(Light_EasyRoute conception notes) for more details.
     *
     * @param string $appDir
     * @param string $subscriberPlanetDotName
     * @throws \Exception
     */
    public static function copyRoutesFromPluginToMaster(string $appDir, string $subscriberPlanetDotName)
    {
        $pluginFile = $appDir . "/config/data/$subscriberPlanetDotName/Ling.Light_EasyRoute/routes.byml";
        if (true === file_exists($pluginFile)) {
            $arr = BabyYamlUtil::readFile($pluginFile);

            $masterFile = self::getMasterPath($appDir);
            if (true === file_exists($masterFile)) {
                $master = BabyYamlUtil::readFile($masterFile);
            } else {
                $master = [];
            }
            $master = array_merge($master, $arr);
            BabyYamlUtil::writeFile($master, $masterFile);
        }
    }


    /**
     * Removes the planet's route declaration file (if it exists) into the master.
     * See the @page(Light_EasyRoute conception notes) for more details.
     *
     * @param string $appDir
     * @param string $subscriberPlanetDotName
     * @throws \Exception
     */
    public static function removeRoutesFromMaster(string $appDir, string $subscriberPlanetDotName)
    {
        $masterFile = self::getMasterPath($appDir);
        if (true === file_exists($masterFile)) {
            $arr = BabyYamlUtil::readFile($masterFile);
            if (true === array_key_exists($subscriberPlanetDotName, $arr)) {
                unset($arr[$subscriberPlanetDotName]);
                BabyYamlUtil::writeFile($arr, $masterFile);
            }
        }
    }


    /**
     * Returns the path to the routes master declaration file.
     * See the @page(Light_EasyRoute conception notes) for more details.
     *
     * @param string $appDir
     * @return string
     */
    public static function getMasterPath(string $appDir): string
    {
        return $appDir . "/config/open/Ling.Light_EasyRoute/routes.byml";;
    }
}