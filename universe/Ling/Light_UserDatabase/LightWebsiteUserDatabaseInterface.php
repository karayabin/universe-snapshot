<?php


namespace Ling\Light_UserDatabase;


/**
 * The LightWebsiteUserDatabaseInterface interface.
 *
 * The info representing the database user are the one that match the @page(light website user):
 *
 * - id: int. A unique identifier for the user. This field is created automatically by the concrete class.
 * - identifier: string. A unique identifier for the user. In most applications, this is the email of the user.
 * - password: string. The password of the user. Whether it's encrypted is left to the implementor.
 * - pseudo: string. The pseudo of the user.
 * - avatar_url: string. The url of the user avatar.
 * - rights: array. The @page(rights of the user).
 * - extra: array. Any other information that you want to attach to the user should be found in this array.
 *
 *
 */
interface LightWebsiteUserDatabaseInterface extends LightUserDatabaseInterface
{

    /**
     * Returns the user info array matching the given user id, or false if the id
     * doesn't match an user.
     *
     * @param int $id
     * @return array|false
     */
    public function getUserInfoById(int $id);


    /**
     * Updates the user identified by the given id.
     *
     * The userInfo can contain all the information, or only some of them.
     *
     * @param int $id
     * @param array $userInfo
     * @return void
     */
    public function updateUserById(int $id, array $userInfo);


    /**
     * Deletes the user identified by the given id.
     *
     * @param int $id
     * @return void
     */
    public function deleteUserById(int $id);

}