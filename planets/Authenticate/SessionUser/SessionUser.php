<?php

namespace Authenticate\SessionUser;


use Bat\SessionTool;

/**
 * This class assumes that there is maximum only one connected user to handle at a time,
 * hence the static methods.
 *
 * It does not represent an authenticated human user, but rather an authenticator process,
 * but it is named AuthenticatedUser because there is the "has" method, which is probably the goal of this class,
 * and so
 *      AuthenticatedUser::has(badge)
 * makes sense.
 *
 */
class SessionUser
{

    public static $key = "SessionUser";

    /**
     * Connects the current user
     *
     *
     * $sessionTimeout: time out in seconds.
     * If the user doesn't refresh the page before the timeout expires, she will be automatically disconnected.
     * Set to null to allow infinite timeout.
     *
     */
    public static function connect(array $props = [], $sessionTimeout = 300)
    {
        self::startSession();
        $arr = $props;
        /**
         * The idea of user_connexion_time is to
         * compute/refresh the logout time on each page refresh
         */
        $arr['user_connexion_time'] = time();
        $arr['timeout'] = $sessionTimeout;
        $_SESSION[self::$key] = $arr;
    }


    public static function isConnected()
    {
        self::startSession();
        if (array_key_exists('user_connexion_time', $_SESSION[self::$key])) {
            $connexionTime = $_SESSION[self::$key]['user_connexion_time'];
            $timeout = $_SESSION[self::$key]['timeout'];

            if (null === $timeout) {
                return true;
            }

            // has it expired?
            if (time() < $connexionTime + $timeout) {
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
            $_SESSION[self::$key]['user_connexion_time'] = time();
        }
    }


    public static function disconnect($destroyCookie = false)
    {
        self::startSession();
        // http://php.net/manual/en/function.session-destroy.php


        SessionTool::destroyPartial(self::$key);


        /**
         * deprecated since it kills the whole session instead of just the SessionUser session
         */
        if (false) {
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

    }

    public static function getValue($key, $default = null)
    {
        self::startSession();
        if (array_key_exists($key, $_SESSION[self::$key])) {
            return $_SESSION[self::$key][$key];
        }
        return $default;
    }

    public static function getAll()
    {
        self::startSession();
        return $_SESSION[self::$key];
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function startSession()
    {
        if (session_status() === \PHP_SESSION_NONE) {
            session_start();
        }
        if (!array_key_exists(self::$key, $_SESSION)) {
            $_SESSION[self::$key] = [];
        }
    }
}