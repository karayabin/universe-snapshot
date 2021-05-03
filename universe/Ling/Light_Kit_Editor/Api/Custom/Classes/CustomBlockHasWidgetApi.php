<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\BlockHasWidgetApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockHasWidgetApiInterface;



/**
 * The CustomBlockHasWidgetApi class.
 */
class CustomBlockHasWidgetApi extends BlockHasWidgetApi implements CustomBlockHasWidgetApiInterface
{


    /**
     * Builds the CustomBlockHasWidgetApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
