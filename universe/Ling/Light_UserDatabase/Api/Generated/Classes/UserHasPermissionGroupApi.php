<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\UserHasPermissionGroupApiInterface;



/**
 * The UserHasPermissionGroupApi class.
 */
class UserHasPermissionGroupApi extends CustomLightUserDatabaseBaseApi implements UserHasPermissionGroupApiInterface
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

        $errorInfo = null;



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
            $errorInfo = $e->errorInfo;
        } catch (SimplePdoWrapperQueryException $e) {
            $errorInfo = $e->getPrevious()->errorInfo;
        }


        if (null !== $errorInfo) {
            if ('23000' === $errorInfo[0]) {
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
    public function insertUserHasPermissionGroups(array $userHasPermissionGroups, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($userHasPermissionGroups as $userHasPermissionGroup) {
            $res = $this->insertUserHasPermissionGroup($userHasPermissionGroup, $ignoreDuplicate, $returnRic);
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
    public function getUserHasPermissionGroupsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getUserHasPermissionGroupsColumns($columns, $where, array $markers = [])
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
    public function getUserHasPermissionGroupsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }










    /**
     * @implementation
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $userHasPermissionGroup, array_merge([
            "user_id" => $user_id,
			"permission_group_id" => $permission_group_id,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updateUserHasPermissionGroup(array $userHasPermissionGroup, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $userHasPermissionGroup, $where, $markers);
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
    public function deleteUserHasPermissionGroupByUserIds(array $user_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("user_id")->in($user_ids));
    }

    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByPermissionGroupIds(array $permission_group_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("permission_group_id")->in($permission_group_ids));
    }




    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByUserId(int $userId)
    {
        $this->pdoWrapper->delete($this->table, [
            "user_id" => $userId,
        ]);
    }
    /**
     * @implementation
     */
    public function deleteUserHasPermissionGroupByPermissionGroupId(int $permissionGroupId)
    {
        $this->pdoWrapper->delete($this->table, [
            "permission_group_id" => $permissionGroupId,
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
