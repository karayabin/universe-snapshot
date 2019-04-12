<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The ErrorFormNotification class.
 */
class ErrorFormNotification extends FormNotification
{


    /**
     * Builds and returns the instance.
     *
     * @param string $message
     * @return $this
     */
    public static function create(string $message)
    {
        return new static('error', $message);
    }
}