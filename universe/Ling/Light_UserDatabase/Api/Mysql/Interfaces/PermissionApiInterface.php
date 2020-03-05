<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Interfaces;


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
     * - if false, the error will not be caught, and depending on your configuration, it might either
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
     * @return void
     * @throws \Exception
     */
    public function updatePermissionById(int $id, array $permission);


    /**
     * Updates the permission row identified by the given name.
     *
     * @param string $name
     * @param array $permission
     * @return void
     * @throws \Exception
     */
    public function updatePermissionByName(string $name, array $permission);



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


    //--------------------------------------------
    // CUSTOM
    //--------------------------------------------
    /**
     * Returns the permission names bound to the given user id.
     *
     * @param int $id
     * @return array
     */
    public function getPermissionNamesByUserId(int $id): array;


}
