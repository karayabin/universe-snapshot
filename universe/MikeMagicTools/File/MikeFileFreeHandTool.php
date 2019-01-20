<?php

namespace MikeMagicTools\File;

/*
 * LingTalfi 2016-02-01
 * Be careful.
 */

use Bat\FileSystemTool;

class MikeFileFreeHandTool
{


    public static $dontPullOutMyHair = true;
    public static $safePath = '/tmp/MikeMagicTools/trash';

    /**
     * Update the given files by applying the given callable.
     *
     *          str:newFileContent     callable ( str:currentFileContent, str:fileAbsolutePath )
     *
     */
    public static function updateFiles(array $files, callable $fn)
    {
        self::makeASafeCopy($files);
        foreach ($files as $file) {
            if (file_exists($file) && is_readable($file)) {
                file_put_contents($file, call_user_func($fn, file_get_contents($file), $file));
            }
            else {
                trigger_error("file not found or not readable: $file", E_USER_WARNING);
            }
        }
    }

    public static function endSession()
    {
        FileSystemTool::remove(self::$safePath);
    }


    private static function makeASafeCopy(array $files)
    {
        if (true === self::$dontPullOutMyHair) {
            foreach ($files as $file) {
                if (is_file($file)) {
                    $target = self::$safePath . "/" . $file;
                    if (true === FileSystemTool::mkdir(dirname($target), 0777, true)) {
                        copy($file, $target);
                    }
                }
                else {
                    trigger_error("not a file: $file", E_USER_WARNING);
                }
            }
        }
    }
}
