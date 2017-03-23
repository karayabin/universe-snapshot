<?php


namespace TokenFun\TokenFinder;

use TokenFun\TokenArrayIterator\TokenArrayIterator;
use TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use TokenFun\Tool\TokenTool;

/**
 * InterfaceTokenFinder
 * @author Lingtalfi
 * 2017-03-23
 *
 *
 * It assumes that the php code is valid.
 * If finds the className after the extends keyword, like for instance if the given code is
 *
 *          class Doo extends Poo {
 *              // ...
 *          }
 *
 * It will match Poo.
 *
 *
 *
 */
class InterfaceTokenFinder extends RecursiveTokenFinder
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
    public function find(array $tokens)
    {
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $start = null;
        while ($tai->valid()) {
            $cur = $tai->current();
            if (null === $start) {
                if (TokenTool::match([T_IMPLEMENTS], $cur)) {
                    $start = $tai->key();
                }
            } else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                $start = $tai->key();
                if (TokenArrayIteratorTool::skipNsChain($tai)) {
                    $found = true;

                    TokenArrayIteratorTool::skipWhiteSpacesOrComma($tai);
                    while (true === TokenArrayIteratorTool::skipNsChain($tai)) {
                        TokenArrayIteratorTool::skipWhiteSpacesOrComma($tai);
                    }


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
