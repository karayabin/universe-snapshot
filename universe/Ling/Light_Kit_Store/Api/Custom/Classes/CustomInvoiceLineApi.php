<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\InvoiceLineApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomInvoiceLineApiInterface;



/**
 * The CustomInvoiceLineApi class.
 */
class CustomInvoiceLineApi extends InvoiceLineApi implements CustomInvoiceLineApiInterface
{


    /**
     * Builds the CustomInvoiceLineApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
