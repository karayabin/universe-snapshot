<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * ClassTokenFinder
 * @author Lingtalfi
 * 2016-01-02
 *
 *
 * It assumes that the php code is valid.
 * If finds a className, like for instance if the given code is
 *
 *          class Doo{
 *              // ...
 *          }
 *
 * It will also match Traits.
 *
 *
 * and matches Doo.
 *
 */
class ClassNameTokenFinder extends RecursiveTokenFinder
{


    protected $namespace;

    /**
     * This property holds the includeInterface for this instance.
     *
     * @var bool=false
     */
    protected $includeInterface;


    /**
     * Builds the ClassNameTokenFinder instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->includeInterface = false;
    }

    /**
     * Sets the includeInterface.
     *
     * @param bool $includeInterface
     * @return $this
     */
    public function setIncludeInterface(bool $includeInterface)
    {
        $this->includeInterface = $includeInterface;
        return $this;
    }


    /**
     * @return array of match
     *                  every match is an array with the following entries:
     *                          0: int startIndex
     *                                      the index at which the pattern starts
     *                          1: int endIndex
     *                                      the index at which the pattern ends
     *
     */
    public function find(array $tokens)
    {
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $start = null;
        $matchArray = [T_CLASS, T_TRAIT];
        if (true === $this->includeInterface) {
            $matchArray[] = T_INTERFACE;
        }

        while ($tai->valid()) {
            $cur = $tai->current();
            if (null === $start) {
                if (TokenTool::match($matchArray, $cur)) {
                    $start = $tai->key();
                }
            } else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                $start = $tai->key();
                if (TokenArrayIteratorTool::skipNsChain($tai)) {
                    $found = true;

                    // skipNsChain ends AFTER the chain, not AT the end of it.
                    $tai->prev();
                    $end = $tai->key();
                    $tai->next();

                    $ret[] = [$start, $end];
                    $this->onMatchFound($start, $tai);
                    $start = null;
                }
                if (false === $found) {
                    $start = null;
                }
            }
            $tai->next();
        }

        return $ret;
    }
}
