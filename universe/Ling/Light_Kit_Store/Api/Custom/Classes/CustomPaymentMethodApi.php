<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\PaymentMethodApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomPaymentMethodApiInterface;



/**
 * The CustomPaymentMethodApi class.
 */
class CustomPaymentMethodApi extends PaymentMethodApi implements CustomPaymentMethodApiInterface
{


    /**
     * Builds the CustomPaymentMethodApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
