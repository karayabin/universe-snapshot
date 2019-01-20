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
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Tool\ExpressionDiscovererTool;
use BeeFramework\Notation\WrappedString\Tool\WrappedStringTool;


/**
 * VariableExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-17
 *
 * In this document,
 * a variable expression is an expression that starts with an unescaped symbol (default is dollar symbol).
 * The escaping mechanism is by default the simple escape mechanism, this can be changed via setters.
 *
 *
 * allowed chars for var names are by default: [a-ZA-Z0-9_]
 *
 *
 *
 */
class VariableExpressionDiscoverer extends ExpressionDiscoverer
{

    private $escapeMode;
    private $symbol;
    private $symbolLen;
    private $varNamePattern;

    public function __construct()
    {
        parent::__construct();
        $this->escapeMode = 1;
        $this->symbol = '$';
        $this->symbolLen = 1;
        $this->varNamePattern = '!^[a-zA-Z0-9_]+!';
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

        if ($pos === mb_strpos($string, $this->symbol, $pos)) {
            if (false === EscapeTool::isPositionEscaped($string, $pos, $this->escapeMode)) {
                $fpos = $pos + $this->symbolLen;
                $sub = mb_substr($string, $fpos);
                if (preg_match($this->varNamePattern, $sub, $m)) {
                    $s = $m[0];
                    $len = mb_strlen($s);
                    $this->pos = $fpos + $len - 1;
                    $this->value = $s;
                    return true;
                }
            }
        }
        return false;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        $this->symbolLen = mb_strlen($symbol);
        return $this;
    }

    public function setEscapeMode($escapeMode)
    {
        $this->escapeMode = $escapeMode;
        return $this;
    }

    /**
     * @param string $p
     *              The pattern must contain the ^ symbol (begin of line detection).
     *              Default pattern is:
     *
     *                      !^[a-zA-Z0-9_]+!
     *
     * @return $this
     */
    public function setVarNamePattern($p)
    {
        $this->varNamePattern = $p;
        return $this;
    }


}
