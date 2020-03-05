<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\Light_UserDatabase\Api\Mysql\Interfaces\UserHasPermissionGroupApiInterface;



/**
 * The UserHasPermissionGroupApi class.
 */
class UserHasPermissionGroupApi extends MysqlBaseLightUserDatabaseApi implements UserHasPermissionGroupApiInterface
{


    /**
     * Builds the UserHasPermissionGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_user_has_permission_group";
    }




    /**
     * @implementation
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 
        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $userHasPermissionGroup);
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

                $query = "select user_id, permission_group_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userHasPermissionGroup);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'user_id' => $res["user_id"],
				'permission_group_id' => $res["permission_group_id"],

                ];
            }
            throw $e;
        }
        return false;
    }

    /**
     * @implementation
     */
    public function getUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where user_id=:user_id and permission_group_id=:permission_group_id", [
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
    public function getUserHasPermissionGroup($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);


        $ret = $this->pdoWrapper->fetch($q, $markers);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                $e = new \RuntimeException("Row not found, inspect the exception for more details.");
                $e->where = $where;
                $e->q = $q;
                $e->markers = $markers;
                throw $e;
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }



    /**
     * @implementation
     */
    public function getUserHasPermissionGroups($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }






    /**
     * @implementation
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup)
    { 
        $this->pdoWrapper->update($this->table, $userHasPermissionGroup, [
            "user_id" => $user_id,
			"permission_group_id" => $permission_group_id,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "user_id" => $user_id,
			"permission_group_id" => $permission_group_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserId(int $user_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "user_id" => $user_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByPermissionGroupId(int $permission_group_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "permission_group_id" => $permission_group_id,

        ]);
    }






}
