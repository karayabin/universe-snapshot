<?php


namespace Ling\Light_Kit_Admin\Helper;


use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The LightKitAdminPermissionHelper class.
 */
class LightKitAdminPermissionHelper
{


    /**
     * Binds the permissions of the given basePluginName to the main lka permission groups.
     *
     * The basePluginName is the name of the @page(light kit admin' source plugin).
     *
     *
     * Note: the main lka permission groups are:
     * - Light_Kit_Admin.admin
     * - Light_Kit_Admin.user
     *
     *
     * @param LightUserDatabaseService $userDb
     * @param string $basePluginName
     * @throws \Exception
     */
    public static function bindStandardLightPermissionsToLkaPermissionGroups(LightUserDatabaseService $userDb, string $basePluginName)
    {

        $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
        $permApi = $userDb->getFactory()->getPermissionApi();
        $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Light_Kit_Admin.admin", null, true);
        $groupUserId = $permGroupApi->getPermissionGroupIdByName("Light_Kit_Admin.user", null, true);


        $adminId = $permApi->getPermissionIdByName("$basePluginName.admin", null, true);
        $userId = $permApi->getPermissionIdByName("$basePluginName.user", null, true);


        $userDb->getFactory()->getPermissionGroupHasPermissionApi()->insertPermissionGroupHasPermissions([
            [
                'permission_group_id' => $groupAdminId,
                'permission_id' => $adminId,
            ],
            [
                'permission_group_id' => $groupAdminId,
                'permission_id' => $userId,
            ],
            [
                'permission_group_id' => $groupUserId,
                'permission_id' => $userId,
            ],
        ]);
    }
}