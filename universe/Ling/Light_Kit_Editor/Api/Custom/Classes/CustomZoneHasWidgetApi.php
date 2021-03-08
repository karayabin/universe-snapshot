<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\ZoneHasWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomZoneHasWidgetApiInterface;



/**
 * The CustomZoneHasWidgetApi class.
 */
class CustomZoneHasWidgetApi extends ZoneHasWidgetApi implements CustomZoneHasWidgetApiInterface
{


    /**
     * Builds the CustomZoneHasWidgetApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
