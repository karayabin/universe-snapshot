<?php

namespace InstantLog;

/*
 * LingTalfi 2016-02-01
 */

use Bat\ExceptionTool;

class InstantLog
{

    /**
     * I recommend to add an alias in your .bashrc (otherwise you miss the "instant" point):
     *
     *      alias ilog='tail -f /tmp/instantlog.txt'
     *
     *
     */
    public static $file = "/tmp/instantlog.txt";


    public static function log($m)
    {
        if ($m instanceof \Exception) {
            $m = ExceptionTool::toString($m);
        }
        file_put_contents(self::$file, $m . PHP_EOL, FILE_APPEND);
    }

}
