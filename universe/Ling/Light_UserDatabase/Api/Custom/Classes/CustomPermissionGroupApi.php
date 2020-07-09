<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupApiInterface;



/**
 * The CustomPermissionGroupApi class.
 */
class CustomPermissionGroupApi extends PermissionGroupApi implements CustomPermissionGroupApiInterface
{


    /**
     * Builds the CustomPermissionGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
