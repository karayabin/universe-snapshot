<?php


namespace Ling\OnTheFlyForm\Helper;


use Ling\OnTheFlyForm\OnTheFlyFormInterface;

class OffProtocolHelper
{


    public static function success(array &$out, OnTheFlyFormInterface $form, $data = null)
    {
        $out = [
            "type" => "success",
            "model" => $form->getModel(),
            "data" => $data,
        ];
    }

    public static function formError(array &$out, OnTheFlyFormInterface $form)
    {
        $out = [
            "type" => "formerror",
            "model" => $form->getModel(),
        ];
    }

    public static function error(array &$out, $msg)
    {
        $out = [
            "type" => "error",
            "error" => $msg,
        ];
    }

}