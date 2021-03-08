<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasZoneApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasZoneApiInterface;



/**
 * The CustomPageHasZoneApi class.
 */
class CustomPageHasZoneApi extends PageHasZoneApi implements CustomPageHasZoneApiInterface
{


    /**
     * Builds the CustomPageHasZoneApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
