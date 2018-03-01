<?php


namespace QuickPdo\Helper;


use QuickPdo\QuickPdoStmtTool;

class QuickPdoHelper
{

    private static $quickPdoMethods = [
        'update' => "update",
        'replace' => 'create',
        'insert' => 'create',
        'delete' => 'delete',
    ];


    public static function getActiveMethod($method)
    {
        if (array_key_exists($method, self::$quickPdoMethods)) {
            return self::$quickPdoMethods[$method];
        }
        return false;
    }

}