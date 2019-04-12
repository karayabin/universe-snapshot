<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The SuccessFormNotification class.
 */
class SuccessFormNotification extends FormNotification
{


    /**
     * Builds and returns the instance.
     *
     * @param string $message
     * @return $this
     */
    public static function create(string $message)
    {
        return new static('success', $message);
    }
}