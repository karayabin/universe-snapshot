<?php

namespace IndentedLines\KeyFinder;

use Bate\MicroStringTool;
use Quoter\QuoteTool;


/**
 * KeyFinder
 * @author Lingtalfi
 * 2015-12-14
 *
 *
 * This key finder accepts blanks between the key and the kvSep.
 *
 */
class KeyFinder implements KeyFinderInterface
{


    protected $kvSep;
    private $kvSepLen;

    public function __construct()
    {
        $this->kvSep = ':';
        $this->kvSepLen = 1;
    }


    public static function create()
    {
        return new static();
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS KeyFinderInterface
    //------------------------------------------------------------------------------/
    public function findKey($lineContent, &$pos = 0)
    {
        $ret = false;

        if (false !== $lastPhpEndQuote = QuoteTool::getCorrespondingEndQuotePos($lineContent)) {
            /**
             * the very next non blank char should be the kvSep in the case of a valid key
             */
            $after = mb_substr($lineContent, $lastPhpEndQuote + 1);
            $fromQuoteToKvSepLen = 0;
            MicroStringTool::skipBlanks($after, $fromQuoteToKvSepLen); // assume kvSep is not blank
            if ($this->kvSep === mb_substr($after, $fromQuoteToKvSepLen, $this->kvSepLen)) {
                $ret = QuoteTool::unquote(mb_substr($lineContent, 0, $lastPhpEndQuote + 1));
                $pos += $lastPhpEndQuote + 1 + $fromQuoteToKvSepLen + $this->kvSepLen;
            }
        }
        // using default kvSep symbol ?
        elseif (false !== $kvPos = mb_strpos($lineContent, $this->kvSep)) {
            $ret = trim(mb_substr($lineContent, 0, $kvPos));
            $pos += $kvPos + $this->kvSepLen;
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setKvSep($kvSep)
    {
        $this->kvSep = $kvSep;
        $this->kvSepLen = mb_strlen($kvSep);
        return $this;
    }

}
