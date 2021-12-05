<?php


namespace Ling\Light_Kit_Store\Helper;


use Ling\Bat\HashTool;

/**
 * The LightKitStorePasswordHelper class.
 */
class LightKitStorePasswordHelper
{

    /**
     * Encrypts the given plain password to an unguessable hash suitable to be stored in a database.
     *
     * @param string $plainPassword
     * @return string
     */
    public static function encrypt(string $plainPassword): string
    {
        return HashTool::passwordEncrypt($plainPassword);
    }


    /**
     * Returns whether the given plain password matches the given hash.
     *
     * @param string $plainPassword
     * @param string $hash
     * @return bool
     */
    public static function passwordVerify(string $plainPassword, string $hash): bool
    {
        return HashTool::passwordVerify($plainPassword, $hash);
    }
}