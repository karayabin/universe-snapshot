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

use BeeFramework\Bat\StringTool;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Exception\HybridCommentException;


/**
 * HybridExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-12
 *
 *
 * This hybrid can handle comments (with fixed length start symbol), but you have
 * to explicitly ask for it by setting the comment to a non null value.
 *
 *
 * Note that a signal exception is thrown when a comment is detected.
 * This behaviour is part of the strategy that we have implemented.
 * See more details in conception notes, or read comments below to get a hint of what's going on.
 *
 */
class HybridExpressionDiscoverer extends ExpressionDiscoverer implements GreedyExpressionDiscovererInterface
{

    private $symbols;
    private $commentSymbol;
    private $autoCast;

    public function __construct()
    {
        parent::__construct();
        $this->symbols = [];
        $this->commentSymbol = null;
        $this->commentSymbolLen = 0;
        $this->autoCast = true;
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
     * @throws HybridCommentException
     */
    public function parse($string, $pos = 0)
    {
        $value = null;

        /**
         * Handling comments forehand
         */
        if (
            null !== $this->commentSymbol &&
            false !== $cPos = mb_strpos($string, $this->commentSymbol, $pos)
        ) {
            /**
             * This case might break semantic of a container
             * (can a container return a scalar value?)
             * Therefore, we let the end developer handle the problem with the appropriate solution.
             */
            $value = trim(mb_substr($string, $pos, $cPos - $pos));
            $value = $this->resolveValue($value);
            $e = new  HybridCommentException();
            $e->setHybridValue($value);
            throw $e;
        }
        else {
            /**
             * Default routine for hybrid
             */
            if (false !== $symbolPos = StringTool::strposMultiple($string, $this->symbols, $pos)) {
                $value = trim(mb_substr($string, $pos, $symbolPos - $pos));
                $pos = $symbolPos - 1;
            }
            else {
                $sub = mb_substr($string, $pos);
                $value = trim($sub);
                $pos = mb_strlen($string) - 1;
            }
        }


        $value = $this->resolveValue($value);
        $this->value = $value;
        $this->pos = $pos;

        return true;
    }

    //------------------------------------------------------------------------------/
    // IMPLEMENTS GreedyExpressionDiscovererInterface
    //------------------------------------------------------------------------------/
    public function setBoundarySymbols(array $symbols)
    {
        $this->symbols = $symbols;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setCommentSymbol($symbol)
    {
        $this->commentSymbol = $symbol;
        $this->commentSymbolLen = mb_strlen($this->commentSymbol);
        return $this;
    }

    public function setAutoCast($bool)
    {
        $this->autoCast = $bool;
        return $this;
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function resolveValue($v)
    {
        if (true === $this->autoCast) {
            return StringTool::autoCast($v);
        }
        return $v;
    }


}
