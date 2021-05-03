<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\PageHasBlockApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomPageHasBlockApiInterface;



/**
 * The CustomPageHasBlockApi class.
 */
class CustomPageHasBlockApi extends PageHasBlockApi implements CustomPageHasBlockApiInterface
{


    /**
     * Builds the CustomPageHasBlockApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
