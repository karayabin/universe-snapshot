<?php


namespace Ling\Light_Kit_Store\Api\Custom\Interfaces;

use Ling\Light_Kit_Store\Api\Generated\Interfaces\CartItemApiInterface;


/**
 * The CustomCartItemApiInterface interface.
 */
interface CustomCartItemApiInterface extends CartItemApiInterface
{


    /**
     * Returns an array of rows representing expanded cart items.
     * Each row contains the following properties:
     *
     * - all properties from the item table
     * - quantity
     * - firstPhoto: null or first photo info, see source code for more info
     *
     *
     * @return array
     */
    public function getCartItemsList(): array;


    /**
     * Removes a cart item, only if it's in the user/visitor cart.
     *
     * We check the user/visitor identify to make sure we're not removing somebody else's cart item.
     *
     * Exception are thrown in case of errors.
     *
     * @param int $itemId
     * @return void
     * @throws \Exception
     */
    public function removeCartItem(int $itemId);


    /**
     * Returns whether the current user/visitor owns the item.
     *
     * @param int $itemId
     * @return bool
     */
    public function userOrVisitorHasCartItem(int $itemId): bool;
}
