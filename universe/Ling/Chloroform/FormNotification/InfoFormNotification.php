<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The InfoFormNotification class.
 */
class InfoFormNotification extends FormNotification
{


    public static function create(string $message)
    {
        return new static('info', $message);
    }
}