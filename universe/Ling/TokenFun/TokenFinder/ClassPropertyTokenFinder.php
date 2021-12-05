<?php


namespace Ling\TokenFun\TokenFinder;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIterator;
use Ling\TokenFun\TokenArrayIterator\Tool\TokenArrayIteratorTool;
use Ling\TokenFun\Tool\TokenTool;

/**
 * The ClassPropertyTokenFinder class.
 *
 *
 *
 */
class ClassPropertyTokenFinder extends RecursiveTokenFinder
{


    /**
     * @implementation
     */
    public function find(array $tokens)
    {
//        az(TokenTool::explicitTokenNames($tokens));
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $start = null;
        while ($tai->valid()) {
            $cur = $tai->current();
            if (null === $start) {
                if (TokenTool::match([
                    T_COMMENT,
                    T_DOC_COMMENT,
                    T_PUBLIC,
                    T_PROTECTED,
                    T_PRIVATE,
                    T_VARIABLE,
                    T_STATIC,
                ], $cur)
                ) {
                    $key = $tai->key();

                    // skipping comments
                    if (TokenTool::match([
                        T_COMMENT,
                        T_DOC_COMMENT,
                    ], $cur)
                    ) {
                        $tai->next();
                        TokenArrayIteratorTool::skipWhiteSpaces($tai);
                        $cur = $tai->current();
                    }

                    // skipping property visibility and static stuff
                    if (true === TokenTool::match([
                            T_ABSTRACT,
                            T_PUBLIC,
                            T_PROTECTED,
                            T_PRIVATE,
                            T_STATIC,
                        ], $cur)
                    ) {

                        while (true === TokenTool::match([
                                T_ABSTRACT,
                                T_PUBLIC,
                                T_PROTECTED,
                                T_PRIVATE,
                                T_STATIC,
                            ], $cur)) {
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            $cur = $tai->current();
                        }

                        /**
                         * skipping type hint,
                         *
                         * variable type if any (object, array, ...)
                         *
                         * examples:
                         * - protected CustomLightKitStoreApiFactory|null $factory;
                         * - protected ?CustomLightKitStoreApiFactory $factory;
                         *
                         */

                        while (true === TokenTool::match([
                                T_STRING,
                                "?",
                                "|",
                            ], $cur)) {
                            $tai->next();
                            TokenArrayIteratorTool::skipWhiteSpaces($tai);
                            $cur = $tai->current();
                        }


                        if (TokenTool::match([
                            T_VARIABLE,
                        ], $cur)
                        ) {
                            $tai->next();
                            $cur = $tai->current();

                            // skipping one line initialization trail (i.e. protected $x=6;)
                            while (true === TokenTool::match([
                                    T_STRING,
                                    T_CONSTANT_ENCAPSED_STRING,
                                    T_LNUMBER,
                                    T_DNUMBER,
                                    '.', // concatenation is possible too ($x = "p" . "p")
                                    /**
                                     * skipping array stuff too
                                     */
                                    T_DOUBLE_ARROW,
                                    T_WHITESPACE,
                                    ',', // array sep
                                    '[',
                                    ']',
                                    '=',

                                ], $cur)) {
                                $tai->next();
                                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                                $cur = $tai->current();
                            }

                            $start = $key;
                            continue;


                        }


                    }


                }
            } else {
                $found = false;
                TokenArrayIteratorTool::skipWhiteSpaces($tai);
                if (TokenTool::match(';', $tai->current())) {
                    $match = [$start, $tai->key()];
                    $ret[] = $match;
                    $found = true;
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
