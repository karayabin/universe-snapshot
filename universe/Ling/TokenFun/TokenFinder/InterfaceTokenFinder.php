<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The InterfaceTokenFinder class.
 *
 * It assumes that the php code is valid.
 * If finds the className after the implements keyword, like for instance if the given code is
 *
 *          class Doo implements Poo {
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
