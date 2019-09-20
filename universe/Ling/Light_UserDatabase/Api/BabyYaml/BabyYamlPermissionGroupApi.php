<?php


namespace Ling\Light_UserDatabase\Api\BabyYaml;


use Ling\Light_UserDatabase\Api\PermissionGroupApiInterface;


/**
 * The BabyYamlPermissionGroupApi class.
 */
class BabyYamlPermissionGroupApi extends BabyYamlBaseApi implements PermissionGroupApiInterface
{

    /**
     * Builds the BabyYamlPermissionGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "permission_group";
        $this->ric = ['id'];
        $this->autoIncrementedKey = 'id';
    }


    /**
     * @implementation
     */
    public function getPermissionGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        return $this->getItemByKey([
            "id" => $id,
        ], $default, $throwNotFoundEx);
    }

    /**
     * @implementation
     */
    public function updatePermissionGroupById(int $id, array $permissionGroup)
    {
        $db = $this->getBabyYamlDatabase();
        return $db->updateItemByKey($this->table, [
            "id" => $id,
        ], $permissionGroup);
    }

    /**
     * @implementation
     */
    public function insertPermissionGroup(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        return $this->insertItem($permissionGroup, $ignoreDuplicate, $returnRic);
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupById(int $id)
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
    public function getPermissionGroupIdByName(string $name)
    {
        return $this->getItemByKey([
            "name" => $name,
        ], false);
    }



}