<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The FormNotificationInterface interface.
 */
interface FormNotificationInterface{


    /**
     * Returns the type of the notification.
     *
     * The following types are available:
     *
     * - error
     * - warning
     * - info
     * - success
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Returns the message of the notification
     * @return string
     */
    public function getMessage(): string;
}