<?php


namespace Ling\Light_UserPreferences\Api\Custom\Interfaces;

use Ling\Light_UserPreferences\Api\Generated\Interfaces\UserPreferenceApiInterface;


/**
 * The CustomUserPreferenceApiInterface interface.
 */
interface CustomUserPreferenceApiInterface extends UserPreferenceApiInterface
{


    /**
     * Returns by default all the preferences as rows, for the given user id.
     * If the given user id is null, then the current user will be used.
     *
     * An exception is thrown if no id is given and the current user is not valid [LightWebsiteUser](https://github.com/lingtalfi/Light_User/blob/master/doc/api/Ling/Light_User/LightWebsiteUser.md).
     *
     * Available options are:
     *
     * - groupByPlugin: bool = false.
     *      If true, the returned array will have the form plugin => rows, instead of just rows.
     *
     *
     *
     *
     * @param int|null $userId
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function getPreferencesByUserId(int $userId = null, array $options=[]): array;
}
