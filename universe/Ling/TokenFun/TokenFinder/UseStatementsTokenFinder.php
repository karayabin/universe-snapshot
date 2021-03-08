<?php

namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The UseStatementsTokenFinder class.
 *
 * If finds use statements, like
 *
 *          use Ling\TokenFun\Tool\TokenTool;
 *
 *
 * Note that this class is old and naive, as it doesn't take into account aliases.
 *
 * We recommend using the UseStatementsParser class instead.
 *
 *
 *
 */
class UseStatementsTokenFinder extends RecursiveTokenFinder
{


    /**
     * @implementation
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
