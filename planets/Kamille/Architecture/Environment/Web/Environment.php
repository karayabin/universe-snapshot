<?php


namespace Kamille\Architecture\Environment\Web;


class Environment
{

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
     */
    public static function getEnvironment()
    {
        if (array_key_exists("APPLICATION_ENVIRONMENT", $_SERVER)) {
            return $_SERVER['APPLICATION_ENVIRONMENT'];
        }
        return 'prod';
    }
}