<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Interfaces;


/**
 * The UserHasPermissionGroupApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface UserHasPermissionGroupApiInterface
{

    /**
     * Inserts the given userHasPermissionGroup in the database.
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
     * @param array $userHasPermissionGroup
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertUserHasPermissionGroup(array $userHasPermissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false);

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
     * Deletes the userHasPermissionGroup identified by the given user_id and permission_group_id.
     *
     * @param int $user_id
	 * @param int $permission_group_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByUserIdAndPermissionGroupId(int $user_id, int $permission_group_id);

    /**
     * Deletes the userHasPermissionGroup identified by the given user_id.
     *
     * @param int $user_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByUserId(int $user_id);

    /**
     * Deletes the userHasPermissionGroup identified by the given permission_group_id.
     *
     * @param int $permission_group_id
     * @return void
     * @throws \Exception
     */
    public function deleteUserHasPermissionGroupByPermissionGroupId(int $permission_group_id);



}
