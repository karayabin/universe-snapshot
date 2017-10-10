<?php


namespace CrudGeneratorTools\Skinny\Helper;


class SkinnyHelper
{

    private static $paramSep = '+';
    private static $keyValueSep = '=';

    public static function addParams(&$type, array $params)
    {
        foreach ($params as $k => $v) {
            $type .= self::$paramSep . $k . self::$keyValueSep . $v;
        }
    }


    public static function extractParams($type)
    {
        $ret = [];
        $p = explode(self::$paramSep, $type);
        array_shift($p); // drop the type
        foreach ($p as $kv) {
            $pp = explode(self::$keyValueSep, $kv);
            $ret[$pp[0]] = $pp[1];
        }
        return $ret;
    }


}