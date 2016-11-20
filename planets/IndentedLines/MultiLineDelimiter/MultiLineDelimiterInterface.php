<?php


namespace IndentedLines\MultiLineDelimiter;


/**
 * MultiLineDelimiterInterface
 * @author Lingtalfi
 * 2015-12-14
 *
 */
interface MultiLineDelimiterInterface
{


    public function isBegin($line);

    public function isEnd($line);
}
