<?php


namespace Ling\Light_UserDatabase\Tool;


use Ling\Light_UserDatabase\Exception\LightUserDatabaseException;

/**
 * The LightWebsiteUserDatabaseTool class.
 */
class LightWebsiteUserDatabaseTool
{


    /**
     * Returns an array of profile strings, based on the given profiles.
     * The given profiles is an array which structure is described in the
     * @page(LightWebsiteUserDatabaseInterface->registerNewUserProfile) method.
     *
     *
     * @param array $profiles
     * @param array $newUser
     * @return array
     * @throws  \Exception
     */
    public static function resolveProfiles(array $profiles, array $newUser): array
    {
        $ret = [];
        foreach ($profiles as $profile) {
            if (is_string($profile)) {
                $ret[] = $profile;
            } elseif (is_array($profile)) {
                $ret = array_merge($ret, $profiles);
            } elseif (is_callable($profile)) {
                $sub = call_user_func($profile, $newUser);
                if (is_string($sub)) {
                    $ret[] = $sub;
                } elseif (is_array($sub)) {
                    $ret = array_merge($ret, $sub);
                } else {
                    $type = gettype($sub);
                    throw new LightUserDatabaseException("Your callable must return either a string or an array or profiles, $type given.");
                }
            }
        }
        $ret = array_unique($ret);
        return $ret;
    }
}