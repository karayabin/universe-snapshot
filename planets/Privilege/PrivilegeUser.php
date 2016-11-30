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

        if (array_key_exists('user_connexion_time', $_SESSION)) {
            if (null === self::$sessionTimeout) {
                return true;
            }
            // has it expired?
            if (time() < $_SESSION['user_connexion_time'] + self::$sessionTimeout) {
                return true;
            } else {
                // disconnect?
            }
        }
        return false;
    }

    public static function refresh()
    {
        if (self::isConnected()) {
            $_SESSION['user_connexion_time'] = time();
        }
    }


    public static function disconnect($destroyCookie = false)
    {
        // http://php.net/manual/en/function.session-destroy.php
        $_SESSION = [];
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (true === $destroyCookie) {
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
        }
        session_destroy();

    }

    public static function getValue($key)
    {
        return $_SESSION[$key];
    }

    public static function getProfile()
    {
        if (array_key_exists('privileges_profile', $_SESSION)) {
            return $_SESSION['privileges_profile'];
        }
        return null;
    }

    public static function setProfile($profile)
    {
        $_SESSION['privileges_profile'] = (string)$profile;
    }

}