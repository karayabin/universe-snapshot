<?php


namespace Kamille\Architecture\Environment\Web;


class Environment
{
    public static $appName;

    /**
     * Returns the environment in which the application is executed.
     *
     * Most common values are:
     *
     * - dev
     * - prod
     *
     * But if you can manage more environments, go ahead and knock yourself out.
     *
     * The default environment is prod, because it's easier to manipulate a local machine than
     * a distant one, and this class heuristics is based on the web-server configuration (which
     * implies some manipulation).
     *
     * The heuristic used is the following:
     * if the web server has set an APPLICATION_ENVIRONMENT variable (found in $_SERVER),
     * then the environment is the value of that variable, otherwise, it's prod.
     *
     *
     * To set the APPLICATION_ENVIRONMENT variable:
     *
     * - in apache, in your virtual host, add the following line (at a Directory level)
     *
     *          SetEnv APPLICATION_ENVIRONMENT dev
     *
     *
     * - in nginx, with php-fpm, at server level, inside the php location block, add this:
     *
     *
     *          fastcgi_param   APPLICATION_ENVIRONMENT  dev;
     *
     *
     *
     * If it's a cli environment, we basically use a very simple heuristic:
     *
     * - if the APPLICATION_ENVIRONMENT key is defined and set, then we use its value
     * - if the APPLICATION_ENVIRONMENT key is NOT SET, then the environment is prod.
     *
     * To set the APPLICATION_ENVIRONMENT in your cli environment, you can add this line to your
     * .bash_profile:
     *
     *      export APPLICATION_ENVIRONMENT=dev
     *
     *
     * Now this technique only allows us to set ONE environment per machine, instead of one environment
     * per application.
     * To fix this, we've created the public static $appName property.
     * You can append it to the "APPLICATION_ENVIRONMENT_" prefix to create an environment per app.
     *
     * For instance, if you set the $appName to LEE, then you need to create the following variable:
     *
     *
     *      export APPLICATION_ENVIRONMENT_LEE=dev
     *
     *
     *
     */
    public static function getEnvironment()
    {
        if (array_key_exists("APPLICATION_ENVIRONMENT", $_SERVER)) {
            return $_SERVER['APPLICATION_ENVIRONMENT'];
        }
        if (null !== self::$appName && array_key_exists("APPLICATION_ENVIRONMENT_" . self::$appName, $_SERVER)) {
            return $_SERVER["APPLICATION_ENVIRONMENT_" . self::$appName];
        }
        return 'prod';
    }
}