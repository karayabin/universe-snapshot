<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupApiInterface;



/**
 * The PermissionGroupApi class.
 */
class PermissionGroupApi extends CustomLightUserDatabaseBaseApi implements PermissionGroupApiInterface
{


    /**
     * Builds the PermissionGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_permission_group";
    }




    /**
     * @implementation
     */
    public function insertPermissionGroup(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $permissionGroup);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'id' => $lastInsertId,

            ];
            return $ric;

        } catch (\PDOException $e) {
            $errorInfo = $e->errorInfo;
        } catch (SimplePdoWrapperQueryException $e) {
            $errorInfo = $e->getPrevious()->errorInfo;
        }


        if (null !== $errorInfo) {
            if ('23000' === $errorInfo[0]) {
                if (false === $ignoreDuplicate) {
                    throw $e;
                }

                $query = "select id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permissionGroup);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return $res['id'];
                }
                return [
                    'id' => $res["id"],

                ];
            }
            throw $e;
        }

        return false;
    }

    /**
     * @implementation
     */
    public function insertPermissionGroups(array $permissionGroups, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($permissionGroups as $permissionGroup) {
            $res = $this->insertPermissionGroup($permissionGroup, $ignoreDuplicate, $returnRic);
            if (false === $res) {
                return false;
            }
            $ret[] = $res;
        }
        return $ret;
    }

    /**
     * @implementation
     */
    public function getPermissionGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where id=:id", [
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
    public function getPermissionGroupByName(string $name, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where name=:name", [
            "name" => $name,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getPermissionGroup($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getPermissionGroups($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupsColumns($columns, $where, array $markers = [])
    {
        $sCols = $columns;
        if (is_array($sCols)) {
            $sCols = '`' . implode("`,`", $columns) . '`';
        }
        $q = "select $sCols  from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupIdByName(string $name, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where name=:name", [
            "name" => $name,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with name=$name.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }





    /**
     * @implementation
     */
    public function getPermissionGroupsByUserId(string $userId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        where h.user_id=:user_id


        ", [
            ":user_id" => $userId,
        ]);
    }

    /**
     * @implementation
     */
    public function getPermissionGroupsByUserIdentifier(string $userIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        where h.user_id=:user_id


        ", [
            ":user_identifier" => $userIdentifier,
        ]);
    }



    /**
     * @implementation
     */
    public function getPermissionGroupIdsByUserId(string $userId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        inner join lud_user b on b.id=h.user_id
        where b.id=:user_id
        ", [
            ":user_id" => $userId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionGroupIdsByUserIdentifier(string $userIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        inner join lud_user b on b.id=h.user_id
        where b.identifier=:user_identifier
        ", [
            ":user_identifier" => $userIdentifier,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionGroupNamesByUserId(string $userId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        inner join lud_user b on b.id=h.user_id
        where b.id=:user_id
        ", [
            ":user_id" => $userId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionGroupNamesByUserIdentifier(string $userIdentifier): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_user_has_permission_group h on h.permission_group_id=a.id
        inner join lud_user b on b.id=h.user_id
        where b.identifier=:user_identifier
        ", [
            ":user_identifier" => $userIdentifier,
        ], \PDO::FETCH_COLUMN);
    }



    /**
     * @implementation
     */
    public function getAllIds(): array
    { 
         return $this->pdoWrapper->fetchAll("select id from `$this->table`", [], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function updatePermissionGroupById(int $id, array $permissionGroup)
    { 
        $this->pdoWrapper->update($this->table, $permissionGroup, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updatePermissionGroupByName(string $name, array $permissionGroup)
    { 
        $this->pdoWrapper->update($this->table, $permissionGroup, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function delete($where = null, array $markers = [])
    {
        return $this->pdoWrapper->delete($this->table, $where, $markers);

    }

    /**
     * @implementation
     */
    public function deletePermissionGroupById(int $id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupByName(string $name)
    { 
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function deletePermissionGroupByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupByNames(array $names)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("name")->in($names));
    }






}
