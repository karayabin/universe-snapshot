<?php


namespace Ling\Light_Kit_Admin\Helper;

use Ling\Light_Kit_Admin\Exception\LightKitAdminException;

/**
 * The LightKitAdminHelper class.
 */
class LightKitAdminHelper
{


    /**
     * Returns the lka planet name corresponding to the given $planet.
     *
     * @param string $planet
     * @return string
     */
    public static function getLkaPlanetNameByPlanet(string $planet): string
    {
        $planetId = substr($planet, 6); // removing Light_ prefix
        return "Light_Kit_Admin_" . $planetId;
    }


    /**
     * Returns the source planet name from the given lka planet name.
     *
     * Throws an exception if the given lka planet dot name is not formatted correctly.
     *
     * @param string $lkaPlanetDotName
     * @return string
     * @throws \Exception
     */
    public static function getSourcePlanetDotNameByLkaPlanetDotName(string $lkaPlanetDotName): string
    {
        $p = explode(".", $lkaPlanetDotName, 2);
        if (2 === count($p)) {
            list($galaxy, $planet) = $p;
            if (true === str_starts_with($planet, "Light_Kit_Admin_")) {
                return "$galaxy.Light_" . substr($planet, 16);
            }
        }

        throw new LightKitAdminException("Invalid lka planetDotName: $lkaPlanetDotName.");
    }


    /**
     * Returns the official light kit editor root path used by light kit admin.
     *
     *
     * @param string $appDir
     * @return string
     */
    public static function getLightKitEditorRootPath(string $appDir): string
    {
        return $appDir . "/" . self::getLightKitEditorRelativeRootPath();
    }


    /**
     * Returns the official light kit editor relative root path used by light kit admin.
     *
     *
     * @return string
     */
    public static function getLightKitEditorRelativeRootPath(): string
    {
        return "config/open/Ling.Light_Kit_Admin/Ling.Light_Kit_Editor/admin";
    }
}