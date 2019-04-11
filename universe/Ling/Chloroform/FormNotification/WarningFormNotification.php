<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The WarningFormNotification class.
 */
class WarningFormNotification extends FormNotification
{


    public static function create(string $message)
    {
        return new static('warning', $message);
    }
}