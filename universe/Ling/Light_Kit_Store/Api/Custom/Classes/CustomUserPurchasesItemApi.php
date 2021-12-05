<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\UserPurchasesItemApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomUserPurchasesItemApiInterface;



/**
 * The CustomUserPurchasesItemApi class.
 */
class CustomUserPurchasesItemApi extends UserPurchasesItemApi implements CustomUserPurchasesItemApiInterface
{


    /**
     * Builds the CustomUserPurchasesItemApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
