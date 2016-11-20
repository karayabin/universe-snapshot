<?php

namespace TokenFun\Tool;
use TokenFun\TokenArrayIterator\TokenArrayIterator;


/**
 * TokenTool
 * @author Lingtalfi
 * 2016-01-02
 *
 *
 *
 *
 *
 * tokenProp
 * ------------------
 * A token prop is used as a tool to compare against a php token.
 * It's either:
 *      - a string, in which case it matches with a php token of type string
 *      - an int, in which case it matches with the php token type.
 *      - an array, which contains an arbitrary number of other elements (of type string or int).
 *                      If one at least of those elements matches against the php token,
 *                      the the token prop matches.
 *
 *
 * 
 * 
 */
class TokenTool
{


    public static function explicitTokenNames(array $tokens)
    {

        $ret = [];
        foreach ($tokens as $token) {
            if (is_array($token)) {
                $ret[] = [
                    token_name($token[0]),
                    $token[1],
                    $token[2],
                ];
            }
            else {
                $ret[] = $token;
            }
        }
        return $ret;
    }


    /**
     * @param $symbol ,
     *              a tokenProp to use as the delimiter.
     *              see TokenArrayIteratorTool for more on tokenProp.
     *
     * @param array $tokens
     * @param null|int $limit ,
     *                      null means no limit
     * @return array
     */
    public static function explodeTokens($symbol, array $tokens, $limit = null)
    {
        $ret = [];
        $tai = new TokenArrayIterator($tokens);
        $eat = [];
        while ($tai->valid()) {
            $cur = $tai->current();
            if (TokenTool::match($symbol, $cur)) {
                if (null === $limit || $limit > count($ret)) {
                    $ret[] = $eat;
                    $eat = [];
                }
            }
            else {
                $eat[] = $cur;
            }
            $tai->next();
        }
        if (null === $limit || $limit > count($ret)) {
            $ret[] = $eat;
        }
        return $ret;
    }

    


    /**
     * Strip whitespace (or other characters) from the beginning of a string.
     *
     * @param array $tokens
     * @param array $chars , an array of tokenProp (see TokenArrayIteratorTool).
     * @return array representing the trimmed tokens.
     */
    public static function ltrim(array $tokens, array $chars = null)
    {
        if (null === $chars) {
            $chars = [T_WHITESPACE];
        }
        $tai = new TokenArrayIterator($tokens);
        while ($tai->valid()) {
            if (TokenTool::match($chars, $tai->current())) {
                unset($tokens[$tai->key()]);
            }
            else {
                break;
            }
            $tai->next();
        }
        return array_merge($tokens);
    }
    
    /**
     * @return bool
     */
    public static function match($tokenProp, $token)
    {
        $ret = false;
        if (is_string($tokenProp)) {
            $ret = ($tokenProp === $token);
        }
        elseif (is_integer($tokenProp)) {
            $ret = (is_array($token) && $token[0] === $tokenProp);
        }
        elseif (is_array($tokenProp)) {
            foreach ($tokenProp as $tProp) {
                if (true === self::match($tProp, $token)) {
                    $ret = true;
                    break;
                }
            }
        }
        else {
            throw new \InvalidArgumentException("argument tokenProp must be either a string or an int");
        }
        return $ret;
    }

    
    /**
     * Strip whitespace (or other characters) from the end of a string.
     *
     * @param array $tokens
     * @param array $chars , an array of tokenProp (see TokenArrayIteratorTool).
     * @return array representing the trimmed tokens.
     */
    public static function rtrim(array $tokens, array $chars = null)
    {
        if (null === $chars) {
            $chars = [T_WHITESPACE];
        }
        if ($tokens) {
            $n = count($tokens) - 1;
            $tai = new TokenArrayIterator($tokens);
            $tai->seek($n);
            while ($tai->valid()) {
                if (TokenTool::match($chars, $tai->current())) {
                    unset($tokens[$tai->key()]);
                }
                else {
                    break;
                }
                $tai->prev();
            }
        }
        return array_merge($tokens);
    }


    public static function tokensToString(array $tokens)
    {
        $s = '';
        foreach ($tokens as $token) {
            if (is_string($token)) {
                $s .= $token;
            }
            else {
                $s .= $token[1];
            }
        }
        return $s;
    }


    /**
     * Strip whitespace (or other characters) from the beginning and end of a string.
     *
     * @param array $tokens
     * @param array $chars , an array of tokenProp (see TokenArrayIteratorTool).
     * @return array representing the trimmed tokens.
     */
    public static function trim(array $tokens, array $chars = null)
    {
        $tokens = self::ltrim($tokens, $chars);
        $tokens = self::rtrim($tokens, $chars);
        return $tokens;
    }


}
