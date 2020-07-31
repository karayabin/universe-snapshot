<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The FunctionTokenFinder class.
 *
 * If finds a function, like for instance:
 *
 *          function(){
 *              echo "doo";
 *          }
 *
 */
class FunctionTokenFinder extends RecursiveTokenFinder
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
                if (TokenTool::match(T_FUNCTION, $cur)) {
                    $start = $tai->key();
                }
            }
            else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                if (TokenTool::match('(', $tai->current())) {
                    if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        if (TokenTool::match('{', $tai->current())) {
                            if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                                $found = true;
                                $ret[] = [$start, $tai->key()];
                                $this->onMatchFound($start, $tai);
                                $start = null;
                            }
                        }
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
