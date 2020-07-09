<?php


namespace Ling\Light_UserDatabase\Api\Custom\Classes;

use Ling\Light_UserDatabase\Api\Generated\Classes\UserGroupApi;
use Ling\Light_UserDatabase\Api\Custom\Interfaces\CustomUserGroupApiInterface;



/**
 * The CustomUserGroupApi class.
 */
class CustomUserGroupApi extends UserGroupApi implements CustomUserGroupApiInterface
{


    /**
     * Builds the CustomUserGroupApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

}
