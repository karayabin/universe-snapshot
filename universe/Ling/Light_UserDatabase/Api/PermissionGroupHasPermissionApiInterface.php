<?php


namespace Ling\Light_UserDatabase\Api;


/**
 * The PermissionGroupHasPermissionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionGroupHasPermissionApiInterface
{

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
     * Inserts the given permissionGroupHasPermission in the database.
     * By default, it returns the result of the PDO::lastInsertId method.
     *
     * If the row you're trying to insert triggers a duplicate error, the behaviour of this method depends on
     * the ignoreDuplicate flag:
     * - if true, the error will be caught internally, the method will return false
     * - if false, the error will not be caught
     *
     * If the returnRic flag is set to true, the method will return the ric array instead of the lastInsertId.
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
     * Deletes the permissionGroupHasPermission identified by the given permission_group_id and permission_id.
     *
     * @param int $permission_group_id
     * @param int $permission_id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupHasPermissionByPermissionGroupIdAndPermissionId(int $permission_group_id, int $permission_id);
}