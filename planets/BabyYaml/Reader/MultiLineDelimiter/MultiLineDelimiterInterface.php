<?php



namespace BabyYaml\Reader\MultiLineDelimiter;


/**
 * MultiLineDelimiterInterface
 * @author Lingtalfi
 * 2015-02-27
 *
 */
interface MultiLineDelimiterInterface
{


    public function isBegin($line);

    public function isEnd($line);
}
