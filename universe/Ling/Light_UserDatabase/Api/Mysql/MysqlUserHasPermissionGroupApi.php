<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\UserHasPermissionGroupApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlUserHasPermissionGroupApi class.
 */
class MysqlUserHasPermissionGroupApi implements UserHasPermissionGroupApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the UserHasPermissionGroupApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }




    /**
     * @implementation
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_user_has_permission_group", $userHasPermissionGroup);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'user_id' => $userHasPermissionGroup["user_id"],
				'permission_group_id' => $userHasPermissionGroup["permission_group_id"],

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
    public function getUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from user where user_id=:user_id and permission_group_id=:permission_group_id", [
            "user_id" => $user_id,
				"permission_group_id" => $permission_group_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with user_id=$user_id, permission_group_id=$permission_group_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup)
    {
        $this->pdoWrapper->update("lud_user_has_permission_group", $userHasPermissionGroup, [
            "user_id" => $user_id,
			"permission_group_id" => $permission_group_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id)
    {
        $this->pdoWrapper->delete("lud_user_has_permission_group", [
            "user_id" => $user_id,
			"permission_group_id" => $permission_group_id,

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
