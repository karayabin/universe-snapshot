<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\PermissionGroupHasPermissionApiInterface;



/**
 * The PermissionGroupHasPermissionApi class.
 */
class PermissionGroupHasPermissionApi extends CustomLightUserDatabaseBaseApi implements PermissionGroupHasPermissionApiInterface
{


    /**
     * Builds the PermissionGroupHasPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_permission_group_has_permission";
    }






    /**
     * @implementation
     */
    public function insertPermissionGroupHasPermission(array $permissionGroupHasPermission, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $permissionGroupHasPermission);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'permission_group_id' => $permissionGroupHasPermission["permission_group_id"],
				'permission_id' => $permissionGroupHasPermission["permission_id"],

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

                $query = "select permission_group_id, permission_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $permissionGroupHasPermission);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'permission_group_id' => $res["permission_group_id"],
				'permission_id' => $res["permission_id"],

                ];
            }
            throw $e;
        }

        return false;
    }

    /**
     * @implementation
     */
    public function insertPermissionGroupHasPermissions(array $permissionGroupHasPermissions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($permissionGroupHasPermissions as $permissionGroupHasPermission) {
            $res = $this->insertPermissionGroupHasPermission($permissionGroupHasPermission, $ignoreDuplicate, $returnRic);
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
    public function getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false)
    {
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where permission_group_id=:permission_group_id and permission_id=:permission_id", [
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
    public function getPermissionGroupHasPermission($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getPermissionGroupHasPermissions($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getPermissionGroupHasPermissionsColumns($columns, $where, array $markers = [])
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
    public function getPermissionGroupHasPermissionsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }










    /**
     * @implementation
     */
    public function updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $permissionGroupHasPermission, array_merge([
            "permission_group_id" => $permission_group_id,
			"permission_id" => $permission_id,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updatePermissionGroupHasPermission(array $permissionGroupHasPermission, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $permissionGroupHasPermission, $where, $markers);
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
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id)
    {
        $this->pdoWrapper->delete($this->table, [
            "permission_group_id" => $permission_group_id,
			"permission_id" => $permission_id,

        ]);
    }



    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIds(array $permission_group_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("permission_group_id")->in($permission_group_ids));
    }

    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionIds(array $permission_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("permission_id")->in($permission_ids));
    }




    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupId(int $permissionGroupId)
    {
        $this->pdoWrapper->delete($this->table, [
            "permission_group_id" => $permissionGroupId,
        ]);
    }
    /**
     * @implementation
     */
    public function deletePermissionGroupHasPermissionByPermissionId(int $permissionId)
    {
        $this->pdoWrapper->delete($this->table, [
            "permission_id" => $permissionId,
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
