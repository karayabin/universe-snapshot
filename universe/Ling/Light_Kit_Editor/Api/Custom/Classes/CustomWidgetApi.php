<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\WidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomWidgetApiInterface;



/**
 * The CustomWidgetApi class.
 */
class CustomWidgetApi extends WidgetApi implements CustomWidgetApiInterface
{


    /**
     * Builds the CustomWidgetApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
