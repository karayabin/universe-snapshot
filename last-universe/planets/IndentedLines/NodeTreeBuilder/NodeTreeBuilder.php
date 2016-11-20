<?php


namespace IndentedLines\NodeTreeBuilder;


/**
 * NodeTreeBuilder
 * @author Lingtalfi
 * 2015-12-14
 *
 */
class NodeTreeBuilder extends BaseNodeTreeBuilder
{

    private $indentChar;
    private $hasLeadingIndentChar;
    private $nbIndentCharPerLevel;

    private $indentCharLen;

    public function __construct()
    {
        $this->indentChar = ' ';
        $this->nbIndentCharPerLevel = 4;
        $this->hasLeadingIndentChar = false;
        $this->indentCharLen = 1;
        parent::__construct();
    }


    /**
     * @return string|false in case of failure,
     *                  in which case a codified error should be triggered.
     *                  A line content is the line once the indentation symbols and
     *                  starting blank chars have been stripped out.
     */
    protected function getLineWithoutIndent($line, &$level)
    {
        $level = $this->getLineLevel($line);
        if (1 === $this->indentCharLen) {
            return ltrim(ltrim($line, $this->indentChar));
        }
        else {
            while (0 === strpos($line, $this->indentChar)) {
                $line = mb_substr($line, $this->indentCharLen);
            }
            return ltrim($line);
        }
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return int|false in case of failure
     */
    private function getLineLevel($line)
    {
        $len = mb_strlen($line);
        $len2 = mb_strlen(ltrim($line, $this->indentChar));
        $nbIndentChars = $len - $len2;

        if (true === $this->hasLeadingIndentChar) {
            if ($nbIndentChars > 0) {
                if (0 === ($nbIndentChars - 1) % $this->nbIndentCharPerLevel) {
                    return (int)(($nbIndentChars - 1) / $this->nbIndentCharPerLevel);
                }
                else {
                    $this->syntaxError(str_replace('{n}', $this->nbIndentCharPerLevel, "The number of dash starting a line must be equal to {n}n + 1, n being the level of the element{location}"));
                }
            }
            else {
                $this->syntaxError(sprintf("hasLeadingIndentChar violation: a line must start with the indentChar (%s){location}", $this->indentChar));
            }
        }
        else {
            if (0 !== $nbIndentChars % $this->nbIndentCharPerLevel) {
                $this->syntaxError(sprintf("Number of indentChars (%s) for indentation must be a multiple of %s, (%s indentChars found){location}",
                    $this->indentChar,
                    $this->nbIndentCharPerLevel,
                    $nbIndentChars
                ));
            }
            $level = ($nbIndentChars / $this->nbIndentCharPerLevel);
            return $level;
        }
        return 0;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setHasLeadingIndentChar($hasLeadingIndentChar)
    {
        $this->hasLeadingIndentChar = $hasLeadingIndentChar;
        return $this;
    }

    public function setIndentChar($indentChar)
    {
        $this->indentChar = $indentChar;
        $this->indentCharLen = mb_strlen($indentChar);
        return $this;
    }

    public function setNbIndentCharPerLevel($nbIndentCharPerLevel)
    {
        $this->nbIndentCharPerLevel = $nbIndentCharPerLevel;
        return $this;
    }


}
