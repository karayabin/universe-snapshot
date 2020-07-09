<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The PluginOptionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PluginOptionApiInterface
{

    /**
     * Inserts the given pluginOption in the database.
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
     * @param array $pluginOption
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPluginOption(array $pluginOption, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given pluginOption rows in the database.
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
     * @param array $pluginOptions
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPluginOptions(array $pluginOptions, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the pluginOption row identified by the given id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getPluginOptionById(int $id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the pluginOption row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPluginOption($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPluginOptions($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the pluginOption rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPluginOptionsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPluginOptionsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the pluginOption rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPluginOptionsKey2Value(string $key, string $value, $where, array $markers = []);




    /**
     * Returns the rows of the lud_plugin_option table bound to the given user_group id.
     * @param string $userGroupId
     * @return array
     */
    public function getPluginOptionsByUserGroupId(string $userGroupId): array;

    /**
     * Returns the rows of the lud_plugin_option table bound to the given user_group name.
     * @param string $userGroupName
     * @return array
     */
    public function getPluginOptionsByUserGroupName(string $userGroupName): array;



    /**
     * Returns an array of lud_plugin_option.id bound to the given user_group id.
     * @param string $userGroupId
     * @return array
     */
    public function getPluginOptionIdsByUserGroupId(string $userGroupId): array;


    /**
     * Returns an array of lud_plugin_option.id bound to the given user_group name.
     * @param string $userGroupName
     * @return array
     */
    public function getPluginOptionIdsByUserGroupName(string $userGroupName): array;


    /**
     * Returns an array of lud_plugin_option.name bound to the given user_group id.
     * @param string $userGroupId
     * @return array
     */
    public function getPluginOptionNamesByUserGroupId(string $userGroupId): array;


    /**
     * Returns an array of lud_plugin_option.name bound to the given user_group name.
     * @param string $userGroupName
     * @return array
     */
    public function getPluginOptionNamesByUserGroupName(string $userGroupName): array;




    /**
     * Returns an array of all pluginOption ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the pluginOption row identified by the given id.
     *
     * @param int $id
     * @param array $pluginOption
     * @return void
     * @throws \Exception
     */
    public function updatePluginOptionById(int $id, array $pluginOption);



    /**
     * Deletes the pluginOption rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the pluginOption identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePluginOptionById(int $id);



    /**
     * Deletes the pluginOption rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deletePluginOptionByIds(array $ids);



}
