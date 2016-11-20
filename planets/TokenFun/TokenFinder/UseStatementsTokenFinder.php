<?php

namespace TokenFun\TokenFinder;

use TokenFun\TokenArrayIterator\TokenArrayIterator;
use TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use TokenFun\Tool\TokenTool;

/**
 * UseStatementsTokenFinder
 * @author Lingtalfi
 * 2016-01-02
 *
 * If finds use statements, like
 *
 *          use TokenFun\Tool\TokenTool;
 *
 *
 *
 */
class UseStatementsTokenFinder extends RecursiveTokenFinder
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
                if (TokenTool::match(T_USE, $cur)) {
                    $start = $tai->key();
                }
            }
            else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);

                if (true === TokenArrayIteratorTool::skipNsChain($tai)) {
                    TokenArrayIteratorTool::skipWhiteSpaces($tai);

                    if (TokenTool::match(T_AS, $tai->current())) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        if (TokenTool::match(T_STRING, $tai->current())) {
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        }
                        else {
                            $start = null;
                            continue;
                        }
                    }

                    if (TokenTool::match(';', $tai->current())) {
                        $found = true;
                        $ret[] = [$start, $tai->key()];
                        $this->onMatchFound($start, $tai);
                        $start = null;
                    }
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
