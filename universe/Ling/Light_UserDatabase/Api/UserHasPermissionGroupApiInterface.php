<?php


namespace Ling\Light_UserDatabase\Api;


/**
 * The UserHasPermissionGroupApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserHasPermissionGroupApiInterface
{

    /**
     * Returns the userHasPermissionGroup row identified by the given user_id and permission_group_id.
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
     * Updates the userHasPermissionGroup row identified by the given user_id and permission_group_id.
     *
     * @param int $user_id
     * @param int $permission_group_id
     * @param array $userHasPermissionGroup
     * @return void
     * @throws \Exception
     */
    public function updateUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id, array $userHasPermissionGroup);

    /**
     * Inserts the given userHasPermissionGroup in the database.
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
     * @param array $userHasPermissionGroup
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false);


    /**
     * Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
     *
     * @param int $user_id
     * @param int $permission_group_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id);
}