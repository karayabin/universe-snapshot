<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The MethodTokenFinder class.
 *
 * If finds a method, like for instance:
 *
 *          public function Shoo(){
 *              echo "doo";
 *          }
 *
 *
 * Note: this implementation might also match a regular function, like
 *
 *          function my_function(){
 *              echo "doo";
 *          }
 *
 *
 * Therefore, one should be aware of the context.
 *
 *
 */
class MethodTokenFinder extends RecursiveTokenFinder
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
                if (TokenTool::match([
                    T_COMMENT,
                    T_DOC_COMMENT,
                    T_ABSTRACT,
                    T_METHOD_C,
                    T_PUBLIC,
                    T_PROTECTED,
                    T_PRIVATE,
                    T_STATIC,
                ], $cur)
                ) {

                    $key = $tai->key();


                    if (TokenTool::match([
                        T_COMMENT,
                        T_DOC_COMMENT,
                    ], $cur)
                    ) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        $cur = $tai->current();


                        // skip all comments except the one that is just above the method
                        if (TokenTool::match([
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ], $cur)
                        ) {
                            $start = null;
                            continue;
                        }


                    }

                    while (true === TokenTool::match([
                            T_ABSTRACT,
                            T_PUBLIC,
                            T_PROTECTED,
                            T_PRIVATE,
                            T_STATIC,
                        ], $cur)
                    ) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        $cur = $tai->current();
                    }


                    /**
                     * Note: this algorithm might match also any function
                     */
                    if (TokenTool::match([
                        T_FUNCTION,
                    ], $cur)
                    ) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        if (TokenTool::match(T_STRING, $tai->current())) {
                            $start = $key;
                        }
                    }
                }
            } else {
                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                if (TokenTool::match('(', $tai->current())) {
                    if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);


                        // hint
                        if (TokenTool::match(':', $tai->current())) {
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            if (TokenTool::match([
                                T_STRING,
                                T_ARRAY,
                            ], $tai->current())) {
                                $tai->next();
                                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            }
                        }

                        if (TokenTool::match('{', $tai->current())) {
                            if (true === TokenArrayIteratorTool::moveToCorrespondingEnd($tai)) {
                                $found = true;
                                $match = [$start, $tai->key()];
                                $ret[] = $match;
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
