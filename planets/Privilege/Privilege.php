<?php

namespace Privilege;

class Privilege
{

    private static $profiles = [];


    public static function setProfiles(array $profiles)
    {
        self::$profiles = $profiles;
    }

    public static function has($privilege)
    {
        if (true === PrivilegeUser::isConnected()) {
            $profile = PrivilegeUser::getProfile();
            if (null !== $profile) {
                if (array_key_exists($profile, self::$profiles)) {

                    $privileges = self::$profiles[$profile];
                    if (in_array('*', $privileges, true) || in_array($privilege, $privileges, true)) {
                        return true;
                    }


                    // test wildcards
                    foreach ($privileges as $p) {
                        if (
                            '*' === substr($p, -1) &&
                            0 === strpos($privilege, substr($p, 0, -2))
                        ) {
                            return true;
                        }
                    }


                } else {
                    throw new \Exception("Profile not found: $profile");
                }
            }
        }
        return false;
    }
}