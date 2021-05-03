<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\SiteApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomSiteApiInterface;



/**
 * The CustomSiteApi class.
 */
class CustomSiteApi extends SiteApi implements CustomSiteApiInterface
{


    /**
     * Builds the CustomSiteApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
