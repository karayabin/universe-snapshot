<?php


namespace Ling\Light_Kit_Store\Helper;

use Ling\Bat\HashTool;
use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Service\LightKitStoreService;
use Ling\Light_User\LightOpenUser;

/**
 * The LightKitStoreUserHelper class.
 */
class LightKitStoreUserHelper
{

    /**
     * Attaches the desired userRow key/value pairs to the user props.
     *
     *
     * @param LightOpenUser $user
     * @param $userRow
     */
    public static function setUserPropsFromRow(LightOpenUser $user, $userRow)
    {
        /**
         * As for now (early development),
         * we attach everything... I might filter out some props later...
         */
        $user->setProps($userRow);
    }


    /**
     * Generates and returns a random password for a user.
     *
     * @return string
     */
    public static function generateUserPassword(): string
    {
        return HashTool::getRandomHash64(12);
    }
}