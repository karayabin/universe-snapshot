<?php


namespace FormTools\Validation;


class FormValidatorTool
{
    public static function isEmail($s)
    {
        if (filter_var($s, \FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}