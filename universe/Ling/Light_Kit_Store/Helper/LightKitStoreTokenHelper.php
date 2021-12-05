<?php


namespace Ling\Light_Kit_Store\Helper;


/**
 * The LightKitStoreTokenHelper class.
 */
class LightKitStoreTokenHelper
{

    /**
     * Returns the duration of a token in seconds.
     * @return int
     */
    public static function getTokenDuration(): int
    {
        /**
         * Note: later we might add a tokenType aqrgument to this method, but
         * I prefer to keep it simple whenever possible.
         */
        return 15 * 60;
    }
}