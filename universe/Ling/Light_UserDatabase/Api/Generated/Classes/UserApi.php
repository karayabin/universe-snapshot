<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\UserApiInterface;



/**
 * The UserApi class.
 */
class UserApi extends CustomLightUserDatabaseBaseApi implements UserApiInterface
{


    /**
     * Builds the UserApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_user";
    }






    /**
     * @implementation
     */
    public function insertUser(array $user, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $user);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $user);
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
    public function insertUsers(array $users, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($users as $user) {
            $res = $this->insertUser($user, $ignoreDuplicate, $returnRic);
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
    public function fetchAll(array $components = []): array
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetchAll($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     */
    public function fetch(array $components = [])
    {
        $markers = [];
        $q = '';
        $options = $this->fetchRoutine($q, $markers, $components);
        $fetchStyle = null;
        if (true === $options['singleColumn']) {
            $fetchStyle = \PDO::FETCH_COLUMN;
        }
        return $this->pdoWrapper->fetch($q, $markers, $fetchStyle);
    }

    /**
     * @implementation
     */
    public function getUserById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getUserByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where identifier=:identifier", [
            "identifier" => $identifier,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with identifier=$identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getUser($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getUsers($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getUsersColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getUsersColumns($columns, $where, array $markers = [])
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
    public function getUsersKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getUserIdByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select id from `$this->table` where identifier=:identifier", [
            "identifier" => $identifier,


        ], \PDO::FETCH_COLUMN);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with identifier=$identifier.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }





    /**
     * @implementation
     */
    public function getUsersByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
        where h.permission_group_id=:permission_group_id


        ", [
            ":permission_group_id" => $permissionGroupId,
        ]);
    }

    /**
     * @implementation
     */
    public function getUsersByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
        where h.permission_group_id=:permission_group_id


        ", [
            ":permission_group_name" => $permissionGroupName,
        ]);
    }



    /**
     * @implementation
     */
    public function getUserIdsByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.id=:permission_group_id
        ", [
            ":permission_group_id" => $permissionGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getUserIdsByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.name=:permission_group_name
        ", [
            ":permission_group_name" => $permissionGroupName,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getUserIdentifiersByPermissionGroupId(string $permissionGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.identifier from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
        inner join lud_permission_group b on b.id=h.permission_group_id
        where b.id=:permission_group_id
        ", [
            ":permission_group_id" => $permissionGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getUserIdentifiersByPermissionGroupName(string $permissionGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.identifier from `$this->table` a
        inner join lud_user_has_permission_group h on h.user_id=a.id
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
    public function updateUserById(int $id, array $user, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $user, array_merge([
            "id" => $id,

        ], $extraWhere), $markers);
    }

    /**
     * @implementation
     */
    public function updateUserByIdentifier(string $identifier, array $user, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $user, array_merge([
            "identifier" => $identifier,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updateUser(array $user, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $user, $where, $markers);
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
    public function deleteUserById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserByIdentifier(string $identifier)
    {
        $this->pdoWrapper->delete($this->table, [
            "identifier" => $identifier,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteUserByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deleteUserByIdentifiers(array $identifiers)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("identifier")->in($identifiers));
    }




    /**
     * @implementation
     */
    public function deleteUserByUserGroupId(int $userGroupId)
    {
        $this->pdoWrapper->delete($this->table, [
            "user_group_id" => $userGroupId,
        ]);
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Appends the given components to the given query, and returns an array of options.
     *
     * The options are:
     *
     * - singleColumn: bool, whether the singleColumn mode was triggered with the Columns component
     *
     *
     * @param string $q
     * @param array $markers
     * @param array $components
     * @return array
     * @throws \Exception
     */
    private function fetchRoutine(string &$q, array &$markers, array $components): array
    {
        $sWhere = '';
        $sCols = '';
        $sOrderBy = '';
        $sLimit = '';
        $singleColumn = false;

        foreach ($components as $component) {
            if ($component instanceof Columns) {
                $component->apply($sCols);
                $mode = $component->getMode();
                if ('singleColumn' === $mode) {
                    $singleColumn = true;
                }
            } elseif ($component instanceof Where) {
                SimplePdoWrapper::addWhereSubStmt($sWhere, $markers, $component);
            } elseif ($component instanceof OrderBy) {
                $sOrderBy .= PHP_EOL . ' ORDER BY ';
                $component->apply($sOrderBy);
            } elseif ($component instanceof Limit) {
                $sOrderBy .= PHP_EOL . ' LIMIT ';
                $component->apply($sOrderBy);
            }
        }


        if ('' === $sCols) {
            $sCols = '*';
        }


        $q = "select $sCols from `$this->table`";
        if ($sWhere) {
            $q .= $sWhere;
        }
        if ($sOrderBy) {
            $q .= $sOrderBy;
        }
        if ($sLimit) {
            $q .= $sLimit;
        }


        return [
            'singleColumn' => $singleColumn,
        ];
    }


}
