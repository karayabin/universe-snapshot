<?php


namespace TokenFun\TokenFinder;

/**
 * TokenFinderInterface
 * @author Lingtalfi
 * 2016-01-02
 *
 */
interface TokenFinderInterface
{


    /**
     * @return array of match
     *                  every match is an array with the following entries:
     *                          0: int startIndex
     *                                      the index at which the pattern starts
     *                          1: int endIndex
     *                                      the index at which the pattern ends
     *
     */
    public function find(array $tokens);
}
