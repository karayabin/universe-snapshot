<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The ClassSignatureTokenFinder class.
 *
 * This class assumes that the parsed php code is valid.
 *
 *
 */
class ClassSignatureTokenFinder extends RecursiveTokenFinder
{

    /**
     * @implementation
     */
    public function find(array $tokens)
    {

        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        while ($tai->valid()) {
            $cur = $tai->current();

            if (TokenTool::match([
                T_ABSTRACT,
                T_FINAL,
                T_CLASS,
            ], $cur)
            ) {

                $key = $tai->key();


                while (true === TokenTool::match([
                        T_COMMENT,
                        T_DOC_COMMENT,
                        T_ABSTRACT,
                        T_FINAL,
                    ], $cur)
                ) {
                    $tai->next();
                    TokenArrayIteratorTool::skipWhiteSpaces($tai);
                    $cur = $tai->current();
                }

                if (TokenTool::match([
                    T_CLASS,
                ], $cur)
                ) {
                    $tai->next();
                    if (true === TokenArrayIteratorTool::skipUntil($tai, '{')) {
                        $ret[] = [$key, $tai->key()];
                    }
                }
            }


            $tai->next();
        }

        return $ret;
    }

}
