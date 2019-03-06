<?php


namespace Ling\QuickPdo\Helper;


use Ling\QuickPdo\QuickPdo;

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

    public static function executeFile(string $file)
    {
        $content = file_get_contents($file);
        QuickPdo::freeExec($content);

    }

}