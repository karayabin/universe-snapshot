<?php

namespace Ling\MikeMagicTools\File;

/*
 * LingTalfi 2016-02-01
 */

class MikeFileRemoveFirstXLinesTool
{


    /**
     * Remove the x first lines of the given set of files.
     */
    public static function removeFirstXLines($x, array $files)
    {
        $x = (int)$x;
        if ($x > 0) {
            MikeFileFreeHandTool::updateFiles($files, function ($c, $file) use ($x) {
                $lines = file($file);
                for ($i = 0; $i < $x; $i++) {
                    array_shift($lines);
                }
                
                if (is_array($lines)) {
                    return implode('', $lines);
                }
                return ""; // assuming x > nbLines
            });
        }
        else {
            trigger_error("x must be positive", E_USER_WARNING);
        }
    }
}
