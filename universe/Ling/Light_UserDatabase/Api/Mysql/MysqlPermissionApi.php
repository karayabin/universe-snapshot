<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlPermissionApi class.
 */
class MysqlPermissionApi implements PermissionApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the PermissionApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }


    /**
     * @implementation
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_permission", $permission);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,
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
    public function getPermissionById(int $id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from user where id=:id", [
            "id" => $id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with id=$id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function updatePermissionById(int $id, array $permission)
    {
        $this->pdoWrapper->update("lud_permission", $permission, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionById(int $id)
    {
        $this->pdoWrapper->delete("lud_permission", [
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
        $ret = $this->pdoWrapper->fetchAll("
        
        select p.name from lud_user u
        inner join lud_user_has_permission_group uhg on uhg.user_id=u.id
        inner join lud_permission_group_has_permission php on php.permission_group_id=uhg.permission_group_id
        inner join lud_permission p on p.id=php.permission_id
         where u.id=:id", [
            "id" => $id,
        ], \PDO::FETCH_COLUMN);
        return $ret;
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
