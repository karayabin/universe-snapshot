<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface;

/**
 * The RecursiveTokenFinder class.
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


    /**
     * This property holds the nestedMode for this instance.
     * @var bool
     */
    protected $nestedMode;

    /**
     * Builds the RecursiveTokenFinder instance.
     */
    public function __construct()
    {
        $this->nestedMode = false;
    }

    /**
     * Returns whether the nested mode is turned on.
     * @return bool
     */
    public function isNestedMode()
    {
        return $this->nestedMode;
    }

    /**
     * Sets the nested mode
     * @param bool $nestedMode
     */
    public function setNestedMode(bool $nestedMode)
    {
        $this->nestedMode = $nestedMode;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Hook to do something when a match is found.
     *
     * @param $start
     * @param TokenArrayIteratorInterface $tai
     */
    protected function onMatchFound($start, TokenArrayIteratorInterface $tai)
    {
        if (true === $this->nestedMode) {
            $tai->seek($start);
            $tai->next();
        }
    }

}
