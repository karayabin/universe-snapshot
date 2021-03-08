<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\PageApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageApiInterface;



/**
 * The CustomPageApi class.
 */
class CustomPageApi extends PageApi implements CustomPageApiInterface
{


    /**
     * Builds the CustomPageApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
