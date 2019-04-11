<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The ErrorFormNotification class.
 */
class ErrorFormNotification extends FormNotification
{


    public static function create(string $message)
    {
        return new static('error', $message);
    }
}