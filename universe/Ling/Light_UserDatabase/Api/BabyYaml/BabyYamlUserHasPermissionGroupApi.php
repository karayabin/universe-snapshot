<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;

use Ling\Light_UserDatabase\Api\UserHasPermissionGroupApiInterface;

/**
 * The BabyYamlUserHasPermissionGroupApi class.
 */
class BabyYamlUserHasPermissionGroupApi implements UserHasPermissionGroupApiInterface
{
    /**
     * @implementation
     */
    public function getUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false)
    {
        // TODO: Implement getUserHasPermissionGroupByUserIdAndPermissionGroupId() method.
    }

    /**
     * @implementation
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup)
    {
        // TODO: Implement updateUserHasPermissionGroupByUserIdAndPermissionGroupId() method.
    }

    /**
     * @implementation
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        // TODO: Implement insertUserHasPermissionGroup() method.
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id)
    {
        // TODO: Implement deleteUserHasPermissionGroupByUserIdAndPermissionGroupId() method.
    }

}