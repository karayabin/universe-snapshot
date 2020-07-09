<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupHasPluginOptionApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupHasPluginOptionApiInterface;



/**
 * The CustomUserGroupHasPluginOptionApi class.
 */
class CustomUserGroupHasPluginOptionApi extends UserGroupHasPluginOptionApi implements CustomUserGroupHasPluginOptionApiInterface
{


    /**
     * Builds the CustomUserGroupHasPluginOptionApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
