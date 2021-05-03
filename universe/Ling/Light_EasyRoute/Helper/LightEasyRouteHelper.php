<?php


namespace Ling\Light_EasyRoute\Helper;


use Ling\BabyYaml\BabyYamlUtil;

/**
 * The LightEasyRouteHelper class.
 */
class LightEasyRouteHelper
{


    /**
     * Merges the plugin's route declaration file (if it exists) into the master.
     * See the @page(Light_EasyRoute conception notes) for more details.
     *
     * @param string $appDir
     * @param string $subscriberPluginDotName
     * @throws \Exception
     */
    public static function copyRoutesFromPluginToMaster(string $appDir, string $subscriberPluginDotName)
    {
        $pluginFile = $appDir . "/config/data/$subscriberPluginDotName/Ling.Light_EasyRoute/routes.byml";
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