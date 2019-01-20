<?php


namespace RowsGenerator\Util;

class QuickPdoRowsGeneratorUtil
{

    public static function getAliasNames($fields)
    {
        $fields = trim($fields);
        $aFields = preg_split('!,\s*\n!', $fields);

        $tmp = [];
        foreach ($aFields as $field) {
            $p = preg_split('!\s+as\s+!', $field);
            $f = array_pop($p);
            $tmp[] = trim(str_replace('`', '', $f));
        }

        return $tmp;
    }

    public static function getFunctionalNames($fields)
    {
        $aFields = preg_split('!,\s*\n!', $fields);
        $ret = array_map(function ($v) {
            $v = trim($v);
            $p = preg_split('/\s+/', $v);
            $v = array_shift($p);
            return $v;
        }, $aFields);
        $ret = array_filter($ret, function ($v) {
            if ('(' === substr($v, 0, 1)) {
                return false;
            }
            return true;
        });
        return $ret;
    }

}