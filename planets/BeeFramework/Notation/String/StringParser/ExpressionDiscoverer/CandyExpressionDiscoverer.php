<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer;

use BeeFramework\Bat\Escaping\EscapeTool;
use BeeFramework\Bat\QuoteTool;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Tool\ExpressionDiscovererTool;
use BeeFramework\Notation\WrappedString\Tool\WrappedStringTool;


/**
 * CandyExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-16
 *
 * In this document,
 * a candy expression is an expression which starts and begin with the same symbol.
 * Both the symbols can be protected using the simple backslash escaping mechanism.
 *
 * Hence:
 *
 *      §doo§
 *              is a candy expression which value is doo
 *      §doo§daa§
 *              is a candy expression which value is doo
 *              (a symbol cannot be interpreted more than once)
 *      §doo\§daa§
 *              is a candy expression which value is doo§daa
 *      §doo\§
 *      \§doo§
 *              both are not candy expressions
 *
 *
 *
 *
 */
class CandyExpressionDiscoverer extends ExpressionDiscoverer
{

    private $escapingMode;
    private $symbol;
    private $symbolLen;

    public function __construct()
    {
        parent::__construct();
        $this->escapingMode = 1;
        $this->symbol = '§';
        $this->symbolLen = 1;
    }


    public static function create()
    {
        return new static();
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExpressionDiscovererInterface
    //------------------------------------------------------------------------------/
    /**
     * Parse a string, looking for an expression.
     * If the expression is found, the method will define the value and the position
     * of the last char of the expression, and then return true.
     *
     * It returns false otherwise (and the value and position are not set).
     *
     *
     * @return bool
     */
    public function parse($string, $pos = 0)
    {

        if (false !== $lastPos = WrappedStringTool::findCandyStringEndPos($string, $this->symbol, $pos, $this->escapingMode)) {
            $inner = mb_substr($string, $pos + $this->symbolLen, $lastPos - $pos - $this->symbolLen);
            $s = EscapeTool::unescape($inner, $this->symbol, $this->escapingMode);
            $this->value = $s;
            $lastPos = ExpressionDiscovererTool::getLastCharRealPosition($lastPos, $this->symbolLen);
            $this->pos = $lastPos;
            return true;
        }
        return false;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        $this->symbolLen = mb_strlen($symbol);
        return $this;
    }


}
