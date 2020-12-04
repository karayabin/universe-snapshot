<?php


namespace Ling\Light_Kit_Admin\Helper;

/**
 * The LightKitAdminHelper class.
 */
class LightKitAdminHelper
{


    /**
     * Returns the lka planet name correspongind to the given $planet.
     *
     * @param string $planet
     * @return string
     */
    public static function getLkaPlanetNameByPlanet(string $planet): string
    {
        $planetId = substr($planet, 6); // removing Light_ prefix
        return "Light_Kit_Admin_" . $planetId;
    }
}