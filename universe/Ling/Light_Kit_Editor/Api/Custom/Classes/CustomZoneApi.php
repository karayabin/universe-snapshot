<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\ZoneApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomZoneApiInterface;



/**
 * The CustomZoneApi class.
 */
class CustomZoneApi extends ZoneApi implements CustomZoneApiInterface
{


    /**
     * Builds the CustomZoneApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
