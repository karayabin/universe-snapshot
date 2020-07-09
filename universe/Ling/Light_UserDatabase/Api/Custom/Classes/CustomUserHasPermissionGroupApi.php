<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\UserHasPermissionGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserHasPermissionGroupApiInterface;



/**
 * The CustomUserHasPermissionGroupApi class.
 */
class CustomUserHasPermissionGroupApi extends UserHasPermissionGroupApi implements CustomUserHasPermissionGroupApiInterface
{


    /**
     * Builds the CustomUserHasPermissionGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
