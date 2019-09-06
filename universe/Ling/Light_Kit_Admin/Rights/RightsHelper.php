<?php


namespace Ling\Light_Kit_Admin\Rights;

use Ling\Light_User\WebsiteLightUser;

/**
 * The RightsHelper class.
 */
class RightsHelper
{


    /**
     * Returns whether the given website user is root.
     *
     * @param WebsiteLightUser $user
     * @return bool
     */
    public static function isRoot(WebsiteLightUser $user): bool
    {
        return in_array('*', $user->getRights(), true);
    }


    /**
     * Returns the array of rights grouped by plugin names.
     * This method assumes that every right starts with the plugin name followed by a dot.
     *
     * If the rights contains the root right (*), then the returned array will only contain the root right.
     *
     *
     *
     * @param array $rights
     * @param bool $keepPluginName
     * @return array
     */
    public static function getGroupedRights(array $rights, bool $keepPluginName = false): array
    {
        $plugins = [];
        foreach ($rights as $right) {

            if ('*' === $right) {
                $plugins = ["*"];
                break;
            }

            $p = explode('.', $right, 2);
            $pluginName = $p[0];
            if (false === array_key_exists($pluginName, $plugins)) {
                $plugins[$pluginName] = [];
            }

            if (false === $keepPluginName) {
                $plugins[$pluginName][] = $p[1];
            } else {
                $plugins[$pluginName][] = $pluginName;
            }

        }
        return $plugins;

    }
}