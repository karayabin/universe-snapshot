<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The UserApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserApiInterface
{


    /**
     * Inserts the given user in the database.
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
     * @param array $user
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUser(array $user, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given user rows in the database.
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
     * @param array $users
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUsers(array $users, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the user row identified by the given id.
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
    public function getUserById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the user row identified by the given identifier.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param string $identifier
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getUserByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the user row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUser($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUsers($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the user rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUsersColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getUsersColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the user rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getUsersKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lud_user table.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * @param string $identifier
     * @param null $default
     * @param bool $throwNotFoundEx
     * @return string|mixed
     */
    public function getUserIdByIdentifier(string $identifier, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the rows of the lud_user table bound to the given permission_group id.
     * @param string $permissionGroupId
     * @return array
     */
    public function getUsersByPermissionGroupId(string $permissionGroupId): array;

    /**
     * Returns the rows of the lud_user table bound to the given permission_group name.
     * @param string $permissionGroupName
     * @return array
     */
    public function getUsersByPermissionGroupName(string $permissionGroupName): array;



    /**
     * Returns an array of lud_user.id bound to the given permission_group id.
     * @param string $permissionGroupId
     * @return array
     */
    public function getUserIdsByPermissionGroupId(string $permissionGroupId): array;


    /**
     * Returns an array of lud_user.id bound to the given permission_group name.
     * @param string $permissionGroupName
     * @return array
     */
    public function getUserIdsByPermissionGroupName(string $permissionGroupName): array;


    /**
     * Returns an array of lud_user.identifier bound to the given permission_group id.
     * @param string $permissionGroupId
     * @return array
     */
    public function getUserIdentifiersByPermissionGroupId(string $permissionGroupId): array;


    /**
     * Returns an array of lud_user.identifier bound to the given permission_group name.
     * @param string $permissionGroupName
     * @return array
     */
    public function getUserIdentifiersByPermissionGroupName(string $permissionGroupName): array;




    /**
     * Returns an array of all user ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the user row identified by the given id.
     *
     * @param int $id
     * @param array $user
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserById(int $id, array $user, array $extraWhere = [], array $markers = []);


    /**
     * Updates the user row identified by the given identifier.
     *
     * @param string $identifier
     * @param array $user
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUserByIdentifier(string $identifier, array $user, array $extraWhere = [], array $markers = []);




    /**
     * Updates the user row.
     *
     * @param array $user
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updateUser(array $user, $where = null, array $markers = []);



    /**
     * Deletes the user rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the user identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteUserById(int $id);

    /**
     * Deletes the user identified by the given identifier.
     *
     * @param string $identifier
     * @return void
     * @throws \Exception
     */
    public function deleteUserByIdentifier(string $identifier);



    /**
     * Deletes the user rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deleteUserByIds(array $ids);

    /**
     * Deletes the user rows identified by the given identifiers.
     *
     * @param array $identifiers
     * @return void
     * @throws \Exception
     */
    public function deleteUserByIdentifiers(array $identifiers);





    /**
     * Deletes the user rows having the given user group id.
     * @param int $userGroupId
     */
    public function deleteUserByUserGroupId(int $userGroupId);

}
