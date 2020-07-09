<?php


namespace Ling\Light_UserDatabase\Api\Generated\Classes;

use Ling\SimplePdoWrapper\SimplePdoWrapper;
use Ling\SimplePdoWrapper\Util\Where;
use Ling\SimplePdoWrapper\Exception\SimplePdoWrapperQueryException;
use Ling\Light_UserDatabase\Api\Custom\Classes\CustomLightUserDatabaseBaseApi;
use Ling\Light_UserDatabase\Api\Generated\Interfaces\UserGroupHasPluginOptionApiInterface;



/**
 * The UserGroupHasPluginOptionApi class.
 */
class UserGroupHasPluginOptionApi extends CustomLightUserDatabaseBaseApi implements UserGroupHasPluginOptionApiInterface
{


    /**
     * Builds the UserGroupHasPluginOptionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "lud_user_group_has_plugin_option";
    }




    /**
     * @implementation
     */
    public function insertUserGroupHasPluginOption(array $userGroupHasPluginOption, bool $ignoreDuplicate = true, bool $returnRic = false)
    { 

        $errorInfo = null;



        try {

            $lastInsertId = $this->pdoWrapper->insert($this->table, $userGroupHasPluginOption);
            if (false === $returnRic) {
                return $lastInsertId;
            }
            $ric = [
                'user_group_id' => $userGroupHasPluginOption["user_group_id"],
				'plugin_option_id' => $userGroupHasPluginOption["plugin_option_id"],

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

                $query = "select user_group_id, plugin_option_id from `$this->table`";
                $allMarkers = [];
                SimplePdoWrapper::addWhereSubStmt($query, $allMarkers, $userGroupHasPluginOption);
                $res = $this->pdoWrapper->fetch($query, $allMarkers);
                if (false === $res) {
                    throw new \LogicException("A duplicate entry has been found, but yet I cannot fetch it, why?");
                }
                if (false === $returnRic) {
                    return "0";
                }
                return [
                    'user_group_id' => $res["user_group_id"],
				'plugin_option_id' => $res["plugin_option_id"],

                ];
            }
            throw $e;
        }

        return false;
    }

    /**
     * @implementation
     */
    public function insertUserGroupHasPluginOptions(array $userGroupHasPluginOptions, bool $ignoreDuplicate = true, bool $returnRic = false)
    {
        $ret = [];
        foreach ($userGroupHasPluginOptions as $userGroupHasPluginOption) {
            $res = $this->insertUserGroupHasPluginOption($userGroupHasPluginOption, $ignoreDuplicate, $returnRic);
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
    public function getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, $default = null, bool $throwNotFoundEx = false)
    { 
        $ret = $this->pdoWrapper->fetch("select * from `$this->table` where user_group_id=:user_group_id and plugin_option_id=:plugin_option_id", [
            "user_group_id" => $user_group_id,
				"plugin_option_id" => $plugin_option_id,

        ]);
        if (false === $ret) {
            if (true === $throwNotFoundEx) {
                throw new \RuntimeException("Row not found with user_group_id=$user_group_id, plugin_option_id=$plugin_option_id.");
            } else {
                $ret = $default;
            }
        }
        return $ret;
    }




    /**
     * @implementation
     */
    public function getUserGroupHasPluginOption($where, array $markers = [], $default = null, bool $throwNotFoundEx = false)
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
    public function getUserGroupHasPluginOptions($where, array $markers = [])
    {
        $q = "select * from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers);
    }


    /**
     * @implementation
     */
    public function getUserGroupHasPluginOptionsColumn(string $column, $where, array $markers = [])
    {
        $q = "select `$column` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN);
    }


    /**
     * @implementation
     */
    public function getUserGroupHasPluginOptionsColumns($columns, $where, array $markers = [])
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
    public function getUserGroupHasPluginOptionsKey2Value(string $key, string $value, $where, array $markers = [])
    {
        $q = "select `$key`, `$value` from `$this->table`";
        SimplePdoWrapper::addWhereSubStmt($q, $markers, $where);
        return $this->pdoWrapper->fetchAll($q, $markers, \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    }










    /**
     * @implementation
     */
    public function updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption)
    { 
        $this->pdoWrapper->update($this->table, $userGroupHasPluginOption, [
            "user_group_id" => $user_group_id,
			"plugin_option_id" => $plugin_option_id,

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
    public function deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "user_group_id" => $user_group_id,
			"plugin_option_id" => $plugin_option_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserGroupHasPluginOptionByUserGroupId(int $user_group_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "user_group_id" => $user_group_id,

        ]);
    }

    /**
     * @implementation
     */
    public function deleteUserGroupHasPluginOptionByPluginOptionId(int $plugin_option_id)
    { 
        $this->pdoWrapper->delete($this->table, [
            "plugin_option_id" => $plugin_option_id,

        ]);
    }



    /**
     * @implementation
     */
    public function deleteUserGroupHasPluginOptionByUserGroupIds(array $user_group_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("user_group_id")->in($user_group_ids));
    }

    /**
     * @implementation
     */
    public function deleteUserGroupHasPluginOptionByPluginOptionIds(array $plugin_option_ids)
    {
        $this->pdoWrapper->delete($this->table, Where::inst()->key("plugin_option_id")->in($plugin_option_ids));
    }






}
