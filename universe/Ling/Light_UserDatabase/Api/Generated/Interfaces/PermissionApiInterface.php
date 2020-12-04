<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The PermissionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionApiInterface
{


    /**
     * Inserts the given permission in the database.
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
     * @param array $permission
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given permission rows in the database.
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
     * @param array $permissions
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissions(array $permissions, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Returns the permission row identified by the given id.
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
    public function getPermissionById(int $id, $default = null, bool $throwNotFoundEx = false);

    /**
     * Returns the permission row identified by the given name.
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
    public function getPermissionByName(string $name, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the permission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermission($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissions($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the permission rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermissionsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the permission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionsKey2Value(string $key, string $value, $where, array $markers = []);


    /**
     * Returns the id of the lud_permission table.
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
    public function getPermissionIdByName(string $name, $default = null, bool $throwNotFoundEx = false);







    /**
     * Returns an array of all permission ids.
     *
     * @return array
     * @throws \Exception
     */
    public function getAllIds(): array;



    /**
     * Updates the permission row identified by the given id.
     *
     * @param int $id
     * @param array $permission
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updatePermissionById(int $id, array $permission, array $extraWhere = [], array $markers = []);


    /**
     * Updates the permission row identified by the given name.
     *
     * @param string $name
     * @param array $permission
     * @param array $extraWhere
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updatePermissionByName(string $name, array $permission, array $extraWhere = [], array $markers = []);




    /**
     * Updates the permission row.
     *
     * @param array $permission
     * @param mixed $where
     * @param array $markers
     * @return void
     * @throws \Exception
     */
    public function updatePermission(array $permission, $where = null, array $markers = []);



    /**
     * Deletes the permission rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the permission identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionById(int $id);

    /**
     * Deletes the permission identified by the given name.
     *
     * @param string $name
     * @return void
     * @throws \Exception
     */
    public function deletePermissionByName(string $name);



    /**
     * Deletes the permission rows identified by the given ids.
     *
     * @param array $ids
     * @return void
     * @throws \Exception
     */
    public function deletePermissionByIds(array $ids);

    /**
     * Deletes the permission rows identified by the given names.
     *
     * @param array $names
     * @return void
     * @throws \Exception
     */
    public function deletePermissionByNames(array $names);





}
