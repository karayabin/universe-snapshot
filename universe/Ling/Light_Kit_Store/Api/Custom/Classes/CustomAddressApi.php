<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\AddressApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomAddressApiInterface;



/**
 * The CustomAddressApi class.
 */
class CustomAddressApi extends AddressApi implements CustomAddressApiInterface
{


    /**
     * Builds the CustomAddressApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
