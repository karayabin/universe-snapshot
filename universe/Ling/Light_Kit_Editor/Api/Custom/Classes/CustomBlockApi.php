<?php


namespace Ling\Light_Kit_Editor\Api\Custom\Classes;

use Ling\Light_Kit_Editor\Api\Generated\Classes\BlockApi;
use Ling\Light_Kit_Editor\Api\Custom\Interfaces\CustomBlockApiInterface;



/**
 * The CustomBlockApi class.
 */
class CustomBlockApi extends BlockApi implements CustomBlockApiInterface
{


    /**
     * Builds the CustomBlockApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
