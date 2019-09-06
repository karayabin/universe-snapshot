<?php


namespace Ling\WiseTool;


use Ling\Chloroform\FormNotification\ErrorFormNotification;
use Ling\Chloroform\FormNotification\FormNotificationInterface;
use Ling\Chloroform\FormNotification\InfoFormNotification;
use Ling\Chloroform\FormNotification\SuccessFormNotification;
use Ling\Chloroform\FormNotification\WarningFormNotification;
use Ling\Light_Kit_Admin\Notification\LightKitAdminNotification;
use Ling\WiseTool\Exception\WiseToolException;

/**
 * The WiseTool class.
 *
 * This is just an adaptor class.
 *
 *
 * Did you ever encounter the following notification words?
 *
 * - warning
 * - info
 * - success
 * - error
 *
 * Those are pretty standard notification types.
 * However, if if you've worked with bootstrap 4, you'll see that they have some notification classes, but the wording
 * is a little bit different:
 *
 * - warning
 * - primary
 * - success
 * - danger
 *
 * Ok.
 * Now let me add my own, one letter variation:
 *
 * - w (warning)
 * - i (info)
 * - s (success)
 * - e (error)
 *
 *
 * I use those some times in some notifying tools I create.
 *
 *
 *
 * Also there are the @page(Chloroform notification classes), and probably a lot of other systems.
 *
 *
 * And so we end up with those notifications which basically are the same, but they just have different names (or representations).
 * The goal of this class is to provide easy translation from one set to another.
 *
 * The first set is called regular, the second is called bootstrap, and the third (one letter) is called wise.
 *
 * The chloroform objects are called "chloroform".
 *
 *
 *
 * So to recap, here are the supported systems:
 *
 * - regular
 * - bootstrap
 * - wise
 * - chloroform
 *
 *
 *
 *
 *
 *
 */
class WiseTool
{

    /**
     * Returns the regular version of the given wise notification type.
     *
     * @param string $wiseType
     * @return string
     * @throws WiseToolException
     */
    public static function wiseToRegular(string $wiseType): string
    {
        switch ($wiseType) {
            case "w":
                return "warning";
            case "i":
                return "info";
            case "s":
                return "success";
            case "e":
                return "error";
            default:
                throw new WiseToolException("Unknown wise type $wiseType.");
                break;
        }
    }


    /**
     * Returns the bootstrap version of the given wise notification type.
     *
     * @param string $wiseType
     * @return string
     * @throws WiseToolException
     */
    public static function wiseToBootstrap(string $wiseType): string
    {
        switch ($wiseType) {
            case "w":
                return "warning";
            case "i":
                return "primary";
            case "s":
                return "success";
            case "e":
                return "danger";
            default:
                throw new WiseToolException("Unknown wise type $wiseType.");
                break;
        }
    }


    /**
     * Returns the chloroform version of the given wise notification type.
     *
     * @param string $wiseType
     * @param string $message
     * @return FormNotificationInterface
     * @throws WiseToolException
     */
    public static function wiseToChloroform(string $wiseType, string $message): FormNotificationInterface
    {
        switch ($wiseType) {
            case "w":
                return WarningFormNotification::create($message);
            case "i":
                return InfoFormNotification::create($message);
            case "s":
                return SuccessFormNotification::create($message);
            case "e":
                return ErrorFormNotification::create($message);
            default:
                throw new WiseToolException("Unknown wise type $wiseType.");
                break;
        }
    }


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
     * Returns the bootstrap version of the given regular notification type.
     *
     * @param string $regularType
     * @return string
     * @throws WiseToolException
     */
    public static function regularToBootstrap(string $regularType): string
    {
        switch ($regularType) {
            case "warning":
                return "warning";
            case "info":
                return "primary";
            case "success":
                return "success";
            case "error":
                return "danger";
            default:
                throw new WiseToolException("Unknown regular type $regularType.");
                break;
        }
    }


    /**
     * Returns the wise version of the given regular notification type.
     *
     * @param string $regularType
     * @return string
     * @throws WiseToolException
     */
    public static function regularToWise(string $regularType): string
    {
        switch ($regularType) {
            case "warning":
                return "w";
            case "info":
                return "i";
            case "success":
                return "s";
            case "error":
                return "e";
            default:
                throw new WiseToolException("Unknown regular type $regularType.");
                break;
        }
    }

    /**
     * Returns the chloroform version of the given regular notification type.
     *
     * @param string $regularType
     * @param string $message
     * @return FormNotificationInterface
     * @throws WiseToolException
     */
    public static function regularToChloroform(string $regularType, string $message): FormNotificationInterface
    {
        switch ($regularType) {
            case "warning":
                return WarningFormNotification::create($message);
            case "info":
                return InfoFormNotification::create($message);
            case "success":
                return SuccessFormNotification::create($message);
            case "error":
                return ErrorFormNotification::create($message);
            default:
                throw new WiseToolException("Unknown regular type $regularType.");
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
     * Returns the regular version of the given bootstrap notification type.
     *
     * @param string $bootstrapType
     * @return string
     * @throws WiseToolException
     */
    public static function bootstrapToRegular(string $bootstrapType): string
    {
        switch ($bootstrapType) {
            case "warning":
                return "warning";
            case "primary":
                return "info";
            case "success":
                return "success";
            case "danger":
                return "error";
            default:
                throw new WiseToolException("Unknown bootstrap type $bootstrapType.");
                break;
        }
    }

    /**
     * Returns the wise version of the given bootstrap notification type.
     *
     * @param string $bootstrapType
     * @return string
     * @throws WiseToolException
     */
    public static function bootstrapToWise(string $bootstrapType): string
    {
        switch ($bootstrapType) {
            case "warning":
                return "w";
            case "primary":
                return "i";
            case "success":
                return "s";
            case "danger":
                return "e";
            default:
                throw new WiseToolException("Unknown bootstrap type $bootstrapType.");
                break;
        }
    }


    /**
     * Returns the chloroform version of the given bootstrap notification type.
     *
     * @param string $bootstrapType
     * @param string $message
     * @return FormNotificationInterface
     * @throws WiseToolException
     */
    public static function bootstrapToChloroform(string $bootstrapType, string $message): FormNotificationInterface
    {
        switch ($bootstrapType) {
            case "warning":
                return WarningFormNotification::create($message);
            case "primary":
                return InfoFormNotification::create($message);
            case "success":
                return SuccessFormNotification::create($message);
            case "danger":
                return ErrorFormNotification::create($message);
            default:
                throw new WiseToolException("Unknown bootstrap type $bootstrapType.");
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