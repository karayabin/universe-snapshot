<?php


namespace Notificator;


use Notificator\Exception\NotificatorException;


/**
 * The basics of a notification is just a simple message (string).
 *
 * However, I can see the case where someday we'll need a title, or an icon or both...
 * I give you the options for that.
 * Use them as you like.
 *
 *
 */
class Notificator
{

    /**
     * @var array of type => notificationItems.
     *      - with: notificationItems, array of notificationItem, each of which:
     *              - 0: string message
     *              - 1: array options, whatever you put in it...
     *
     */
    private static $notifs = [
        "success" => [],
        "info" => [],
        "warning" => [],
        "error" => [],
    ];

    public static function addSuccess(string $msg, array $options = [])
    {
        self::addNotif($msg, "success", $options);
    }

    public static function addInfo(string $msg, array $options = [])
    {
        self::addNotif($msg, "info", $options);
    }

    public static function addWarning(string $msg, array $options = [])
    {
        self::addNotif($msg, "warning", $options);
    }

    public static function addError(string $msg, array $options = [])
    {
        self::addNotif($msg, "error", $options);
    }


    public static function getNotifications(string $type = null)
    {
        $notifs = static::getAllNotifications();
        if (null === $type) {
            return $notifs;
        }
        if (array_key_exists($type, [
            "success",
            "info",
            "warning",
            "error",
        ])) {
            return $notifs[$type];
        }
        throw new NotificatorException("Unknown notification type: $type");
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function onNotificationAddedAfter(array $notifications)
    {

    }

    protected static function getAllNotifications()
    {
        return self::$notifs;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function addNotif(string $msg, string $type, array $options = [])
    {
        self::$notifs[$type][] = [$msg, $options];
        static::onNotificationAddedAfter(self::$notifs);
    }

}