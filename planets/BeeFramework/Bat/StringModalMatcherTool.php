<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * StringModalMatcherTool
 * @author Lingtalfi
 * 2015-03-10
 *
 */
class StringModalMatcherTool
{


    /**
     * @param string $string , the string to match
     * @param string $pattern , the pattern to match the string against.
     *                          The pattern type depends on the patternMode parameter.
     * @param null|string $patternMode , regex|glob(default)|match
     *
     *                                  - regex:
     *                                          in this mode the pattern is a complete php regex, with delimiters and flags
     *                                  - glob:
     *                                          this mode uses the php fnmatch function:
     *                                          - *: matches all chars
     *                                          - ?: matches only one unknown char
     *                                          - [abc]: matches only one char amongst a, b and c
     *                                          - [!abc]: matches only one char which is neither a, nor b, nor c
     *                                          - [^abc]: idem
     *                                  - match:
     *                                          this mode will only return true if pattern is contained
     *                                              inside string.
     *
     *
     *                              By default, glob and match mode work in case non sensitive mode.
     *                              This can be modified with the caseSensitive parameter.
     *                              regex mode uses defines its own case mode (using the pattern flags).
     *
     *
     *
     * @param bool $caseSensitive , whether or not the glob|match modes are case sensitive.
     *                              The regex mode is not affected by this parameter.
     *
     * @return bool
     */
    public static function match($string, $pattern, $patternMode = null, $caseSensitive = false)
    {
        if (is_string($string)) {

            if (null === $patternMode) {
                $patternMode = 'glob';
            }
            switch ($patternMode) {
                case 'glob':
                    $flag = (false === $caseSensitive) ? FNM_CASEFOLD : 0;
                    return fnmatch($pattern, $string, $flag);
                    break;
                case 'match':
                    if (false === $caseSensitive) {
                        return (false !== stripos($string, $pattern));
                    }
                    return (false !== strpos($string, $pattern));
                    break;
                case 'regex':
                    if (preg_match($pattern, $string)) {
                        return true;
                    }
                    return false;
                    break;
                default:
                    throw new \RuntimeException(sprintf("Unknown mode: %s", $patternMode));
                    break;
            }
        }
        else {
            throw new \InvalidArgumentException("The string argument must be a string");
        }
    }


}
