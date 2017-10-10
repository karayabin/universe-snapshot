<?php

namespace Models\Notification;


use Models\Model\AbstractModel;


/**
 * The notifications model is an array which contains any number of notification.
 * Each notification is an array with two keys:
 *
 * - type: string, the type of notification, can be one of: success, info, error, warning
 * - title: null|string, the title of the notification, or null to use the default value
 *          provided by the concrete implementation (which might not display the title as well)
 *
 * - msg: null|string, the message of the notification, can contain html, or null to use the default value.
 *
 */
class NotificationsModel extends AbstractModel
{


    /**
     * @param $type
     * @param $msg
     */
    public function addNotification($type, $title, $msg)
    {
        $this->array[] = [
            'type' => $type,
            'title' => $title,
            'msg' => $msg,
        ];
        return $this;
    }
}