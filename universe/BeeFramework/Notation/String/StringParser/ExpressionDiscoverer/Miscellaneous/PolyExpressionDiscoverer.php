<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Miscellaneous;

use BeeFramework\Component\String\StringIterator\StringIterator;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\ExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\GreedyExpressionDiscovererInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscovererModel\ExpressionDiscovererModelInterface;
use BeeFramework\Notation\String\StringParser\Validator\ContainerValidator;
use BeeFramework\Notation\String\StringParser\Validator\ValidatorInterface;


/**
 * PolyExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-15
 *
 *
 * This discoverer match only one expression by using zero, one or more discoverers.
 * It handles retro validation and comments.
 * 
 * For comments, you need to do extra work.
 * 
 * 
 * 
 * -----------------------------
 * The snippet below you can use to implement a common comment system
 * -----------------------------
 * 
 * $d = new PolyExpressionDiscoverer();
 * $d
 * ->setDiscoverers($disco)
 * ->setGreedyDiscoverersSymbols([' #'])
 * ->setValidatorSymbols([' #'])
 * ;
 * 
 * 
 * --- yoda said
 * 
 * 
 *
 */
class PolyExpressionDiscoverer extends ExpressionDiscoverer
{


    private $discoverers;
    private $validatorSymbols;
    private $greedyDiscoverersSymbols;
    private $notSignificantSymbols;

    public function __construct()
    {
        parent::__construct();
        $this->discoverers = [];
        $this->validatorSymbols = [];
        $this->greedyDiscoverersSymbols = [];

        $this->notSignificantSymbols = [
            ' ' => 1,
            "\t" => 1,
        ];


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

        // reset
        $this->pos = false;
        $this->value = null;

        $it = new StringIterator($string);
        $it->setPosition($pos);
        $p = $it->getPosition();
        $validator = ContainerValidator::create()->setSymbols($this->validatorSymbols);
        $len = mb_strlen($string);

        foreach ($this->discoverers as $d) {


            // handling recursion
            if ($d instanceof ExpressionDiscovererModelInterface) {
                $d = $d->getExpressionDiscoverer();
            }


            // handling greedy discoverers
            if ($d instanceof GreedyExpressionDiscovererInterface) {
                $d->setBoundarySymbols($this->greedyDiscoverersSymbols);
            }


            if (true === $d->parse($string, $p)) {
                /**
                 * discoverer has found a matching expression,
                 * but is the expression really valid?
                 */
                $lastP = $d->getLastPos();

                if (
                    true === $this->isLastChar($lastP, $len) ||
                    true === $this->testValidity($lastP, $it, $validator)
                ) {
                    $it->setPosition($lastP);
                    $this->pos = $lastP;
                    $this->value = $this->resolveValues($d->getValue());
                    return true;
                }
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setNotSignificantSymbols(array $notSignificantSymbols)
    {
        $this->notSignificantSymbols = [];
        foreach ($notSignificantSymbols as $s) {
            $this->notSignificantSymbols[$s] = mb_strlen($s);
        }
        return $this;
    }

    public function setValidatorSymbols(array $symbols)
    {
        $this->validatorSymbols = $symbols;
        return $this;
    }

    public function setGreedyDiscoverersSymbols(array $symbols)
    {
        $this->greedyDiscoverersSymbols = $symbols;
        return $this;
    }

    public function getDiscoverers()
    {
        return $this->discoverers;
    }

    public function setDiscoverers(array $discoverers)
    {
        $this->discoverers = $discoverers;
        return $this;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function isLastChar($pos, $len)
    {
        return ($pos === ($len - 1));
    }

    protected function testValidity($lastPos, StringIteratorInterface $it, ValidatorInterface $validator)
    {
        /**
         * We temporarily set the cursor to the next significant position to perform the validity test,
         * but this is internal and code outside this method won't notice.
         */
        $ret = false;
        $pos = $it->getPosition();

        $nextPos = $lastPos + 1;
        $it->setPosition($nextPos);
        $this->skipNotSignificant($it);
        $nextSignificantP = $it->getPosition();
        
        if (true === $validator->isValid($it->getString(), $pos, $lastPos, $nextSignificantP)) {
            $ret = true;
        }
        $it->setPosition($pos);
        return $ret;
    }


    protected function skipNotSignificant(StringIteratorInterface $it)
    {
        if ($this->notSignificantSymbols) {
            $string = $it->getString();
            while (true) {
                $moved = false;
                foreach ($this->notSignificantSymbols as $symbol => $len) {
                    if ($symbol === mb_substr($string, $it->getPosition(), $len)) {
                        $it->setPosition($it->getPosition() + $len);
                        $moved = true;
                    }
                }
                if (false === $moved) {
                    break;
                }
            }
        }
    }

    protected function resolveValues($mixed)
    {
        return $mixed;
    }

}
