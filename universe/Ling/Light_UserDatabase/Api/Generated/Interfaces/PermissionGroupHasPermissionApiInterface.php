<?php


namespace Ling\Light_UserDatabase\Api\Generated\Interfaces;


/**
 * The PermissionGroupHasPermissionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionGroupHasPermissionApiInterface
{

    /**
     * Inserts the given permissionGroupHasPermission in the database.
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
     * @param array $permissionGroupHasPermission
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissionGroupHasPermission(array $permissionGroupHasPermission, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Inserts the given permissionGroupHasPermission rows in the database.
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
     * @param array $permissionGroupHasPermissions
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissionGroupHasPermissions(array $permissionGroupHasPermissions, bool $ignoreDuplicate = true, bool $returnRic = false);

    /**
     * Returns the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     *
     * @param int $permission_group_id
	 * @param int $permission_id
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getPermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, $default = null, bool $throwNotFoundEx = false);



    /**
     * Returns the permissionGroupHasPermission row identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermissionGroupHasPermission($where, array $markers = [], $default = null, bool $throwNotFoundEx = false);


    /**
     * Returns the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroupHasPermissions($where, array $markers = []);


    /**
     * Returns an array which values are the given $column, from the permissionGroupHasPermission rows
     * identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $column
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroupHasPermissionsColumn(string $column, $where, array $markers = []);


    /**
     * Returns a subset of the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
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
    public function getPermissionGroupHasPermissionsColumns($columns, $where, array $markers = []);


    /**
     * Returns an array of $key => $value from the permissionGroupHasPermission rows identified by the given [where conditions](https://github.com/lingtalfi/SimplePdoWrapper#the-where-conditions).
     *
     *
     * @param string $key
     * @param string $value
     * @param $where
     * @param array $markers
     * @return array
     * @throws \Exception
     */
    public function getPermissionGroupHasPermissionsKey2Value(string $key, string $value, $where, array $markers = []);











    /**
     * Updates the permissionGroupHasPermission row identified by the given permission_group_id and permission_id.
     *
     * @param int $permission_group_id
	 * @param int $permission_id
     * @param array $permissionGroupHasPermission
     * @return void
     * @throws \Exception
     */
    public function updatePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id, array $permissionGroupHasPermission);



    /**
     * Deletes the permissionGroupHasPermission rows matching the given where conditions, and returns the number of deleted rows.
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
     * Deletes the permissionGroupHasPermission identified by the given permission_group_id and permission_id.
     *
     * @param int $permission_group_id
	 * @param int $permission_id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id);

    /**
     * Deletes the permissionGroupHasPermission identified by the given permission_group_id.
     *
     * @param int $permission_group_id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupId(int $permission_group_id);

    /**
     * Deletes the permissionGroupHasPermission identified by the given permission_id.
     *
     * @param int $permission_id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionId(int $permission_id);



    /**
     * Deletes the permissionGroupHasPermission rows identified by the given permission_group_permission_group_ids.
     *
     * @param array $permission_group_ids
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIds(array $permission_group_ids);

    /**
     * Deletes the permissionGroupHasPermission rows identified by the given permission_permission_ids.
     *
     * @param array $permission_ids
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionIds(array $permission_ids);



}
