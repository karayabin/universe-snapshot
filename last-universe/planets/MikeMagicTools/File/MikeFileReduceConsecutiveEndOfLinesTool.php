<?php

namespace MikeMagicTools\File;

/*
 * LingTalfi 2016-02-01
 */

class MikeFileReduceConsecutiveEndOfLinesTool
{


    /**
     * Reduce consecutive end of lines to one single end of line
     */
    public static function reduce(array $files)
    {
        MikeFileFreeHandTool::updateFiles($files, function ($c, $file) {
            return preg_replace("!\n+!", PHP_EOL, $c);
        });
    }
}
