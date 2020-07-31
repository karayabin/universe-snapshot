<?php


namespace Ling\BabyYaml\Reader\MultiLineDelimiter;


/**
 * SingleCharMultiLineDelimiter
 * @author Lingtalfi
 * 2015-02-27 -> 2020-07-14
 *
 */
class SingleCharMultiLineDelimiter implements MultiLineDelimiterInterface
{

    protected $startChar;
    protected $endChar;
    protected $commentChar;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'startChar' => '<',
            'endChar' => '>',
            /**
             * Note: I only handle one char here (i.e. other tools of the BabyYaml suite generally handle multiple char delimiter,
             * but now BabyYaml standard has settled on the # char for comments, so, I just want to be practical).
             */
            'commentChar' => '#',
        ], $options);
        $this->startChar = $options['startChar'];
        $this->endChar = $options['endChar'];
        $this->commentChar = $options['commentChar'];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MultiLineDetectorInterface
    //------------------------------------------------------------------------------/
    public function isBegin($line)
    {
        if (false !== strpos($line, $this->startChar)) {


            $p = explode($this->commentChar, $line, 2);
            if (2 === count($p)) {
                $originalLine = $line;
                $line = array_shift($p);
                $comment = $this->commentChar . array_shift($p);
                $this->onCommentFound($comment, $originalLine, true);
            }

            $lastChar = substr(rtrim($line), -1);
            return ($this->startChar === $lastChar);
        }
        return false;
    }

    public function isEnd($line, $nbIndentChars, $indentChar)
    {
        if (false !== strpos($line, $this->endChar)) {


            $p = explode($this->commentChar, $line, 2);
            if (2 === count($p)) {
                $originalLine = $line;
                $line = array_shift($p);
                $comment = $this->commentChar . array_shift($p);
                $this->onCommentFound($comment, $originalLine, false);
            }


            return (
                $this->endChar === trim($line) &&
                0 === strpos($line, str_repeat($indentChar, $nbIndentChars) . $this->endChar)
            );
        }
        return false;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * A hook for accessing comments attached to the multiline text.
     *
     * @param string $comment
     * @param string $line
     * @param bool $isBegin , whether the comment is attached on the begin char or the end char of the multiline.
     *
     * @overrideMe
     */
    protected function onCommentFound(string $comment, string $line, bool $isBegin)
    {

    }
}
