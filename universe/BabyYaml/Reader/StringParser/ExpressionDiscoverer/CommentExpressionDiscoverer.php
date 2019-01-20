<?php

namespace BabyYaml\Reader\StringParser\ExpressionDiscoverer;


/**
 * CommentExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-12
 *
 * This class can recognize a comment expression which symbol is static (with fixed length).
 *
 *
 */
class CommentExpressionDiscoverer extends ExpressionDiscoverer //implements NoValueExpressionDiscovererInterface
{

    private $symbol;
    private $symbolLen;

    public function __construct()
    {
        parent::__construct();
        $this->symbol = ' #';
        $this->symbolLen = 2;
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

        if ($this->symbol === substr($string, $pos, $this->symbolLen)) {
            $this->pos = mb_strlen($string) - 1;
            return true;
        }
        return false;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
        $this->symbolLen = mb_strlen($this->symbol);
        return $this;
    }

}
