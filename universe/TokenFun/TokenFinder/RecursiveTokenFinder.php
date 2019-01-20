<?php


namespace TokenFun\TokenFinder;

use TokenFun\TokenArrayIterator\TokenArrayIteratorInterface;

/**
 * RecursiveTokenFinder
 * @author Lingtalfi
 * 2016-01-02
 *
 *
 *
 * Nested elements can also be found with nestedMode enabled (disabled by default).
 *
 *          - new Poo(new Poo())
 *
 *
 * in case of an object instantiation search.
 *
 *
 *
 *
 */
abstract class RecursiveTokenFinder implements TokenFinderInterface
{


    protected $nestedMode;

    public function __construct()
    {
        $this->nestedMode = false;
    }

    public function isNestedMode()
    {
        return $this->nestedMode;
    }

    public function setNestedMode($nestedMode)
    {
        $this->nestedMode = $nestedMode;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function onMatchFound($start, TokenArrayIteratorInterface $tai)
    {
        if (true === $this->nestedMode) {
            $tai->seek($start);
            $tai->next();
        }
    }

}
