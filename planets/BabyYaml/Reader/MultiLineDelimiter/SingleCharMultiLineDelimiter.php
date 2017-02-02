<?php


namespace BabyYaml\Reader\MultiLineDelimiter;


/**
 * SingleCharMultiLineDelimiter
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class SingleCharMultiLineDelimiter implements MultiLineDelimiterInterface
{

    protected $startChar;
    protected $endChar;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'startChar' => '<',
            'endChar' => '>',
        ], $options);
        $this->startChar = $options['startChar'];
        $this->endChar = $options['endChar'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MultiLineDetectorInterface
    //------------------------------------------------------------------------------/
    public function isBegin($line)
    {
        $lastChar = substr(rtrim($line), -1);
        return ($this->startChar === $lastChar);
    }

    public function isEnd($line)
    {
        return ($this->endChar === trim($line));
    }

}
