<?php


namespace Ling\Light_Kit_Store\Helper;

/**
 * The LightKitStorePriceHelper class.
 */
class LightKitStorePriceHelper
{


    /**
     * Returns a price formatted for the front end display.
     * Note: all prices are in euros in kit store.
     *
     * @param string $price
     * @return string
     */
    public static function formatPrice(string $price): string
    {
        if ('0.00' === $price || 0.0 === (float)$price) {
            return "Free (0.00 €)";
        }
        $ret = str_replace('.', ',', $price);
        return $ret . " €";
    }
}