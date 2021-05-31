<?php


namespace Ling\Light_Kit_Admin\Helper;


use Ling\Light_UserDatabase\Service\LightUserDatabaseService;

/**
 * The LightKitAdminPermissionHelper class.
 */
class LightKitAdminPermissionHelper
{


    /**
     * Binds the permissions of the given $srcPlanetDotName to the main lka permission groups.
     *
     * The srcPlanetDotName is the name of the @page(light kit admin' source plugin).
     *
     *
     * Note: the main lka permission groups are:
     * - Ling.Light_Kit_Admin.admin
     * - Ling.Light_Kit_Admin.user
     *
     *
     * @param LightUserDatabaseService $userDb
     * @param string $srcPlanetDotName
     * @throws \Exception
     */
    public static function bindStandardLightPermissionsToLkaPermissionGroups(LightUserDatabaseService $userDb, string $srcPlanetDotName)
    {

        $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
        $permApi = $userDb->getFactory()->getPermissionApi();
        $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.admin", null, true);
        $groupUserId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.user", null, true);


        $adminId = $permApi->getPermissionIdByName("$srcPlanetDotName.admin", null, true);
        $userId = $permApi->getPermissionIdByName("$srcPlanetDotName.user", null, true);


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


    /**
     * Unbinds the permissions of the given $srcPlanetDotName from the main lka permission groups.
     *
     * The basePluginName is the name of the @page(light kit admin' source plugin).
     *
     *
     * Note: the main lka permission groups are:
     * - Ling.Light_Kit_Admin.admin
     * - Ling.Light_Kit_Admin.user
     *
     *
     * @param LightUserDatabaseService $userDb
     * @param string $srcPlanetDotName
     * @throws \Exception
     */
    public static function unbindStandardLightPermissionsToLkaPermissionGroups(LightUserDatabaseService $userDb, string $srcPlanetDotName)
    {

        $permGroupApi = $userDb->getFactory()->getPermissionGroupApi();
        $permApi = $userDb->getFactory()->getPermissionApi();
        $groupAdminId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.admin");
        $groupUserId = $permGroupApi->getPermissionGroupIdByName("Ling.Light_Kit_Admin.user");


        $adminId = $permApi->getPermissionIdByName("$srcPlanetDotName.admin");
        $userId = $permApi->getPermissionIdByName("$srcPlanetDotName.user");


        $api = $userDb->getFactory()->getPermissionGroupHasPermissionApi();

        if (null !== $groupAdminId) {
            if (null !== $adminId) {
                $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $adminId);
            }
            if (null !== $userId) {
                $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupAdminId, $userId);
            }
        }
        if (null !== $groupUserId && null !== $userId) {
            $api->deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId($groupUserId, $userId);
        }


    }
}