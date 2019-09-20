<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;

use Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface;

/**
 * The BabyYamlPermissionGroupHasPermissionApi class.
 */
class BabyYamlPermissionGroupHasPermissionApi extends BabyYamlBaseApi implements PermissionGroupHasPermissionApiInterface
{

    /**
     * Builds the BabyYamlPermissionGroupHasPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "permission_group_has_permission";
        $this->ric = ['permission_group_id', "permission_id"];
    }


    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->getItemByKey([
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,
        ], $default, $throwNotFoundEx);
    }

    /**
     * @implementation
     */
    public function updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission)
    {
        $db = $this->getBabyYamlDatabase();
        return $db->updateItemByKey($this->table, [
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,
        ], $permissionGroupHasPermission);
    }

    /**
     * @implementation
     */
    public function insertPermissionGroupHasPermission(array $permissionGroupHasPermission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->insertItem($permissionGroupHasPermission, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id)
    {
        $db = $this->getBabyYamlDatabase();
        return $db->deleteItemByKey($this->table, [
            "permission_group_id" => $permission_group_id,
            "permission_id" => $permission_id,
        ]);
    }

}