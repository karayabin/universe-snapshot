<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionApiInterface;



/**
 * The PermissionApi class.
 */
class PermissionApi extends CustomLightUserDatabaseBaseApi implements PermissionApiInterface
{


    /**
     * Builds the PermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_permission";
    }




    /**
     * @implementation
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $permission);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permission);
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
    public function insertPermissions(array $permissions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($permissions as $permission) {
            $res = $this->insertPermission($permission, $ignoreDuplicate, $returnRic);
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
    public function getPermissionById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getPermissionByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function getPermission($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getPermissions($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getPermissionsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getPermissionsColumns($columns, $where, array $markers = [])
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
    public function getPermissionsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getPermissionIdByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function getPermissionsByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        where h.permission_group_id=:permission_group_id


        ", [
            ":permission_group_id" => $permissionGroupId,
        ]);
    }

    /**
     * @implementation
     */
    public function getPermissionsByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        where h.permission_group_id=:permission_group_id


        ", [
            ":permission_group_name" => $permissionGroupName,
        ]);
    }



    /**
     * @implementation
     */
    public function getPermissionIdsByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.id=:permission_group_id
        ", [
            ":permission_group_id" => $permissionGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionIdsByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.name=:permission_group_name
        ", [
            ":permission_group_name" => $permissionGroupName,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionNamesByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.id=:permission_group_id
        ", [
            ":permission_group_id" => $permissionGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPermissionNamesByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_permission_group_has_permission h on h.permission_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.name=:permission_group_name
        ", [
            ":permission_group_name" => $permissionGroupName,
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
    public function updatePermissionById(int $id, array $permission)
    { 
        $this->pdoWrapper->update($this->table, $permission, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function updatePermissionByName(string $name, array $permission)
    { 
        $this->pdoWrapper->update($this->table, $permission, [
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
    public function deletePermissionById(int $id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deletePermissionByName(string $name)
    { 
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function deletePermissionByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deletePermissionByNames(array $names)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("name")->in($names));
    }






}
