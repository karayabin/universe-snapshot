<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\SimplePdoWrapper\Util\Columns;
use Ling\SimplePdoWrapper\Util\Limit;
use Ling\SimplePdoWrapper\Util\OrderBy;
use Ling\SimplePdoWrapper\Util\Where;

use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupApiInterface;



/**
 * The UserGroupApi class.
 */
class UserGroupApi extends CustomLightUserDatabaseBaseApi implements UserGroupApiInterface
{


    /**
     * Builds the UserGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_user_group";
    }






    /**
     * @implementation
     */
    public function insertUserGroup(array $userGroup, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $userGroup);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userGroup);
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
    public function insertUserGroups(array $userGroups, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($userGroups as $userGroup) {
            $res = $this->insertUserGroup($userGroup, $ignoreDuplicate, $returnRic);
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
    public function getUserGroupById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroupByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroup($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroups($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getUserGroupsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getUserGroupsColumns($columns, $where, array $markers = [])
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
    public function getUserGroupsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }


    /**
     * @implementation
     */
    public function getUserGroupIdByName(string $name, $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroupsByPluginOptionId(string $pluginOptionId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.user_group_id=a.id
        where h.plugin_option_id=:plugin_option_id


        ", [
            ":plugin_option_id" => $pluginOptionId,
        ]);
    }



    /**
     * @implementation
     */
    public function getUserGroupIdsByPluginOptionId(string $pluginOptionId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.user_group_id=a.id
        inner join lud_plugin_option b on b.id=h.plugin_option_id
        where b.id=:plugin_option_id
        ", [
            ":plugin_option_id" => $pluginOptionId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getUserGroupNamesByPluginOptionId(string $pluginOptionId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.user_group_id=a.id
        inner join lud_plugin_option b on b.id=h.plugin_option_id
        where b.id=:plugin_option_id
        ", [
            ":plugin_option_id" => $pluginOptionId,
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
    public function updateUserGroupById(int $id, array $userGroup, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $userGroup, array_merge([
            "id" => $id,

        ], $extraWhere), $markers);
    }

    /**
     * @implementation
     */
    public function updateUserGroupByName(string $name, array $userGroup, array $extraWhere = [], array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $userGroup, array_merge([
            "name" => $name,

        ], $extraWhere), $markers);
    }



    /**
     * @implementation
     */
    public function updateUserGroup(array $userGroup, $where = null, array $markers = [])
    {
        $this->pdoWrapper->update($this->table, $userGroup, $where, $markers);
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
    public function deleteUserGroupById(int $id)
    {
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserGroupByName(string $name)
    {
        $this->pdoWrapper->delete($this->table, [
            "name" => $name,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteUserGroupByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }

    /**
     * @implementation
     */
    public function deleteUserGroupByNames(array $names)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("name")->in($names));
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
