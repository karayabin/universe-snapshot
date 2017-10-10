<?php


namespace Kamille\Utils\Routsy\Util\DynamicUriMatcher;



use Kamille\Utils\Routsy\RoutsyUtil;

class CherryDynamicUriMatcher{
    /**
     *
     * Tags
     * --------
     *
     * We can use tags to convert some parts of the uri to variables.
     *
     * There are three types of tags:
     *
     * - default tag:   {foo}
     * - slash tag:     {/foo}
     * - greedy tag:    {foo+}
     *
     *
     * The default tag must consume at least one char to validate.
     * It matches any char except a slash.
     *
     * The slash tag is optional, meaning that it can matches zero char.
     * Like the default slash, it matches any char except a slash.
     * However, it accepts a slash if and only if that slash is at the first position.
     * This tag was created to allow this kind of handy poly-matching:
     *
     *          blog{/id}
     *                  matches both (for instance):
     *                          - blog
     *                          - blog/65
     *
     * Greedy tags match any number of chars, including none.
     *
     * For all tags, if there is a match with zero char, null is returned as the value instead of the empty string.
     *
     *
     *
     * Uri pre-transformations
     * -------------------------------
     *
     * Uri pre-transformations are executed internally BEFORE any matching operation occurs,
     * it is important to be aware of them before using this class:
     *
     *      - if the last char of the uri is a slash, it is stripped.
     *      - an empty uri will be converted to a slash.
     *
     *
     *
     *
     *
     *
     *
     */
    public static function matchDynamic($pattern, $uri)
    {
        $ret = false;
        $patternVars = [];
        $slashTagVars = [];
        $greedyVars = [];
        // remove last slash if any
        $uri = RoutsyUtil::removeTrailingSlash($uri);
        // extract vars from pattern
        if (preg_match_all('#(?<!\\\)\{\/?[a-zA-Z0-9_]+\+?(?<!\\\)\}#', $pattern, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $index => $match) {
                $inner = substr($match[0], 1, -1);
                if ('/' === substr($inner, 0, 1)) {
                    $inner = substr($inner, 1);
                    $slashTagVars[] = $inner;
                } elseif ('+' === substr($inner, -1)) {
                    $inner = substr($inner, 0, -1);
                    $greedyVars[] = $inner;
                }
                $patternVars[$index] = $inner;
            }
        }
        // convert to regex
        $regex = '!^' . preg_quote($pattern, '!') . '$!';
        // if pattern used \{, it will contains two escape chars (because of preg_quote).
        $regex = str_replace([
            '\\\\{',
            '\\\\}',
            '\\{',
            '\\}',
            '\\+',
        ], [
            '{',
            '}',
            '{',
            '}',
            '+',
        ], $regex);
        if ($patternVars) {
            foreach ($patternVars as $varName) {
                if (false === in_array($varName, $slashTagVars, true)) {
                    if (false === in_array($varName, $greedyVars, true)) {
                        $regex = str_replace('{' . $varName . '}', '([^/]*+)', $regex);
                    } else {
                        $regex = str_replace('{' . $varName . '+}', '(.*)', $regex);
                    }
                } else {
                    $regex = str_replace('{/' . $varName . '}', '(?:/?([^/]*+))', $regex);
                }
            }
        }
        // perform the matching
//        a($regex, $uri);
        if (preg_match($regex, $uri, $matches)) {
            $ret = array();
            array_shift($matches); // drop the first key (whole match) to synchronize the matching with patternVars
            foreach ($matches as $i => $v) {
                if (array_key_exists($i, $patternVars)) {
                    // remove the leading slash from matching slash tag
                    if (true === in_array($i, $slashTagVars, true)) {
                        $v = substr($v, 1);
                    }
                    if ('' === $v) {
                        $v = null;
                    }
                    $ret[$patternVars[$i]] = $v;
                }
            }
        }
        return $ret;
    }
}