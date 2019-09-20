<?php


namespace Ling\Light_UserDatabase\Api;


/**
 * The PermissionApiInterface interface.
 * It implements the @page(ling standard object methods) concept.
 */
interface PermissionApiInterface
{
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
     * Updates the permission row identified by the given id.
     *
     * @param int $id
     * @param array $permission
     * @return void
     * @throws \Exception
     */
    public function updatePermissionById(int $id, array $permission);

    /**
     * Inserts the given permission in the database.
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
     * @param array $permission
     * @param bool $ignoreDuplicate
     * @param bool $returnRic
     * @return mixed
     * @throws \Exception
     */
    public function insertPermission(array $permission, bool $ignoreDuplicate = true, bool $returnRic = false);


    /**
     * Deletes the permission identified by the given id.
     *
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deletePermissionById(int $id);


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Returns all the permission names associated with the given user id.
     *
     * @param int $id
     * @return array
     */
    public function getPermissionNamesByUserId(int $id): array;
}