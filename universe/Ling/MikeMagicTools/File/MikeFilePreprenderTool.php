<?php

namespace Ling\MikeMagicTools\File;

/*
 * LingTalfi 2016-02-01
 * 
 * I created this because I needed to test the order in which my js libs were called,
 * so I needed to prepend every js file with a "console.log ( 'file $xx loaded' );" statement.
 * 
 * 
 */

class MikeFilePreprenderTool
{


    /**
     * prependix: str|callable
     * 
     *                  str:                The prefix
     *                  callable:           str:prefix   callable ( str:fileAbsolutePath, str:fileContent )  
     * 
     */
    public static function prependFiles(array $files, $prependix)
    {
        MikeFileFreeHandTool::updateFiles($files, function ($c, $file) use ($prependix) {
            if (is_callable($prependix)) {
                $prependix = call_user_func($prependix, $file, $c);
            }
            return $prependix . $c;
        });
    }
}
