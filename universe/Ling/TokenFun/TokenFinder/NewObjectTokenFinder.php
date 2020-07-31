<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The NewObjectTokenFinder class.
 *
 * If finds an object instantiation, like for instance:
 *
 *          - new \Poo()
 *          - new Poo()
 *          - new $doo()
 *          - new $doo["cam"]()
 *
 *
 * Nested elements can also be found with nestedMode enabled (disabled by default).
 *
 *          - new Poo(new Poo())
 *
 *
 *
 *
 */
class NewObjectTokenFinder extends RecursiveTokenFinder
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
                if (TokenTool::match(T_NEW, $cur)) {
                    $start = $tai->key();
                }
            }
            else {

                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                if (true === TokenArrayIteratorTool::skipNsChain($tai)) {
                    $this->parseParenthesis($tai, $found, $start, $ret);
                }
                elseif (TokenTool::match(T_VARIABLE, $tai->current())) {
                    $tai->next();
                    if (TokenTool::match('[', $tai->current())) {
                        if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                            $tai->next();
                            $this->parseParenthesis($tai, $found, $start, $ret);
                        }

                    }
                    else {
                        $this->parseParenthesis($tai, $found, $start, $ret);
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

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * Make the iterator skip the parenthesis wrapping, if it's the current (non whitespace) element.
     *
     * @param TokenArrayIteratorInterface $tai
     * @param $found
     * @param $start
     * @param $ret
     * @return bool
     * @throws \Exception
     */
    protected function parseParenthesis(TokenArrayIteratorInterface $tai, &$found, &$start, &$ret)
    {
        TokenArrayIteratorTool::skipWhiteSpaces($tai);
        if (TokenTool::match('(', $tai->current())) {
            if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                $found = true;
                $ret[] = [$start, $tai->key()];
                $this->onMatchFound($start, $tai);
                $start = null;
                return true;
            }
        }
        return false;
    }
}
