<?php


namespace Ling\SimplePdoWrapper\Util;

/**
 * The SimplePdoGenericHelper class.
 */
class SimplePdoGenericHelper
{

    /**
     * Returns a unique identifier.
     *
     * If the prefix is set, it will be prepended to the returned identifier.
     *
     * @param string|null $prefix
     * @return string
     */
    public static function getUniqueIdentifier(string $prefix = null): string
    {
        /**
         * Theoretically the technique below doesn't yield a unique identifier, but in practise,
         * I found that this is close enough for my apps.
         * Depending to the web app traffic, you might want to tweak this a bit...
         */
        $id = microtime(true) . "." . rand(0, 1000);
        return (string)$prefix . $id;
    }
}