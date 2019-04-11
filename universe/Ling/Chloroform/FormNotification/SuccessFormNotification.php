<?php


namespace Ling\Chloroform\FormNotification;


/**
 * The SuccessFormNotification class.
 */
class SuccessFormNotification extends FormNotification
{


    public static function create(string $message)
    {
        return new static('success', $message);
    }
}