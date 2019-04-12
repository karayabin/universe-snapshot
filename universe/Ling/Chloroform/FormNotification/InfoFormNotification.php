<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The InfoFormNotification class.
 */
class InfoFormNotification extends FormNotification
{


    /**
     * Builds and returns the instance.
     *
     * @param string $message
     * @return $this
     */
    public static function create(string $message)
    {
        return new static('info', $message);
    }
}