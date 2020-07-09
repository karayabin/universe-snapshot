<?php


namespace Ling\Light_UserDatabase\Api\Custom\Interfaces;

use Ling\Light_UserDatabase\Api\Generated\Interfaces\UserApiInterface;


/**
 * The CustomUserApiInterface interface.
 */
interface CustomUserApiInterface extends UserApiInterface
{


    /**
     * Returns the user rows matching the given email.
     *
     * @param string $email
     * @return array
     * @throws \Exception
     */
    public function getUsersByEmail(string $email);
}
