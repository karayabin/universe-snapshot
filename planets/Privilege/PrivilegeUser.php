<?php

namespace Privilege;


Class PrivilegeUser
{

    /**
     * time out in seconds.
     * If the user doesn't refresh the page before the timeout expires, she will be automatically disconnected.
     *
     * Or set to null to allow infinite timeout
     */
    public static $sessionTimeout = 300; // 5 minutes by default

    public static function connect(array $item, $profile = null)
    {
        foreach ($item as $k => $v) {
            $_SESSION[$k] = $v;
        }
        /**
         * The idea of user_connexion_time is to
         * compute/refresh the logout time on each page refresh
         */
        $_SESSION['user_connexion_time'] = time();
        if (null !== $profile) {
            self::setProfile($profile);
        } else {
            $_SESSION['privileges_profile'] = null;
        }
    }


    public static function isConnected()
    {
        if (null !== self::$sessionTimeout) {
            if (array_key_exists('user_connexion_time', $_SESSION)) {
                // has it expired?
                if (time() < $_SESSION['user_connexion_time'] + self::$sessionTimeout) {
                    return true;
                } else {
                    // disconnect?
                }
            }
            return false;
        }
        return true;
    }

    public static function refresh()
    {
        if (self::isConnected()) {
            $_SESSION['user_connexion_time'] = time();
        }
    }


    public static function disconnect()
    {
        $_SESSION = [];
        session_destroy();

    }

    public static function getValue($key)
    {
        return $_SESSION[$key];
    }

    public static function getProfile()
    {
        return $_SESSION['privileges_profile'];
    }

    public static function setProfile($profile)
    {
        $_SESSION['privileges_profile'] = (string)$profile;
    }

}