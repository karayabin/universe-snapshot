<?php


namespace Ling\TokenFun\TokenArrayIterator\Tool;

use Ling\TokenFun\TokenArrayIterator\TokenArrayIteratorInterface;
use Ling\TokenFun\Tool\TokenTool;


/**
 * The TokenArrayIteratorTool class.
 *
 * Concepts to understand before using this class:
 * See the @page(tokenProp definition).
 *
 */
class TokenArrayIteratorTool
{


    /**
     * Returns whether the current element of the given iterator is a whitespace.
     *
     * @param TokenArrayIteratorInterface $tai
     * @return bool
     */
    public static function isWhiteSpace(TokenArrayIteratorInterface $tai)
    {
        $c = $tai->current();
        return (is_array($c) && T_WHITESPACE === $c[0]);
    }


    /**
     * Look at the "opening" token at the current position and tries to move to the corresponding closing token.
     * Returns whether or not the cursor could be moved to the corresponding end.
     *
     *
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
     *
     *
     * @param TokenArrayIteratorInterface $tai
     * @param array|null $tokens
     * @param array $capture
     * @return bool
     */
    public static function moveToCorrespondingEnd(TokenArrayIteratorInterface $tai, array $tokens = null, array &$capture = []): bool
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

                    if (false === $token) {
                        continue;
                    }

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
     *
     * Moves the iterator pointer forward skipping class definition, and returns whether or not a class definition has been skipped.
     *
     * Skips a string like:
     *
     * - class Do {}
     * - class \Do extends \Foo {}
     * - abstract class \Do\Foo extends \Foo\Zoo {}
     * - abstract class \Do implements \Foo {}
     * - interface \Do {}
     * - ...
     *
     * if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket, and true is returned; otherwise false is returned.
     *
     * @param TokenArrayIteratorInterface $tai
     * @return bool
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
     * Moves the iterator pointer forward skipping bracket wrappings, and returns whether a bracket wrapping has been skipped.
     *
     *
     * Skips a string like:
     *
     *          ["pou"]
     *          [97]["o"]["..."]
     *
     * if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket.
     *
     * @param TokenArrayIteratorInterface $tai
     * @return bool
     */
    public static function skipSquareBracketsChain(TokenArrayIteratorInterface $tai): bool
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
     * Moves the iterator pointer forward skipping functions, and returns whether a function has been skipped.
     * Skips a function like:
     *
     *          function(){
     *              // do something
     *          }
     *
     * only if it is found at the current position of tai.
     * If a match was found, the cursor is placed just AT the last bracket.
     *
     * @param TokenArrayIteratorInterface $tai
     * @return bool
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
     * Moves the iterator pointer forward skipping namespace chain, and returns whether a namespace chain has been skipped.
     *
     * In case of a successful match, the cursor position is AFTER the last token of the ns chain.
     *
     * Skips a chain like \My\Object or My\Object
     *
     * @param TokenArrayIteratorInterface $tai
     * @return bool
     *
     */
    public static function skipNsChain(TokenArrayIteratorInterface $tai): bool
    {
        $ret = false;
        if (false !== ($startKey = $tai->key())) {

            $nsChainSkipped = false;
            $cur = $tai->current();


            if (
                true === TokenTool::match(T_NAME_FULLY_QUALIFIED, $cur) ||
                true === TokenTool::match(T_NAME_QUALIFIED, $cur) ||
                true === TokenTool::match(T_NAME_RELATIVE, $cur)
            ) {
                $nsChainSkipped = true;
                $tai->next();
            } else {


                // possibly starting with backslash
                if (true === TokenTool::match(T_NS_SEPARATOR, $cur)) {
                    $tai->next();
                    $cur = $tai->current();
                }

                // containing x repetitions of string backslash sequences
                while (true === TokenTool::match(T_STRING, $cur)) {
                    $nsChainSkipped = true;
                    $tai->next();
                    $cur = $tai->current();
                    if (true === TokenTool::match(T_NS_SEPARATOR, $cur)) {
                        $tai->next();
                        $cur = $tai->current();
                        $nsChainSkipped = false;
                    }
                }
            }


            if (true === $nsChainSkipped) {
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
     * @param TokenArrayIteratorInterface $tai
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
     * Skips the given tokens and positions the cursor AFTER the last found token.
     *
     * @param TokenArrayIteratorInterface $tai
     * @param array $tokens
     */
    public static function skipTokens(TokenArrayIteratorInterface $tai, array $tokens = [])
    {
        $cur = $tai->current();
        while (true) {
            $affected = false;
            foreach ($tokens as $token) {
                if (
                    $cur === $token ||
                    (true === is_array($cur) && $token === $cur[0])
                ) {
                    $tai->next();
                    $cur = $tai->current();
                    $affected = true;
                }
            }
            if (false === $affected) {
                break;
            }
        }
    }


    /**
     * Skips whitespaces and commas, and positions the cursor AFTER the last whitespace or comma.
     *
     * @param TokenArrayIteratorInterface $tai
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


    /**
     * Iterates the given tokenArrayIterator until it finds the given tokenProp.
     * It returns true when the tokenProp is matched, and false if there is no match.
     *
     * If $includeLast is false, the matching tokenProp will NOT be included in the result (this is the default), otherwise it will.
     *
     *
     * @param TokenArrayIteratorInterface $tai
     * @param $tokenProp
     * @param bool $includeLast
     * @return bool
     * @throws \Exception
     */
    public static function skipUntil(TokenArrayIteratorInterface $tai, $tokenProp, bool $includeLast = false)
    {
        $cur = $tai->current();
        while (true) {

            if (TokenTool::match($tokenProp, $cur)) {
                if (false === $includeLast) {
                    $tai->prev();
                }
                return true;
            }
            $hasNext = $tai->next();
            $cur = $tai->current();
            if (false === $hasNext) {
                break;
            }
        }
        return false;
    }

}
