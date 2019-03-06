<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer;
use Ling\BabyYaml\Helper\QuoteTool;


/**
 * QuoteExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-12
 *
 * This quote discoverer uses a backslash recursive escaping mechanism.
 *
 */
class QuoteExpressionDiscoverer extends ExpressionDiscoverer
{

    protected $escapingMode;

    public function __construct()
    {
        parent::__construct();
        $this->escapingMode = 2;
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
        if (false !== $info = QuoteTool::getCorrespondingEndQuoteInfo($string, $this->escapingMode, $pos)) {
            list($quoted, $lastPos) = $info;
            if (false !== $s = QuoteTool::unquote($quoted, $this->escapingMode)) {
                $this->value = $s;
                $this->pos = $lastPos;
                return true;
            }
        }
        return false;
    }


}
