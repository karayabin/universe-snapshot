<?php


namespace Ling\Light_UserData\Api\Custom\Classes;

use Ling\Light_UserData\Api\Generated\Classes\ResourceHasTagApi;
use Ling\Light_UserData\Api\Custom\Interfaces\CustomResourceHasTagApiInterface;



/**
 * The CustomResourceHasTagApi class.
 */
class CustomResourceHasTagApi extends ResourceHasTagApi implements CustomResourceHasTagApiInterface
{


    /**
     * Builds the CustomResourceHasTagApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
