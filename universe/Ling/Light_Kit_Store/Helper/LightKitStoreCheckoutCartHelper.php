<?php

namespace Ling\Light_Kit_Store\Helper;

use Ling\Bat\SessionTool;

/**
 * The LightKitStoreCheckoutCartHelper class.
 *
 *
 * The checkout cart structure is an array with the following:
 *
 * - billing_address: null|array (see database, same fields):
 *      - full_name
 *      - address_line_1
 *      - address_line_2
 *      - zip_postal_code
 *      - city
 *      - state_province_region
 *      - country
 *      - phone
 * - payment_method: null|array
 *      - identifier: string, the payment method identifier
 * - cartItemsInfo:
 *      - nbItems: int
 *      - rows: array of rows, each of which defined in getCartItemsInfo method
 *      - total: float, the cart total in euro
 *      - totalFormatted: string, the cart total formatted (useful for js injection
 *
 */
class LightKitStoreCheckoutCartHelper
{


    private static string $key = "lks.checkout_cart";


    /**
     * Returns the checkout cart array, or null if never set before.
     * See this class top comment for more details.
     *
     * @return array|null
     * @throws \Exception
     */
    public static function getCart(): array|null
    {
        SessionTool::start();
        return SessionTool::get(self::$key, null, false);
    }

    /**
     * Sets the checkout cart in the php session.
     *
     * @param array $cart
     */
    public static function setCart(array $cart)
    {
        SessionTool::start();
        SessionTool::set(self::$key, $cart);
    }


    /**
     * Sets a checkout cart property.
     * @param string $property
     * @param $value
     * @throws \Exception
     */
    public static function setCartProperty(string $property, $value)
    {
        SessionTool::start();
        $cart = self::getCart();
        $cart[$property] = $value;
        SessionTool::set(self::$key, $cart);
    }


    /**
     * Returns a default cart filled with the given cartItemsInfo array.
     *
     * @param array $cartItemsInfo
     * @return array
     */
    public static function getDefaultCartByCartItemsInfo(array $cartItemsInfo): array
    {
        return [
            "billing_address" => null,
            "payment_method" => null,
            "cartItemsInfo" => $cartItemsInfo,
        ];
    }


}