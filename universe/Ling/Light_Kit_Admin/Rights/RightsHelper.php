<?php


namespace Ling\Light_Kit_Admin\Rights;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;

/**
 * The RightsHelper class.
 */
class RightsHelper
{


    /**
     * Returns whether the current (website) user is root.
     *
     * @param LightServiceContainerInterface $container
     * @return bool
     * @throws \Exception
     */
    public static function isRoot(LightServiceContainerInterface $container): bool
    {
        /**
         * @var $user LightWebsiteUserDatabaseInterface
         */
        $user = $container->get('user_manager')->getUser();
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