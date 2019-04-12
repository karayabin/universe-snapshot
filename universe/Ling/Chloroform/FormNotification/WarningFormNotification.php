<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The WarningFormNotification class.
 */
class WarningFormNotification extends FormNotification
{


    /**
     * Builds and returns the instance.
     *
     * @param string $message
     * @return $this
     */
    public static function create(string $message)
    {
        return new static('warning', $message);
    }
}