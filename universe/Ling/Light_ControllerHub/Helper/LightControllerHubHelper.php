<?php

namespace Ling\Light_ControllerHub\Helper;

/**
 * The LightControllerHubHelper class.
 */
class LightControllerHubHelper
{

    /**
     * Returns the route name of the hub controller.
     * @return string
     */
    public static function getRouteName(): string
    {
        /**
         * Note: as you can see for now it's a hardcoded value.
         * The problem is that this value must be synced with the value inside the
         * /the_app/config/data/Ling.Light_ControllerHub/Light_EasyRoute/lch_routes.byml file,
         * otherwise things will break.
         *
         * As for now, I didn't't implement a mechanism to do the sync automatically (didn't need
         * it personally so far), but the main idea of the existence of this method is that at least
         * external plugin can rely on this method, which is supposed to retrieve the always up-to-date value.
         *
         * So as for now, just remember that if you change the value in the configuration file, you need to change it here as well.
         *
         */
        return "lch_route-hub";
    }
}