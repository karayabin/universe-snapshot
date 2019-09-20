<?php


namespace Ling\Light_UserDatabase\Api\Mysql;


use Ling\Light_UserDatabase\Api\PermissionGroupApiInterface;
use Ling\SimplePdoWrapper\SimplePdoWrapperInterface;

/**
 * The MysqlPermissionGroupApi class.
 */
class MysqlPermissionGroupApi implements PermissionGroupApiInterface
{

    /**
     * This property holds the pdoWrapper for this instance.
     * @var SimplePdoWrapperInterface
     */
    protected $pdoWrapper;

    /**
     * Builds the PermissionGroupApi instance.
     */
    public function __construct()
    {
        $this->pdoWrapper = null;
    }


    /**
     * @implementation
     */
    public function insertPermissionGroup(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        try {

            $lastInsertId = $this->pdoWrapper->insert("lud_permission_group", $permissionGroup);
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
    public function getPermissionGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function updatePermissionGroupById(int $id, array $permissionGroup)
    {
        $this->pdoWrapper->update("lud_permission_group", $permissionGroup, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupById(int $id)
    {
        $this->pdoWrapper->delete("lud_permission_group", [
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
        $ret = $this->pdoWrapper->fetch("select id from lud_user where name=:name", [
            "name" => $name,

        ]);
        if (false !== $ret) {
            $ret = (int)$ret;
        }
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
