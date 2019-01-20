<?php


namespace TokenFun\TokenArrayIterator\Tool;

use TokenFun\TokenArrayIterator\TokenArrayIteratorInterface;
use TokenFun\Tool\TokenTool;


/**
 * TokenArrayIteratorTool
 * @author Lingtalfi
 * 2016-01-02
 *
 *
 * Concepts to understand before using this class:
 * see tokenTool for info about tokenProp
 *
 */
class TokenArrayIteratorTool
{


    public static function isWhiteSpace(TokenArrayIteratorInterface $tai)
    {
        $c = $tai->current();
        return (is_array($c) && T_WHITESPACE === $c[0]);
    }


    /**
     * Look at the "opening" token at the current position and tries to move to the corresponding closing token.
     * An opening token is one of:
     *      - {
     *      - (
     *      - [
     * And the corresponding closing tokens are respectively:
     *      - }
     *      - )
     *      - ]
     *
     *
     * @return bool, whether or not the cursor could be moved to the corresponding end.
     */
    public static function moveToCorrespondingEnd(TokenArrayIteratorInterface $tai, array $tokens = null, array &$capture = [])
    {
        $ret = false;
        $token = $tai->current();
        if (is_string($token)) {
            if (null === $tokens) {
                $tokens = [
                    '{' => '}',
                    '(' => ')',
                    '[' => ']',
                ];
            }
            if (array_key_exists($token, $tokens)) {

                $begin = $token;
                $end = $tokens[$token];
                $level = 1;
                while ($tai->valid()) {
                    $tai->next();
                    $token = $tai->current();
                    $capture[] = $token;
                    if (is_string($token)) {
                        if ($begin === $token) {
                            $level++;
                        } elseif ($end === $token) {
                            $level--;
                            if (0 === $level) {
                                array_pop($capture);
                                $ret = true;
                                break;
                            }
                        }
                    }
                }
            }
        }
        return $ret;
    }


    /**
     * Skips a string like:
     *
     *          class Do {}
     *          class \Do extends \Foo {}
     *          abstract class \Do\Foo extends \Foo\Zoo {}
     *          abstract class \Do implements \Foo {}
     *          interface \Do {}
     *          ...
     *
     * if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket.
     *
     * @return bool, whether or not a class has been skipped.
     */
    public static function skipClassLike(TokenArrayIteratorInterface $tai)
    {
        $ret = false;


        $cur = $tai->current();
        if (true === TokenTool::match([
                T_ABSTRACT,
                T_CLASS,
                T_TRAIT,
                T_INTERFACE,
            ], $cur)
        ) {

            $validate = false;
            $startKey = $tai->key();
            if (true === TokenTool::match(T_ABSTRACT, $cur)) {
                $tai->next();
                self::skipWhiteSpaces($tai);
            }
            if (true === TokenTool::match([T_CLASS, T_TRAIT, T_INTERFACE], $tai->current())) {
                $tai->next();
                self::skipWhiteSpaces($tai);
                if (true === self::skipNsChain($tai)) {
                    self::skipWhiteSpaces($tai);
                    if (true === TokenTool::match([
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ], $tai->current())
                    ) {
                        $tai->next();
                        self::skipWhiteSpaces($tai);
                        self::skipNsChain($tai);
                        self::skipWhiteSpaces($tai);
                    }

                    if (true === TokenTool::match('{', $tai->current())) {
                        if (true === self::moveToCorrespondingEnd($tai)) {
                            $validate = true;
                        }
                    }

                } else {
                    // malformed php?
                }
            }

            if (true === $validate) {
                $ret = true;
            } else {
                $tai->seek($startKey);
            }
        }
        return $ret;
    }

    /**
     * Skips a string like:
     *
     *          ["pou"]
     *          [97]["o"]["..."]
     *
     * if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket.
     *
     * @return bool, whether or not a class has been skipped.
     */
    public static function skipSquareBracketsChain(TokenArrayIteratorInterface $tai)
    {
        $ret = false;

        $cur = $tai->current();
        if (true === TokenTool::match('[', $cur)
        ) {

            $validate = false;
            $startKey = $tai->key();
            if (true === self::moveToCorrespondingEnd($tai)) {
                $validate = true;

                /**
                 * Test if there is one more bracket pair after the current pos
                 */
                $newStartKey = $tai->key();
                $tai->next();
                if (false === self::skipSquareBracketsChain($tai)) {
                    $tai->seek($newStartKey);
                }
            }
            if (true === $validate) {
                $ret = true;
            } else {
                $tai->seek($startKey);
            }
        }
        return $ret;
    }

    /**
     * Skips a function like:
     *
     *          function(){ 
     *              // do something
     *          }
     *
     * only if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket.
     *
     * @return bool, whether or not a function has been skipped.
     */
    public static function skipFunction(TokenArrayIteratorInterface $tai)
    {
        $ret = false;
        $cur = $tai->current();
        if (true === TokenTool::match(T_FUNCTION, $cur)) {
            $validate = false;
            $startKey = $tai->key();

            $tai->next();
            self::skipWhiteSpaces($tai);

            if (true === TokenTool::match(T_STRING, $tai->current())) {
                $tai->next();
                self::skipWhiteSpaces($tai);

                if (true === TokenTool::match('(', $tai->current())) {
                    if (true === self::moveToCorrespondingEnd($tai)) {
                        $tai->next();
                        self::skipWhiteSpaces($tai);
                        if (true === TokenTool::match('{', $tai->current())) {
                            if (true === self::moveToCorrespondingEnd($tai)) {
                                $validate = true;
                            }
                        }
                    }
                }

                if (true === $validate) {
                    $ret = true;
                } else {
                    $tai->seek($startKey);
                }
            }
        }
        return $ret;
    }


    /**
     * Skips a chain like \My\Object or My\Object
     *
     * @return bool, whether or not a ns chain could have been found at the current tai position.
     *                  In case of a successful match, the cursor position is AFTER the last token
     *                  of the ns chain.
     *
     */
    public static function skipNsChain(TokenArrayIteratorInterface $tai)
    {
        $ret = false;
        if (false !== $startKey = $tai->key()) {

            $lastIsString = false;
            $cur = $tai->current();


            // possibly starting with backslash
            if (true === TokenTool::match(T_NS_SEPARATOR, $cur)) {
                $tai->next();
                $cur = $tai->current();
            }

            // containing x repetitions of string backslash sequences
            while (true === TokenTool::match(T_STRING, $cur)) {
                $lastIsString = true;
                $tai->next();
                $cur = $tai->current();
                if (true === TokenTool::match(T_NS_SEPARATOR, $cur)) {
                    $tai->next();
                    $cur = $tai->current();
                    $lastIsString = false;
                }
            }


            if (true === $lastIsString) {
                $ret = true;
            } else {
                $tai->seek($startKey);
            }
        }
        return $ret;
    }


    /**
     * Skips whitespaces and positions the cursor AFTER the last whitespace.
     *
     */
    public static function skipWhiteSpaces(TokenArrayIteratorInterface $tai)
    {
        $cur = $tai->current();
        while (is_array($cur) && T_WHITESPACE === $cur[0]) {
            $tai->next();
            $cur = $tai->current();
        }
    }


    /**
     * Skips whitespaces and commas, and positions the cursor AFTER the last whitespace or comma.
     *
     */
    public static function skipWhiteSpacesOrComma(TokenArrayIteratorInterface $tai)
    {
        $cur = $tai->current();
        while (
            (is_array($cur) && T_WHITESPACE === $cur[0]) ||
            (is_string($cur) && "," === $cur)
        ) {
            $tai->next();
            $cur = $tai->current();
        }
    }

}
