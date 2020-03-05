<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Interfaces;


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



}
