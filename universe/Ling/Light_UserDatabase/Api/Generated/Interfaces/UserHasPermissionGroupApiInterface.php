<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The UserHasPermissionGroupApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserHasPermissionGroupApiInterface
{


    /**
     * Inserts the given user has permission group in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
     *
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the return of the method is not affected
     * - if false, the error will not be caught, and depending on your pdo configuration, it might either
     *          trigger an exception, or fail silently in which case this method returns false.
     *
     *
     *
     * @param array $userHasPermissionGroup
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given user has permission group rows in the database.
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
     * @param array $userHasPermissionGroups
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserHasPermissionGroups(array $userHasPermissionGroups, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the rows corresponding to given components.
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     *
     * @param array $components
     * @return array
     */
    public function fetchAll(array $components = []): array;


    /**
     *
     * Returns the first row corresponding to given components, or false if there is no match.
     *
     * The components is an array of [fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md).
     *
     * @param array $components
     * @return array
     */
    public function fetch(array $components = []);

    /**
     * Returns the user has permission group row identified by the given user_id and permission_group_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $user_id
	 * @param int $permission_group_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the userHasPermissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUserHasPermissionGroup($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserHasPermissionGroups($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the userHasPermissionGroup rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserHasPermissionGroupsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUserHasPermissionGroupsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the userHasPermissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUserHasPermissionGroupsKey2Value(string $key, string $value, $where, array $markers = []);











    /**
     * Updates the user has permission group row identified by the given user_id and permission_group_id.
     *
     * @param int $user_id
	 * @param int $permission_group_id
     * @param array $userHasPermissionGroup
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup, array $extraWhere = [], array $markers = []);




    /**
     * Updates the user has permission group row.
     *
     * @param array $userHasPermissionGroup
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserHasPermissionGroup(array $userHasPermissionGroup, $where = null, array $markers = []);



    /**
     * Deletes the userHasPermissionGroup rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the user has permission group identified by the given user_id and permission_group_id.
     *
     * @param int $user_id
	 * @param int $permission_group_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id);



    /**
     * Deletes the user has permission group rows identified by the given user_ids.
     *
     * @param array $user_ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByUserIds(array $user_ids);

    /**
     * Deletes the user has permission group rows identified by the given permission_group_ids.
     *
     * @param array $permission_group_ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByPermissionGroupIds(array $permission_group_ids);





    /**
     * Deletes the user has permission group rows having the given user id.
     * @param int $userId
     */
    public function deleteUserHasPermissionGroupByUserId(int $userId);

    /**
     * Deletes the user has permission group rows having the given permission group id.
     * @param int $permissionGroupId
     */
    public function deleteUserHasPermissionGroupByPermissionGroupId(int $permissionGroupId);

}
