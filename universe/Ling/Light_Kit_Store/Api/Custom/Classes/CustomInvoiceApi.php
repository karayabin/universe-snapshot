<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomInvoiceApiInterface;



/**
 * The CustomInvoiceApi class.
 */
class CustomInvoiceApi extends InvoiceApi implements CustomInvoiceApiInterface
{


    /**
     * Builds the CustomInvoiceApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
