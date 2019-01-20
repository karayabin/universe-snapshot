<?php


namespace Authenticate\UserStore;


use Authenticate\User\UserInterface;

interface UserStoreInterface
{

    /**
     * @return false|UserInterface
     */
    public function getUserByCredentials($name, $pass);

    /**
     * @return false|UserInterface
     */
    public function getUser($id);

    /**
     * @return array of id => userInfo
     */
    public function getUsers();

    /**
     * $profile: the profile string
     * @return string, the user id
     */
    public function createUser($name, $pass, $profile, array $extra = []);

    public function destroyUser($id);


}