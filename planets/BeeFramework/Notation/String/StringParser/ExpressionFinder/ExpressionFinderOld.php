<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\String\StringParser\ExpressionFinder;

use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\Container\ContainerExpressionDiscoverer;
use BeeFramework\Notation\String\StringParser\ExpressionDiscoverer\ExpressionDiscovererInterface;


/**
 * ExpressionFinder
 * @author Lingtalfi
 * 2015-05-16
 *
 */
class ExpressionFinderOld implements ExpressionFinderInterface
{

    /**
     * @var ExpressionDiscovererInterface
     */
    private $discoverer;
    private $startSymbol;


    public function __construct()
    {
        $this->discoverer = null;
        $this->startSymbol = null;
    }


    public static function create()
    {
        return new static();
    }


    public function setDiscoverer(ExpressionDiscovererInterface $discoverer)
    {
        $this->discoverer = $discoverer;
        return $this;
    }

    public function getDiscoverer()
    {
        return $this->discoverer;
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ExpressionFinderInterface
    //------------------------------------------------------------------------------/
    public function find($s)
    {
        $this->checkInit();
        $pos = 0;
        if (null !== $this->startSymbol) {
            while (false !== $spos = mb_strpos($s, $this->startSymbol, $pos)) {
                if (true === $this->discoverer->parse($s, $spos)) {
                    return [$spos, $this->discoverer->getLastPos()];
                }
                $pos = $spos + 1;
            }
        }
        else {
            $len = mb_strlen($s);
            while (true) {
                if (true === $this->discoverer->parse($s, $pos)) {
                    return [$pos, $this->discoverer->getLastPos()];
                }
                $pos = $pos + 1;
                if ($pos > $len) {
                    break;
                }
            }
        }
        return false;
    }

    /**
     * You have to call the find method to fill the value. 
     * 
     * @return mixed, returns the found value if found.
     */
    public function getValue()
    {
        $this->checkInit();
        return $this->discoverer->getValue();
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public function setStartSymbol($s)
    {
        $this->startSymbol = $s;
        return $this;
    }



    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function checkInit()
    {
        if (null === $this->discoverer) {
            throw new \LogicException("Please set the discoverer first");
        }
    }
}
