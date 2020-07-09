<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\PermissionGroupHasPermissionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomPermissionGroupHasPermissionApiInterface;



/**
 * The CustomPermissionGroupHasPermissionApi class.
 */
class CustomPermissionGroupHasPermissionApi extends PermissionGroupHasPermissionApi implements CustomPermissionGroupHasPermissionApiInterface
{


    /**
     * Builds the CustomPermissionGroupHasPermissionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
