<?php

namespace IndentedLines\KeyFinder;


/**
 * KeyFinderInterface
 * @author Lingtalfi
 * 2015-12-14
 * 
 */
interface KeyFinderInterface
{
    /**
     * Find the kvSep, and do one of the following:
     * - if the kvSep symbol is found, return the key (quote unprotected if necessary) and set the position to where the value begins (the position just after the kvSep symbol).
     * - if the kvSep symbol is not found, return false
     *
     * @return false|string
     * 
     * 
     * Note: the lineContent is always scanned from the beginning and is not affected by the $pos argument.  
     *
     */
    public function findKey($lineContent, &$pos = 0);
}
