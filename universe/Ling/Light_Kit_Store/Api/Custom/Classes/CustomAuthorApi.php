<?php


namespace Ling\Light_Kit_Store\Api\Custom\Classes;

use Ling\Light_Kit_Store\Api\Generated\Classes\AuthorApi;
use Ling\Light_Kit_Store\Api\Custom\Interfaces\CustomAuthorApiInterface;



/**
 * The CustomAuthorApi class.
 */
class CustomAuthorApi extends AuthorApi implements CustomAuthorApiInterface
{


    /**
     * Builds the CustomAuthorApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
