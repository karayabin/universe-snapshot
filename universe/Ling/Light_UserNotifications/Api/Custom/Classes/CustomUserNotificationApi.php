<?php


namespace Ling\Light_UserNotifications\Api\Custom\Classes;

use Ling\Light_UserNotifications\Api\Custom\Interfaces\CustomUserNotificationApiInterface;
use Ling\Light_UserNotifications\Api\Generated\Classes\UserNotificationApi;


/**
 * The CustomUserNotificationApi class.
 */
class CustomUserNotificationApi extends UserNotificationApi implements CustomUserNotificationApiInterface
{


    /**
     * Builds the CustomUserNotificationApi instance.
     */
    public function __construct()
    {
        parent::__construct();
    }



}
