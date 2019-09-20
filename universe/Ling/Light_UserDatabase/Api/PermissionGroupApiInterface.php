<?php


namespace Ling\Light_UserDatabase\Api;


/**
 * The PermissionGroupApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionGroupApiInterface
{

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
     * Updates the permissionGroup row identified by the given id.
     *
     * @param int $id
     * @param array $permissionGroup
     * @return void
     * @throws \Exception
     */
    public function updatePermissionGroupById(int $id, array $permissionGroup);

    /**
     * Inserts the given permissionGroup in the database.
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
     * @param array $permissionGroup
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermissionGroup(array $permissionGroup, bool $ignoreDuplicate = true, bool $returnRic = false);


    /**
     * Deletes the permissionGroup identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionGroupById(int $id);


    //--------------------------------------------
    //
    //--------------------------------------------

    /**
     * Returns the id of the permission group which name was given,
     * or false if the group doesn't exist.
     *
     *
     * @param string $name
     * @return int|false
     */
    public function getPermissionGroupIdByName(string $name);
}