<?php

namespace Ling\Light_Kit_Admin\Helper;

use Ling\Light_Kit_Admin\Notification\LightKitAdminNotification;
use Ling\WiseTool\Exception\WiseToolException;

/**
 * The LightKitAdminWiseHelper class.
 */
class LightKitAdminWiseHelper
{

    /**
     * Returns the Light_Kit_Admin version of the given wise notification type.
     *
     * @param string $wiseType
     * @param string $message
     * @return LightKitAdminNotification
     * @throws WiseToolException
     */
    public static function wiseToLightKitAdmin(string $wiseType, string $message): LightKitAdminNotification
    {
        switch ($wiseType) {
            case "w":
                return LightKitAdminNotification::createWarning()->body($message);
            case "i":
                return LightKitAdminNotification::createInfo()->body($message);
            case "s":
                return LightKitAdminNotification::createSuccess()->body($message);
            case "e":
                return LightKitAdminNotification::createError()->body($message);
            default:
                throw new WiseToolException("Unknown wise type $wiseType.");
                break;
        }
    }


    /**
     * Returns the Light_Kit_Admin version of the given regular notification type.
     *
     * @param string $regularType
     * @param string $message
     * @return LightKitAdminNotification
     * @throws WiseToolException
     */
    public static function regularToLightKitAdmin(string $regularType, string $message): LightKitAdminNotification
    {
        switch ($regularType) {
            case "warning":
                return LightKitAdminNotification::createWarning()->body($message);
            case "info":
                return LightKitAdminNotification::createInfo()->body($message);
            case "success":
                return LightKitAdminNotification::createSuccess()->body($message);
            case "error":
                return LightKitAdminNotification::createError()->body($message);
            default:
                throw new WiseToolException("Unknown regular type $regularType.");
                break;
        }
    }


    /**
     * Returns the Light_Kit_Admin version of the given bootstrap notification type.
     *
     * @param string $bootstrapType
     * @param string $message
     * @return LightKitAdminNotification
     * @throws WiseToolException
     */
    public static function bootstrapToLightKitAdmin(string $bootstrapType, string $message): LightKitAdminNotification
    {
        switch ($bootstrapType) {
            case "warning":
                return LightKitAdminNotification::createWarning()->body($message);
            case "primary":
                return LightKitAdminNotification::createInfo()->body($message);
            case "success":
                return LightKitAdminNotification::createSuccess()->body($message);
            case "danger":
                return LightKitAdminNotification::createError()->body($message);
            default:
                throw new WiseToolException("Unknown bootstrap type $bootstrapType.");
                break;
        }
    }




}