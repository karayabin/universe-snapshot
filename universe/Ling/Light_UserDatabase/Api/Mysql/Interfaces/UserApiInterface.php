<?php


namespace Ling\Light_UserDatabase\Api\Mysql\Interfaces;


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
     * - if false, the error will not be caught, and depending on your configuration, it might either
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
     * @return void
     * @throws \Exception
     */
    public function updateUserById(int $id, array $user);


    /**
     * Updates the user row identified by the given identifier.
     *
     * @param string $identifier
     * @param array $user
     * @return void
     * @throws \Exception
     */
    public function updateUserByIdentifier(string $identifier, array $user);



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



}
