<?php


namespace Ling\Light\Helper;


/**
 * The EnvironmentHelper class.
 */
class EnvironmentHelper
{

    /**
     * Returns whether the current environment is dev.
     * @return bool
     */
    public static function isDev(): bool
    {
        return ('dev' === self::getEnvironment());
    }


    /**
     * Returns the name of the current environment.
     *
     * @return string
     */
    public static function getEnvironment(): string
    {
        return $_SERVER['APPLICATION_ENVIRONMENT'] ?? 'prod';
    }
}