<?php


namespace Ling\TokenFun\TokenFinder;

/**
 * The TokenFinderInterface interface.
 *
 */
interface TokenFinderInterface
{


    /**
     *
     * Returns an array of match.
     * Every match is an array with the following entries:
     *
     * - 0: int startIndex, the index at which the pattern starts
     * - 1: int endIndex, the index at which the pattern ends
     * - ...: extra numbers can be added, depending on the concrete class
     *
     *
     * @param array $tokens
     * @return array
     *
     */
    public function find(array $tokens);
}
