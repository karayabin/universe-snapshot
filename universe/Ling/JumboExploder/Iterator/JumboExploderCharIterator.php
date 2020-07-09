<?php


namespace Ling\JumboExploder\Iterator;


use Ling\Bat\StringTool;

/**
 * The JumboExploderCharIterator class.
 */
class JumboExploderCharIterator
{

    /**
     * This property holds the chars for this instance.
     * @var array
     */
    protected $chars;

    /**
     * This property holds the index for this instance.
     * Null means the reading hasn't started yet.
     *
     * @var int|null
     */
    protected $index;

    /**
     * Builds the JumboExploderCharIterator instance.
     */
    public function __construct()
    {
        $this->chars = [];
        $this->index = null;
    }


    /**
     * Sets the string to parse.
     * @param string $str
     */
    public function setString(string $str)
    {
        $this->chars = StringTool::split($str);
    }


    /**
     * Moves the index forward and returns the corresponding character.
     * Note: if the reading was not started, the first character will be returned.
     * If there is not more character, null will be returned.
     *
     * You can move more than one character by using the n argument.
     *
     * @param int $n
     * @return string
     */
    public function next(int $n = 1): ?string
    {
        $ret = null;
        if (null === $this->index) {
            $this->index = 0;
        } else {
            $this->index += $n;
        }
        if (array_key_exists($this->index, $this->chars)) {
            $ret = $this->chars[$this->index];
        }
        return $ret;
    }


    /**
     * Returns the trimmed substring from the current index to the (current index + length).
     *
     * Note: if there are not enough characters (end of content), the empty string
     * will replace any missing character.
     *
     *
     *
     *
     * @param int $length
     * @return string
     */
    public function lookahead(int $length): string
    {
        $ret = '';
        if (null === $this->index) {
            return '';
        }
        $endIndex = $this->index + $length;
        for ($i = $this->index; $i <= $endIndex; $i++) {
            if (array_key_exists($i, $this->chars)) {
                $ret .= $this->chars[$i];
            } else {
                $ret .= '';
            }
        }
        return trim($ret);
    }

}