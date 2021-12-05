<?php


namespace Ling\Light_EasyRoute\Helper;


use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\BDotTool;
use Ling\Digger\DiggerTool;

/**
 * The LightEasyRouteHelper class.
 */
class LightEasyRouteHelper
{


    /**
     * A route prefix is a namespace that your planet uses to distinguish its routes from other planets' routes.
     *
     * This method returns a guess of what your route prefix should be, based on your planet name.
     *
     * Our heuristic is like this:
     *
     * - if there is a digger route_prefix information, we use it
     * - else, we use the "$planetDotName-route-" string as a prefix
     *
     *
     * Note that in general there is no special rules about the route prefix, it can be any string, so you can override our guess
     * if you want.
     *
     *
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return string
     * @throws \Exception
     */
    public static function guessRoutePrefix(string $appDir, string $planetDotName): string
    {
        $routePrefix = DiggerTool::getValue($appDir, $planetDotName, "route_prefix");
        if (null === $routePrefix) {
            $routePrefix = "$planetDotName-route-";
        }
        return $routePrefix;
    }


    /**
     * Writes a route to the plugin file. If the route exists, it will be overwritten.
     *
     *
     * @param string $appDir
     * @param string $planetDotName
     * @param string $routeName
     * @param array $route
     */
    public static function writeRouteToPluginFile(string $appDir, string $planetDotName, string $routeName, array $route)
    {
        $pluginFile = self::getPluginFile($appDir, $planetDotName);
        $arr = [];
        if (true === file_exists($pluginFile)) {
            $arr = BabyYamlUtil::readFile($pluginFile);
        }
        $bdotKey = BDotTool::escape($planetDotName) . ".routes." . BDotTool::escape($routeName);
        BDotTool::setDotValue($bdotKey, $route, $arr);
        BabyYamlUtil::writeFile($arr, $pluginFile);

    }


    /**
     * Returns the expected plugin file for registering routes with our open registration system.
     *
     * @param string $appDir
     * @param string $planetDotName
     * @return string
     */
    public static function getPluginFile(string $appDir, string $planetDotName): string
    {
        return $appDir . "/config/data/$planetDotName/Ling.Light_EasyRoute/routes.byml";
    }

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
        $pluginFile = self::getPluginFile($appDir, $subscriberPlanetDotName);
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
        return $appDir . "/" . self::getMasterRelativePath();
    }

    /**
     * Returns the relative path (from the app root dir) to the master.
     * See the @page(Light_EasyRoute conception notes) for more details.
     *
     * @return string
     */
    public static function getMasterRelativePath(): string
    {
        return "config/open/Ling.Light_EasyRoute/routes.byml";;
    }
}