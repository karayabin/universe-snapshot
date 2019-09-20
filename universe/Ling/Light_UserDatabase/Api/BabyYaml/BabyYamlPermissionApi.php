<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;


use Ling\Bat\ArrayTool;
use Ling\Light_UserDatabase\Api\PermissionApiInterface;


/**
 * The BabyYamlPermissionApi class.
 */
class BabyYamlPermissionApi extends BabyYamlBaseApi implements PermissionApiInterface
{
    /**
     * Builds the BabyYamlPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "permission";
        $this->ric = ['id'];
        $this->autoIncrementedKey = 'id';
    }


    /**
     * @implementation
     */
    public function getPermissionById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->getItemByKey([
            "id" => $id,
        ], $default, $throwNotFoundEx);
    }

    /**
     * @implementation
     */
    public function updatePermissionById(int $id, array $permission)
    {
        $db = $this->getBabyYamlDatabase();
        return $db->updateItemByKey($this->table, [
            "id" => $id,
        ], $permission);
    }

    /**
     * @implementation
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->insertItem($permission, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function deletePermissionById(int $id)
    {
        $db = $this->getBabyYamlDatabase();
        return $db->deleteItemByKey($this->table, [
            "id" => $id,
        ]);
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * @implementation
     */
    public function getPermissionNamesByUserId(int $id): array
    {
        $db = $this->getBabyYamlDatabase();
        $uhpg = $db->getItemsByKey("user_has_permission_group", [
            "user_id" => $id,
        ]);
        $pgIds = ArrayTool::reduce($uhpg, "permission_group_id");
        $pghp = $db->getItemsByKey("permission_group_has_permission", [
            "permission_group_id" => ['in', $pgIds],
        ]);
        $pIds = ArrayTool::reduce($pghp, "permission_id");
        $permissions = $db->getItemsByKey("permission", [
            "id" => ['in', $pIds],
        ]);
        return ArrayTool::reduce($permissions, "name");
    }


}