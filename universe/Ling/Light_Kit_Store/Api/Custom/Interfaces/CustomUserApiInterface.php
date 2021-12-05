<?php


namespace Ling\Light_Kit_Store\Api\Custom\Interfaces;

use Ling\Light_Kit_Store\Api\Generated\Interfaces\UserApiInterface;


/**
 * The CustomUserApiInterface interface.
 */
interface CustomUserApiInterface extends UserApiInterface
{

    /**
     * Returns the user row identified by the given token.
     *
     *
     * If the row is not found, this method's return depends on the throwNotFoundEx flag:
     * - if true, the method throws an exception
     * - if false, the method returns the given default value
     *
     * Token type can be one of:
     * - remember_me
     * - signup
     * - reset_password
     * - default
     *
     *
     *
     * @param string $token
     * @param string $tokenType
     * @param mixed $default = null
     * @param bool $throwNotFoundEx = false
     * @return mixed
     * @throws \Exception
     */
    public function getUserByToken(string $token, string $tokenType, mixed $default = null, bool $throwNotFoundEx = false);


    /**
     * Updates the user password with the given value.
     * If the user is not connected, an exception is thrown.
     *
     *
     * @param string $newPassword
     * @throws \Exception
     */
    public function updatePassword(string $newPassword);


    /**
     * Returns an array of information for the connected user.
     *
     * If the user is not connected, an empty array is returned.
     *
     * The returned array contains the following:
     *
     * - billing_address: null|array (same format as the one defined in LightKitStoreCheckoutCartHelper)
     * - payment_method: null|array (same format as the one defined in LightKitStoreCheckoutCartHelper)
     *
     *
     * @return array
     */
    public function getUserCheckoutInfo(): array;


}
