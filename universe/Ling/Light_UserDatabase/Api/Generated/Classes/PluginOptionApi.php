<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\PluginOptionApiInterface;



/**
 * The PluginOptionApi class.
 */
class PluginOptionApi extends CustomLightUserDatabaseBaseApi implements PluginOptionApiInterface
{


    /**
     * Builds the PluginOptionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_plugin_option";
    }




    /**
     * @implementation
     */
    public function insertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $pluginOption);
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
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $pluginOption);
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
    public function insertPluginOptions(array $pluginOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($pluginOptions as $pluginOption) {
            $res = $this->insertPluginOption($pluginOption, $ignoreDuplicate, $returnRic);
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
    public function getPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false)
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
    public function getPluginOption($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getPluginOptions($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getPluginOptionsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getPluginOptionsColumns($columns, $where, array $markers = [])
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
    public function getPluginOptionsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }




    /**
     * @implementation
     */
    public function getPluginOptionsByUserGroupId(string $userGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        where h.user_group_id=:user_group_id


        ", [
            ":user_group_id" => $userGroupId,
        ]);
    }

    /**
     * @implementation
     */
    public function getPluginOptionsByUserGroupName(string $userGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.* from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        where h.user_group_id=:user_group_id


        ", [
            ":user_group_name" => $userGroupName,
        ]);
    }



    /**
     * @implementation
     */
    public function getPluginOptionIdsByUserGroupId(string $userGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        inner join lud_user_group b on b.id=h.user_group_id
        where b.id=:user_group_id
        ", [
            ":user_group_id" => $userGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPluginOptionIdsByUserGroupName(string $userGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.id from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        inner join lud_user_group b on b.id=h.user_group_id
        where b.name=:user_group_name
        ", [
            ":user_group_name" => $userGroupName,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPluginOptionNamesByUserGroupId(string $userGroupId): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        inner join lud_user_group b on b.id=h.user_group_id
        where b.id=:user_group_id
        ", [
            ":user_group_id" => $userGroupId,
        ], \PDO::FETCH_COLUMN);
    }

    /**
     * @implementation
     */
    public function getPluginOptionNamesByUserGroupName(string $userGroupName): array
    {
        return $this->pdoWrapper->fetchAll("
        select a.name from `$this->table` a
        inner join lud_user_group_has_plugin_option h on h.plugin_option_id=a.id
        inner join lud_user_group b on b.id=h.user_group_id
        where b.name=:user_group_name
        ", [
            ":user_group_name" => $userGroupName,
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
    public function updatePluginOptionById(int $id, array $pluginOption)
    { 
        $this->pdoWrapper->update($this->table, $pluginOption, [
            "id" => $id,

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
    public function deletePluginOptionById(int $id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "id" => $id,

        ]);
    }



    /**
     * @implementation
     */
    public function deletePluginOptionByIds(array $ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("id")->in($ids));
    }






}
