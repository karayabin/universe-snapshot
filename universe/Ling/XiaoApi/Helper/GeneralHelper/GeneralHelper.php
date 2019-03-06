<?php


namespace Ling\XiaoApi\Helper\GeneralHelper;


class GeneralHelper
{

    public static function tableNameToClassName($table, $tablePrefix)
    {
        if (null !== $tablePrefix && 0 === strpos($table, $tablePrefix)) {
            $table = substr($table, strlen($tablePrefix));
        }
        $p = explode('_', $table);
        return implode('', array_map(function ($v) {
            return ucfirst($v);
        }, $p));
    }

}