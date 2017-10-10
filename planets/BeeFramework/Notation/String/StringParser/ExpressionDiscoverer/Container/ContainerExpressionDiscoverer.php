<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container;

use BeeFramework\Component\String\StringIterator\StringIterator;
use BeeFramework\Component\String\StringIterator\StringIteratorInterface;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\ExpressionDiscoverer;
use Komin\Component\Monitor\Traits\ClassicMonitorTrait;


/**
 * ContainerExpressionDiscoverer
 * @author Lingtalfi
 * 2015-05-15
 *
 *
 * A container starts with a begin symbol, ends with an end symbol,
 * and contains 0, 1 or more expressions separated by a valueSep symbol.
 *
 */
abstract class ContainerExpressionDiscoverer extends ExpressionDiscoverer
{

    use ClassicMonitorTrait;
    private $beginSep;
    private $beginSepLen;
    private $valueSep;
    private $valueSepLen;
    private $endSep;
    private $endSepLen;


    public function __construct()
    {

        $this->beginSep = '(';
        $this->beginSepLen = 1;
        $this->endSep = ')';
        $this->endSepLen = 1;
        $this->valueSep = ',';
        $this->valueSepLen = 1;

        // just set 1 here to see monitor messages
        $this->switchPowerButton(0);

    }


    /**
     * @return false|array, array of values in case of success, false in case of failure
     */
    abstract protected function parseContainer(StringIteratorInterface $it);


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExpressionDiscovererInterface
    //------------------------------------------------------------------------------/
    /**
     * Parses a string, looking for an expression.
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

        $this->say("<purple>starting parse method with pos=$pos</purple>");
        $it = new StringIterator($string);
        $it->setPosition($pos);
        if (true === $this->isContainerBegin($it)) {
            $this->say("<purple>container begin found</purple>");
            $this->moveCursorToFirstContainerElement($it);

            if (false !== $values = $this->parseContainer($it)) {
                $this->value = $values;
                $this->pos = $it->getPosition();
                return true;
            }
        }
        else {
            $this->say("<purple>container begin not found</purple>");
        }
        return false;
    }
    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setBeginSep($beginSep)
    {
        $this->beginSep = $beginSep;
        $this->beginSepLen = mb_strlen($beginSep);
        return $this;
    }

    public function setEndSep($endSep)
    {
        $this->endSep = $endSep;
        $this->endSepLen = mb_strlen($endSep);
        return $this;
    }

    public function setValueSep($valueSep)
    {
        $this->valueSep = $valueSep;
        $this->valueSepLen = mb_strlen($valueSep);
        return $this;
    }

    protected function getEndSep()
    {
        return $this->endSep;
    }

    protected function getEndSepLen()
    {
        return $this->endSepLen;
    }

    protected function getValueSep()
    {
        return $this->valueSep;
    }

    protected function getValueSepLen()
    {
        return $this->valueSepLen;
    }

    protected function getBeginSepLen()
    {
        return $this->beginSepLen;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function isContainerBegin(StringIteratorInterface $it)
    {
        return ($this->beginSep === mb_substr($it->getString(), $it->getPosition(), $this->getBeginSepLen()));
    }

    protected function isContainerEnd(StringIteratorInterface $it)
    {
        if (1 === $this->endSepLen) {
            return ($this->endSep === $it->current());
        }
        return ($this->endSep === mb_substr($it->getString(), $it->getPosition(), $this->getEndSepLen()));
    }

    protected function isValueSeparator(StringIteratorInterface $it)
    {
        return ($this->valueSep === mb_substr($it->getString(), $it->getPosition(), $this->valueSepLen));
    }


    protected function next($itLen = 1, StringIteratorInterface $it)
    {
        if (1 === $itLen) {
            $it->next();
        }
        elseif ($itLen > 1) {
            for ($i = 0; $i < $itLen; $i++) {
                $it->next();
            }
        }
        else {
            throw new \LogicException("itLen cannot be less than 1, $itLen given");
        }
    }

    protected function failure($m)
    {
        $this->error($m);
    }
    
    protected function moveCursorToFirstContainerElement(StringIteratorInterface $it){
        $this->next($this->getBeginSepLen(), $it);
    }

}
