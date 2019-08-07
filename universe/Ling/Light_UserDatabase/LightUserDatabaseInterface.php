<?php


namespace Ling\Light_UserDatabase;


use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The LightUserDatabaseInterface interface.
 *
 *
 * The identifier of an user identifies an user uniquely.
 * This means the same identifier cannot be found more than once in the database.
 *
 * An user identifier cannot be updated (you have to delete the user and create another one instead),
 * for security reason.
 *
 * The info representing the database user are left to the implementor, however a user must have a field
 * representing the identifier.
 *
 */
interface LightUserDatabaseInterface
{


    /**
     * Returns the user info array matching the given credentials, or false if the
     * credentials don't match any user.
     *
     *
     * @param string $identifier
     * @param string $password
     * @return array|false
     */
    public function getUserInfoByCredentials(string $identifier, string $password);

    /**
     * Returns the user info array matching the given user identifier, or false if the identifier
     * doesn't match an user. The returned array structure depends on your application.
     * Related: getUserInfo method.
     *
     *
     * @param string $identifier
     * @return array|false
     */
    public function getUserInfoByIdentifier(string $identifier);


    /**
     * Adds the user info to the database.
     * The user info array depends on the implementor and the application structure.
     *
     * An LightUserDatabaseException exception is thrown if the identifier already exists in the database.
     *
     *
     * @param array $userInfo
     * @return void
     * @throws LightUserDatabaseException
     *
     */
    public function addUser(array $userInfo);

    /**
     * Updates the user identified by the given identifier.
     *
     * The userInfo can contain all the information, or only some of them.
     * The password should be updated with the key "pass".
     *
     * @param string $identifier
     * @param array $userInfo
     * @return void
     */
    public function updateUser(string $identifier, array $userInfo);


    /**
     * Deletes the user identified by the given identifier.
     *
     * @param string $identifier
     * @return void
     */
    public function deleteUser(string $identifier);
}