<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\File\IndentedLines\KeyFinder;

use BeeFramework\Bat\QuoteTool;
use BeeFramework\Bat\StringTool;


/**
 * KeyFinder
 * @author Lingtalfi
 * 2015-02-27
 *
 */
class KeyFinder implements KeyFinderInterface
{


    protected $autoIndexSymbol;
    protected $kvSep;
    private $autoIndexSymbolLen;
    private $kvSepLen;

    public function __construct(array $options = [])
    {
        $options = array_replace([
            'autoIndexSymbol' => '-',
            'kvSep' => ':',
        ], $options);
        $this->autoIndexSymbol = $options['autoIndexSymbol'];
        $this->kvSep = $options['kvSep'];

        if (is_string($this->autoIndexSymbol)) {
            $this->autoIndexSymbolLen = strlen($this->autoIndexSymbol);
            if (is_string($this->kvSep)) {
                $this->kvSepLen = strlen($this->kvSep);
            }
            else {
                throw new \InvalidArgumentException(sprintf("option.kvSep must be of type string, %s given", gettype($this->kvSep)));
            }
        }
        else {
            throw new \InvalidArgumentException(sprintf("option.autoIndexSymbol must be of type string, %s given", gettype($this->autoIndexSymbol)));
        }
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS KeyFinderInterface
    //------------------------------------------------------------------------------/
    /**
     *
     *
     * A valid key is defined as follow:
     *
     *      - it has one of the two following formats:
     *              - defaultFormat: <key> <kvSep>
     *              - phpFormat: <autoIndexSymbol>
     *
     *      - a key in defaultFormat can be protected with quotes
     *      - a key in defaultFormat starting with a quote IS ALWAYS a quoted key
     *
     * @param $line , string starting with a non blank char
     *
     * @return false|null|string:
     *
     *          Let p be the portion of line starting at pos.
     *          Returns false if a valid key couldn't be found in p.
     *          Otherwise, it's a success:
     *                  - $pos is updated and indicates the position just after kvSep (defaultFormat) or autoIndexSymbol (phpFormat)
     *                  - one of the following values is returned:
     *                          - null: indicates that the php's native indexation mechanism should be used
     *                          - string: the key
     *
     */
    public function getKey($line, &$pos)
    {
        $ret = false;
        $sub = substr($line, $pos);
        $trimSub = ltrim($sub);

        // using auto index ?
        if (null !== $this->autoIndexSymbol && $this->autoIndexSymbol === substr($sub, 0, $this->autoIndexSymbolLen)) {
            $beforeFirstQuoteBlankLen = strlen($sub) - strlen($trimSub);
            $ret = null;
            $pos += $beforeFirstQuoteBlankLen + $this->autoIndexSymbolLen;
        }
        // using quoted key
        elseif (false !== $lastPhpEndQuote = QuoteTool::getCorrespondingEndQuotePos($trimSub)) {
            /**
             * the first char is a quote, we are looking for the very next char which
             * is the kvSep in the case of a valid key
             */
            $beforeFirstQuoteBlankLen = strlen($sub) - strlen($trimSub);
            $after = substr($trimSub, $lastPhpEndQuote + 1);
            $fromQuoteToKvSepLen = 0;
            StringTool::skipBlanks($after, $fromQuoteToKvSepLen); // assume kvSep is not blank
            if ($this->kvSep === substr($after, $fromQuoteToKvSepLen, $this->kvSepLen)) {
                $ret = QuoteTool::unquote(substr($trimSub, 0, $lastPhpEndQuote + 1));
                $pos += $beforeFirstQuoteBlankLen + $lastPhpEndQuote + 1 + $fromQuoteToKvSepLen + $this->kvSepLen;
            }
        }
        // using default kvSep symbol ?
        elseif (false !== $kvPos = strpos($sub, $this->kvSep)) {
            $ret = trim(substr($sub, 0, $kvPos));
            $pos += $kvPos + $this->kvSepLen;
        }
        return $ret;
    }

}
