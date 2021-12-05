<?php

namespace Ling\Light_Kit_Store\Helper;

use Ling\Light\ServiceContainer\LightServiceContainerInterface;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomCartItemApiInterface;

/**
 * The LightKitStoreCartHelper class.
 */
class LightKitStoreCartHelper
{
    /**
     * A cache for the cart items array. If null, it's not set.
     * @var array|null
     */
    private static array|null $_cartItemsInfo = null;


    /**
     * Returns the cart items info.
     *
     * It's an array containing:
     *
     * - nbItems: int, the number of items in the cart
     * - rows: array, the cart items rows
     * - total: float, the cart total in euro
     * - totalFormatted: string, the cart total formatted (useful for js injection)
     *
     * To make sure the returned array is not cached, set the refresh flag to true.
     *
     *
     * @param LightServiceContainerInterface $container
     * @param bool $refresh
     * @return array
     * @throws \Exception
     */
    public static function getCartInfo(LightServiceContainerInterface $container, bool $refresh = false): array
    {
        if (true === $refresh || null === self::$_cartItemsInfo) {

            /**
             * @var $uciApi CustomCartItemApiInterface
             */
            $uciApi = $container->get('kit_store')->getFactory()->getCartItemApi();
            $cartItems = $uciApi->getCartItemsList();
            $nbCartItems = 0;
            $total = 0; // in kitstore, we don't have taxes, so it's just the total directly (i.e., no subtotal)
            foreach ($cartItems as $item) {
                $nbCartItems += $item['quantity'];
                $total += $item['price_in_euro'] * $item['quantity'];
            }
            self::$_cartItemsInfo = [
                'nbItems' => $nbCartItems,
                'rows' => $cartItems,
                'total' => $total,
                'totalFormatted' => LightKitStorePriceHelper::formatPrice($total),
            ];

        }
        return self::$_cartItemsInfo;
    }
}