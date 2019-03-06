<?php


namespace Ling\Notificator;


use Ling\Bat\SessionTool;


/**
 *
 * The problem
 * ---------------
 * Notificator is a good idea, but it assumes the notifications are displayed on the same process.
 * But what happens if the website redirects to another page?
 * -> the notifications are not displayed on the redirected page, and so you loose the ability to notify
 * your users if a redirection is executed by the app.
 *
 *
 * The solution
 * ---------------
 * This SessionNotificator class resolves this problem, and your notifications will basically survive one redirection.
 * It does so by saving the notifications in the php session basically.
 *
 *
 *
 *
 */
class SessionNotificator extends Notificator
{


    protected static function getAllNotifications()
    {
        $notifications = SessionTool::get("notificator-notifications", [
            "success" => [],
            "info" => [],
            "warning" => [],
            "error" => [],
        ]);
        SessionTool::set("notificator-notifications", [
            "success" => [],
            "info" => [],
            "warning" => [],
            "error" => [],
        ]);
        return $notifications;
    }


    protected static function onNotificationAddedAfter(array $notifications)
    {
        SessionTool::set("notificator-notifications", $notifications);
        SessionTool::setFlag("notificator-an-item-was-set");
    }


}