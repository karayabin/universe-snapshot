<?php

namespace Ling\MikeMagicTools\File;

/*
 * LingTalfi 2016-02-01
 * 
 */

class MikeFileStripLinesTool
{


    /**
     * Remove only the lines containing the needle.
     */
    public static function strip(array $files, $needle)
    {
        MikeFileFreeHandTool::updateFiles($files, function ($c, $file) use ($needle) {
            $lines = file($file);
            foreach($lines as $k => $v){
                if(false !== strpos($v, $needle)){
                    unset($lines[$k]);
                }
            }
            return implode('', $lines);
        });
    }
}
