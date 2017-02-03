<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-11
 */
class CleanListBuddyTool
{

    public static function outputCleanList($dataFile)
    {
        $lines = file($dataFile);
        $lines = array_unique($lines);
        sort($lines);
        foreach ($lines as $l) {
            $l = trim($l);
            if ('' !== $l) {
                echo "$l<br>";
            }
        }
    }
}
