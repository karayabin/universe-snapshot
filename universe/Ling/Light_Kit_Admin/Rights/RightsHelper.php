<?php


namespace Ling\Light_Kit_Admin\Rights;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Admin\Exception\LightKitAdminException;
use Ling\Light_MicroPermission\Service\LightMicroPermissionService;
use Ling\Light_UserDatabase\LightWebsiteUserDatabaseInterface;
use Ling\Light_UserManager\Service\LightUserManagerService;

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
     * Returns whether the current user has the given permission.
     *
     * @param LightServiceContainerInterface $container
     * @param string $permission
     * @return bool
     * @throws \Exception
     */
    public static function hasPermission(LightServiceContainerInterface $container, string $permission): bool
    {
        /**
         * @var $man LightUserManagerService
         */
        $man = $container->get("user_manager");
        $user = $man->getUser();
        if ($user->isValid()) {
            return $user->hasRight($permission);
        }
        return false;
    }

    /**
     * Checks that the current user has the given permission, and throws an exception if that's not the case.
     *
     * @param LightServiceContainerInterface $container
     * @param string $permission
     * @throws \Exception
     */
    public static function checkPermission(LightServiceContainerInterface $container, string $permission)
    {
        if (false === self::hasPermission($container, $permission)) {
            throw new LightKitAdminException("Permission denied: you need the \"$permission\" to perform this action.");
        }
    }


    /**
     * Returns whether the current user has the given micro-permission.
     *
     * @param LightServiceContainerInterface $container
     * @param string $permission
     * @return bool
     * @throws \Exception
     */
    public static function hasMicroPermission(LightServiceContainerInterface $container, string $permission): bool
    {
        /**
         * @var $mp LightMicroPermissionService
         */
        $mp = $container->get("micro_permission");
        return $mp->hasMicroPermission($permission);
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