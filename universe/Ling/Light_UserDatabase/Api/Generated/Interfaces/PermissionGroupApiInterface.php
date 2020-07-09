<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The PermissionGroupApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionGroupApiInterface
{

    /**
     * Inserts the given permissionGroup in the database.
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
     * @param array $permissionGroup
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissionGroup(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given permissionGroup rows in the database.
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
     * @param array $permissionGroups
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissionGroups(array $permissionGroups, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the permissionGroup row identified by the given id.
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
    public function getPermissionGroupById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the permissionGroup row identified by the given name.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $name
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getPermissionGroupByName(string $name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the permissionGroup row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermissionGroup($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroups($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the permissionGroup rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroupsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermissionGroupsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the permissionGroup rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroupsKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lud_permission_group table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $name
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getPermissionGroupIdByName(string $name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the rows of the lud_permission_group table bound to the given user id.
     * @param string $userId
     * @return array
     */
    public function getPermissionGroupsByUserId(string $userId): array;

    /**
     * Returns the rows of the lud_permission_group table bound to the given user identifier.
     * @param string $userIdentifier
     * @return array
     */
    public function getPermissionGroupsByUserIdentifier(string $userIdentifier): array;



    /**
     * Returns an array of lud_permission_group.id bound to the given user id.
     * @param string $userId
     * @return array
     */
    public function getPermissionGroupIdsByUserId(string $userId): array;


    /**
     * Returns an array of lud_permission_group.id bound to the given user identifier.
     * @param string $userIdentifier
     * @return array
     */
    public function getPermissionGroupIdsByUserIdentifier(string $userIdentifier): array;


    /**
     * Returns an array of lud_permission_group.name bound to the given user id.
     * @param string $userId
     * @return array
     */
    public function getPermissionGroupNamesByUserId(string $userId): array;


    /**
     * Returns an array of lud_permission_group.name bound to the given user identifier.
     * @param string $userIdentifier
     * @return array
     */
    public function getPermissionGroupNamesByUserIdentifier(string $userIdentifier): array;




    /**
     * Returns an array of all permissionGroup ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the permissionGroup row identified by the given id.
     *
     * @param int $id
     * @param array $permissionGroup
     * @return void
     * @throws \Exception
     */
    public function updatePermissionGroupById(int $id, array $permissionGroup);


    /**
     * Updates the permissionGroup row identified by the given name.
     *
     * @param string $name
     * @param array $permissionGroup
     * @return void
     * @throws \Exception
     */
    public function updatePermissionGroupByName(string $name, array $permissionGroup);



    /**
     * Deletes the permissionGroup rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the permissionGroup identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupById(int $id);

    /**
     * Deletes the permissionGroup identified by the given name.
     *
     * @param string $name
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupByName(string $name);



    /**
     * Deletes the permissionGroup rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupByIds(array $ids);

    /**
     * Deletes the permissionGroup rows identified by the given names.
     *
     * @param array $names
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupByNames(array $names);



}
