<?php


namespace Ling\Installer\Operation\Util;


use Ling\Bat\ClassTool;

class OperationUtil
{

    public static function getClassLines($content)
    {
        if (preg_match('!{(.*)}!s', $content, $match)) {
            $body = trim($match[1]);
            $p = explode(';', $body);
            return array_filter(array_map('trim', $p));
        }
        return [];
    }
}