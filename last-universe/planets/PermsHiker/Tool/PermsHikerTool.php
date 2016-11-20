<?php

namespace PermsHiker\Tool;

/*
 * LingTalfi 2016-06-22
 */
use PermsHiker\Exception\PermsHikerException;

class PermsHikerTool {

    
    public static function pullDataFromPermsMapEntry($line){
        $line = trim($line);

        /**
         * parsing the separator from the end,
         * so to avoid potential conflict of a path
         * that contains the separator.
         */
        $enil = strrev($line);
        $p = explode(':', $enil, 4);
        if (4 === count($p)) {
            $mode = strrev($p[0]);
            $ownerGroup = strrev($p[1]);
            $owner = strrev($p[2]);
            $path = strrev($p[3]);
            return [$mode, $ownerGroup, $owner, $path];
        }
        else {
            throw new PermsHikerException("invalid perms list entry notation, please check the doc: $line");
        }
    }
    
}
