<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The UserGroupHasPluginOptionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserGroupHasPluginOptionApiInterface
{

    /**
     * Inserts the given userGroupHasPluginOption in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $userGroupHasPluginOption
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserGroupHasPluginOption(array $userGroupHasPluginOption, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given userGroupHasPluginOption rows in the database.
     * By default, it returns an array of the result of the PDO::lastInsertId method for each insert.
     * If the returnRic flag is set to true, the method will return an array of the ric array (for each insert) instead of the lastInsertId.
     *
     *
     * If the rows you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $userGroupHasPluginOptions
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserGroupHasPluginOptions(array $userGroupHasPluginOptions, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $user_group_id
	 * @param int $plugin_option_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the userGroupHasPluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param $where
     * @param array $markers
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return mixed
     * @throws \Exception
     */
    public function getUserGroupHasPluginOption($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptions($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the userGroupHasPluginOption rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptionsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     * That subset is an array containing the given $columns.
     * The columns parameter can be either an array or a string.
     * If it's an array, the column names will be escaped with back ticks.
     * If it's a string, no escaping will be done. This lets you write custom expression, such as using aliases for instance.
     *
     * In both cases, you shall pass the pdo markers when necessary.
     *
     *
     * @param array|string $columns
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptionsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the userGroupHasPluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserGroupHasPluginOptionsKey2Value(string $key, string $value, $where, array $markers = []);











    /**
     * Updates the userGroupHasPluginOption row identified by the given user_group_id and plugin_option_id.
     *
     * @param int $user_group_id
	 * @param int $plugin_option_id
     * @param array $userGroupHasPluginOption
     * @return void
     * @throws \Exception
     */
    public function updateUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id, array $userGroupHasPluginOption);



    /**
     * Deletes the userGroupHasPluginOption rows matching the given where conditions, and returns the number of deleted rows.
     * If where is null, all the rows of the table will be deleted.
     *
     * False might be returned in case of a problem and if you don't catch db exceptions.
     *
     *
     *
     * @param null $where
     * @param array $markers
     * @return false|int
     */
    public function delete($where = null, array $markers = []);

    /**
     * Deletes the userGroupHasPluginOption identified by the given user_group_id and plugin_option_id.
     *
     * @param int $user_group_id
	 * @param int $plugin_option_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByUserGroupIdAndPluginOptionId(int $user_group_id, int $plugin_option_id);

    /**
     * Deletes the userGroupHasPluginOption identified by the given user_group_id.
     *
     * @param int $user_group_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByUserGroupId(int $user_group_id);

    /**
     * Deletes the userGroupHasPluginOption identified by the given plugin_option_id.
     *
     * @param int $plugin_option_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByPluginOptionId(int $plugin_option_id);



    /**
     * Deletes the userGroupHasPluginOption rows identified by the given user_group_user_group_ids.
     *
     * @param array $user_group_ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByUserGroupIds(array $user_group_ids);

    /**
     * Deletes the userGroupHasPluginOption rows identified by the given plugin_option_plugin_option_ids.
     *
     * @param array $plugin_option_ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserGroupHasPluginOptionByPluginOptionIds(array $plugin_option_ids);



}
