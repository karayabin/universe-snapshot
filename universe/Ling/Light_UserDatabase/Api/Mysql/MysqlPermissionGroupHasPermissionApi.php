<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionGroupHasPermissionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlPermissionGroupHasPermissionApi class.
 */
class MysqlPermissionGroupHasPermissionApi implements PermissionGroupHasPermissionApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the PermissionGroupHasPermissionApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }




    /**
     * @implementation
     */
    public function insertPermissionGroupHasPermission(array $permissionGroupHasPermission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_permission_group_has_permission", $permissionGroupHasPermission);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'permission_group_id' => $permissionGroupHasPermission["permission_group_id"],
				'permission_id' => $permissionGroupHasPermission["permission_id"],

            ];
            return $ric;

        } catch (\PDOException $e) {
            if ('23000' === $e->errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }
            }
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from user where permission_group_id=:permission_group_id and permission_id=:permission_id", [
            "permission_group_id" => $permission_group_id,
				"permission_id" => $permission_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with permission_group_id=$permission_group_id, permission_id=$permission_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission)
    {
        $this->pdoWrapper->update("lud_permission_group_has_permission", $permissionGroupHasPermission, [
            "permission_group_id" => $permission_group_id,
			"permission_id" => $permission_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id)
    {
        $this->pdoWrapper->delete("lud_permission_group_has_permission", [
            "permission_group_id" => $permission_group_id,
			"permission_id" => $permission_id,

        ]);
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Sets the pdoWrapper.
     *
     * @param SimplePdoWrapperInterface $pdoWrapper
     */
    public function setPdoWrapper(SimplePdoWrapperInterface $pdoWrapper)
    {
        $this->pdoWrapper = $pdoWrapper;
    }
}
