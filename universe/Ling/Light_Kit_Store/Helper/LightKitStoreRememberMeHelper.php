<?php


namespace Ling\Light_Kit_Store\Helper;

use Ling\Bat\CookieTool;
use Ling\Bat\HashTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Exception\LightKitStoreException;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_User\LightOpenUser;
use Ling\SimplePdoWrapper\Util\Where;

/**
 * The LightKitStoreRememberMeHelper class.
 */
class LightKitStoreRememberMeHelper
{


    private const REMEMBER_ME_TOKEN_NAME = "remember_me_token";


    /**
     * Returns the remember_me token from the cookies.
     *
     *
     * @return string|null
     */
    public static function getRememberMeTokenFromCookies(): string|null
    {
        return $_COOKIE[self::REMEMBER_ME_TOKEN_NAME] ?? null;
    }


    /**
     * Removes the given remember me token from the cookies.
     *
     */
    public static function removeRememberMeTokenFromCookies()
    {
        CookieTool::delete(self::REMEMBER_ME_TOKEN_NAME);
    }

    /**
     * Generates a remember_me token.
     *
     *
     * @return string
     */
    public static function generateRememberMeToken(): string
    {
        return HashTool::getRandomHash64();
    }


    /**
     * Writes the given token to both the database and the user cookies.
     *
     * @param LightServiceContainerInterface $container
     * @param LightOpenUser $user
     * @param string $rememberMeToken
     */
    public static function spreadTokenByValidUser(LightServiceContainerInterface $container, LightOpenUser $user, string $rememberMeToken)
    {
        if (false === $user->isValid()) {
            throw new LightKitStoreException("Invalid user given.");
        }

        $props = $user->getProps();

        /**
         * @var $kit_store LightKitStoreService
         */
        $kit_store = $container->get("kit_store");

        $userApi = $kit_store->getFactory()->getUserApi();


        // store remember_me token in database
        $userApi->updateUser([
            "remember_me_token" => $rememberMeToken,
        ], Where::inst()->key("id")->equals($props["id"]));

        // store remember_me token in user cookies
        CookieTool::add(self::REMEMBER_ME_TOKEN_NAME, $rememberMeToken, 365, [
            'httponly' => true,
            'secure' => true,
        ]);
    }


    /**
     * Removes the user's token from both the database and the cookies.
     *
     *
     * @param LightServiceContainerInterface $container
     * @param LightOpenUser $user
     * @throws \Exception
     */
    public static function destroyTokenByValidUser(LightServiceContainerInterface $container, LightOpenUser $user)
    {
        if (false === $user->isValid()) {
            throw new LightKitStoreException("Invalid user given.");
        }

        $props = $user->getProps();

        /**
         * @var $kit_store LightKitStoreService
         */
        $kit_store = $container->get("kit_store");

        $userApi = $kit_store->getFactory()->getUserApi();


        // store remember_me token in database
        $userApi->updateUser([
            "remember_me_token" => null,
        ], Where::inst()->key("id")->equals($props["id"]));


        // store remember_me token in user cookies
        CookieTool::delete(self::REMEMBER_ME_TOKEN_NAME);
    }


    /**
     * Returns the user row corresponding to the given token, or null if there is no match.
     *
     * @param LightServiceContainerInterface $container
     * @param string $rememberMeToken
     * @return array|null
     */
    public static function getUserRowByToken(LightServiceContainerInterface $container, string $rememberMeToken): array|null
    {
        /**
         * @var $kit_store LightKitStoreService
         */
        $kit_store = $container->get("kit_store");

        $userApi = $kit_store->getFactory()->getUserApi();
        return $userApi->getUserByToken($rememberMeToken, "remember_me");
    }
}