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
 * MicroStringTool
 * @author Lingtalfi
 * 2014-12-26
 *
 * Micro string is a term (that I made up) for problems related to:
 *
 * - escaping
 * - quote protection
 * - nested wrappers (like brackets, parenthesis, ...)
 *
 */
class MicroStringToolOld
{


    public static function explodeUnprotected($delimiter, $string, array $protection = null)
    {
        $ret = [];
        $positions = StringTool::strPosAll($string, $delimiter);
        $ranges = self::getProtectedRangesPos($string, $protection);
        $positions = array_filter($positions, function ($v) use ($ranges) {
            foreach ($ranges as $pair) {
                if ($v > $pair[0] && $v < $pair[1]) {
                    return false;
                }
            }
            return true;
        });
        $len = strlen($delimiter);
        $tlen = strlen($string);
        $start = 0;
        foreach ($positions as $pos) {
            $length = $pos - $start;
            $ret[] = substr($string, $start, $length);
            $start = $pos + $len;
        }
        if ($start < $tlen) {
            $ret[] = substr($string, $start);
        }

        array_walk($ret, function (&$v) {
            $v = self::getUnprotectString($v);
        });


        return $ret;
    }

//    public static function explodeUnprotected($delimiter, $string)
//    {
//        $ret = [];
//        $positions = StringTool::strPosAll($string, $delimiter);
//        $quotes = self::getEffectiveQuotesPos($string);
//        $positions = array_filter($positions, function ($v) use ($quotes) {
//            foreach ($quotes as $pair) {
//                if ($v > $pair[0] && $v < $pair[1]) {
//                    return false;
//                }
//            }
//            return true;
//        });
//        $len = strlen($delimiter);
//        $tlen = strlen($string);
//        $start = 0;
//        foreach ($positions as $pos) {
//            $length = $pos - $start;
//            $ret[] = substr($string, $start, $length);
//            $start = $pos + $len;
//        }
//        if ($start < $tlen) {
//            $ret[] = substr($string, $start);
//        }
//
//        array_walk($ret, function (&$v) {
//            $v = self::getUnprotectString($v);
//        });
//
//
//        return $ret;
//    }

    /**
     * @return array of positions, each position has two entries:
     *                  - 0: start: int
     *                  - 1: end: int
     */
//    public static function getEffectiveQuotesPos($string)
//    {
//        $ret = [];
//        if (
//            (false !== strpos($string, '"')) ||
//            (false !== strpos($string, "'"))
//        ) {
//            $dquotes = self::getUnescapedPos($string, '"');
//            $squotes = self::getUnescapedPos($string, "'");
//            reset($dquotes);
//            reset($squotes);
//
//            $clean = function ($pos, array &$dq, array &$sq) {
//                $dq = array_filter($dq, function ($v) use ($pos) {
//                    return ($v > $pos);
//                });
//                $sq = array_filter($sq, function ($v) use ($pos) {
//                    return ($v > $pos);
//                });
//            };
//            $process = function ($pos, array &$dq, array &$sq) use ($clean) {
//                $ret = false;
//                $dqVal = $sqVal = null;
//                $dqInd = $sqInd = 0;
//                foreach ($dq as $dqInd => $dqVal) {
//                    if ($dqVal >= $pos) {
//                        break;
//                    }
//                    unset($dq[$dqInd]);
//                }
//                foreach ($sq as $sqInd => $sqVal) {
//                    if ($sqVal >= $pos) {
//                        break;
//                    }
//                    unset($sq[$sqInd]);
//                }
//
//                // which quote comes first?
//                $mode = 0;
//                if (null !== $dqVal && null !== $sqVal) {
//                    if ($dqVal < $sqVal) {
//                        $mode = 'd';
//                    } elseif ($sqVal < $dqVal) {
//                        $mode = 's';
//                    }
//                } elseif (null !== $dqVal) {
//                    $mode = 'd';
//                } elseif (null !== $sqVal) {
//                    $mode = 's';
//                }
//
//                // add entries
//                if ('d' === $mode && isset($dq[$dqInd + 1])) {
//                    $ret = [$dqVal, $dq[$dqInd + 1]];
//                    $clean($dq[$dqInd + 1], $dq, $sq);
//                } elseif ('s' === $mode && isset($sq[$sqInd + 1])) {
//                    $ret = [$sqVal, $sq[$sqInd + 1]];
//                    $clean($sq[$sqInd + 1], $dq, $sq);
//                }
//
//                return $ret;
//            };
//
//            $pos = 0;
//            while (false !== $pair = $process($pos, $dquotes, $squotes)) {
//                $ret[] = $pair;
//                $pos = $pair[1];
//            }
//        }
//        return $ret;
//    }


    /**
     * Returns the protected ranges positions.
     * Protection is usually done with quotes, but it can also be done with wrappers
     * like { and } for instance.
     * Unescaped and unprotected protection chars only are returned.
     *
     *
     * @return array of position pairs, each position pair is an array
     *              with two entries:
     *              - 0: start
     *              - 1: end
     *
     */
    public static function getProtectedRangesPos($string, array $protection = null)
    {
        $ret = [];
        if (null === $protection) {
            $protection = [
                '"',
                "'",
            ];
        }
        // public options
        $offset = 0;

        // creating the pattern
        $ps = [];
        $pr = [];
        foreach ($protection as $p) {
            if (is_array($p)) {
                $ps[] = $p[0];
                $ps[] = $p[1];
                $pr[$p[0]] = $p[1];
            } else {
                $ps[] = $p;
                $pr[$p] = $p;
            }
        }
        array_walk($ps, function (&$v) {
            $v = preg_quote($v, '!');
        });
        $pattern = implode('|', $ps);

        if (preg_match_all('!' . $pattern . '!', $string, $matches, PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER, $offset)) {
            if (isset($matches[0])) {
                $nodes = $matches[0];

                $level = -1;
                // looking for the first non escaped match
                while ($node = array_shift($nodes)) {
                    if (
                        array_key_exists($node[0], $pr) &&
                        false === self::isEscapedPos($node[1], $string)
                    ) {
                        $cEnd = $pr[$node[0]];
                        if ($cEnd !== $node[0]) { // wrappers
                            $level++;
                        }

                        // looking for the corresponding unescaped ending match
                        /**
                         * Watch out: we have to handle nesting for wrappers.
                         */
                        while ($node2 = array_shift($nodes)) {
                            if ($cEnd !== $node[0] && $node[0] === $node2[0]) { // wrappers
                                $level++;
                            }

                            if ($cEnd === $node2[0] && false === self::isEscapedPos($node2[1], $string)) {
                                if (
                                    $cEnd === $node[0] ||
                                    $level <= 0
                                ) {
                                    $ret[] = [$node[1], $node2[1]];
                                    $level = -1;
                                    break;
                                }
                                $level--;
                            }
                        }
                    }
                }
            }
        }
        return $ret;
    }

    /**
     * @return array, the positions of the unescaped wrappers.
     *
     * Each entry represents a level (of imbrication).
     * Each layer contains an arbitrary number of nodes.
     * Each node has three states:
     *  - placeholder: null
     *  - started: array with one entry: the open pos
     *  - ended: array with two entries: the open and close pos
     *
     * For instance the following string:
     *
     *  - hello {how are {you} }, did you see {me}?
     *
     * Would have the following pos (the position of the wrapper is indicated,
     * not the position of the content of the wrapper):
     *
     * - 0:
     * ----- [6, 21]  # this is an outer wrapper
     * ----- [36, 39] # this is also an outer wrapper
     * - 1:
     * ----- [15, 19]  # this is an inner wrapper of the first wrappers
     *
     *
     * A malformed string would return false.
     * Malformed means at least one node is not in the ended state.
     *
     */
//    public static function getUnescapedOuterWrapperPos($string, $wrapperType)
//    {
//        $ret = [];
//        $allowedWrapperTypes = [
//            '{' => ['{', '}'],
//            '(' => ['(', ')'],
//            '[' => ['[', ']'],
//            '<' => ['<', '>'],
//        ];
//        if (array_key_exists($wrapperType, $allowedWrapperTypes)) {
//            /**
//             * For this task, 2 components:
//             * - cursor moving
//             * - building the ret array
//             *
//             */
//            $len = strlen($string);
//            $wrappers = $allowedWrapperTypes[$wrapperType];
//
//            /**
//             * State:
//             * - 0: finished
//             * - 1: started
//             */
//            $state = 0;
//            $level = 0;
//            $isInvalid = false;
//            $cptOpen = 0;
//            $cptClose = 0;
//            /**
//             * @return false, in case of failure
//             */
//            $closeLastNodeAtLevel = function (array &$all, $level, $pos) {
//                if (
//                    isset($all[$level]) &&
//                    is_array($all[$level]) &&
//                    (count($all[$level]) > 0)
//                ) {
//                    $n = count($all[$level]);
//                    if (
//                        is_array($all[$level][$n - 1]) &&
//                        (1 === count($all[$level][$n - 1]))
//                    ) {
//                        $all[$level][$n - 1][] = $pos;
//                        return true;
//                    }
//
//                }
//                return false;
//            };
//
//            for ($i = 0; $i < $len; $i++) {
//                $char = $string[$i];
//                if ('\\' === $char) {
//                    // the next char will be escaped, so we can just skip
//                    // both the current and the next char (we don't need to know
//                    // which char is the next)
//                    $i++;
//                    continue;
//                } elseif (in_array($char, $wrappers, true)) {
//                    $open = false;
//                    if ($wrapperType === $char) {
//                        $open = true;
//                    }
//                    if (true === $open) {
//                        $cptOpen++;
//                        if (1 === $state) {
//                            $level++;
//                        }
//                        $ret[$level][] = [$i];
//                        $state = 1;
//                    } elseif (false === $open) {
//                        $cptClose++;
//                        if (1 === $state) {
//                            if (true === $closeLastNodeAtLevel($ret, $level, $i)) {
//                                $state = 0;
//                            } else {
//                                $isInvalid = true;
//                                break;
//                            }
//                        } elseif (0 === $state) {
//                            /**
//                             * the node at this level has already
//                             * been closed (state=0), so we are normally
//                             * closing a higher level
//                             */
//                            if ($level > 0) {
//                                $level--;
//                                if (false === $closeLastNodeAtLevel($ret, $level, $i)) {
//                                    $isInvalid = true;
//                                    break;
//                                }
//                            } else {
//                                $isInvalid = true;
//                                break;
//                            }
//                        }
//                    }
//
//                }
//            }
//            if (
//                true === $isInvalid ||
//                1 === $state ||
//                ($cptClose !== $cptOpen)
//            ) {
//                $ret = false;
//            }
//        } else {
//            throw new \InvalidArgumentException(sprintf("Unknown wrapper type: %s", $wrapperType));
//        }
//        return $ret;
//    }


    /**
     * @return array of positions
     */
    public static function getUnescapedPos($haystack, $needle)
    {
        $ret = StringTool::strPosAll($haystack, $needle);
        $ret = array_filter($ret, function ($pos) use ($haystack) {
            return (false === self::isEscapedPos($pos, $haystack));
        });
        return array_merge($ret);
    }


    /**
     * In the context of this method, a protected string starts and
     * ends with the an unescaped quote of type q, and
     * the inner string does not contain an unescaped quote of type q.
     *
     */
    public static function getUnprotectString($string)
    {
        $f = substr($string, 0, 1);
        $l = substr($string, -1);
        if (
            in_array($f, ['"', "'"]) &&
            $f === $l
        ) {
            $len = strlen($string);
            $length = 0;
            if (false === self::isEscapedPos($len - 1, $string, $length)) {
                $inner = substr($string, 1, -($length + 1));
                if (false === self::hasUnescapedString($inner, $f)) {
                    $string = str_replace('\\' . $f, $f, $inner);
                }
            }
        }
        return $string;
    }


    public static function hasUnescapedString($haystack, $needle)
    {
        $pos = StringTool::strPosAll($haystack, $needle);
        foreach ($pos as $p) {
            if (false === self::isEscapedPos($p, $haystack)) {
                return true;
            }
        }
        return false;
    }

    public static function hasUnprotectedString($haystack, $needle)
    {
        if (false !== $pos = strpos($haystack, $needle)) {
            $pos = StringTool::strPosAll($haystack, $needle);
            $pairs = MicroStringTool::getProtectedRangesPos($haystack);
            foreach ($pos as $p) {
                foreach ($pairs as $q) {
                    if ($p > $q[0] && $p < $q[1]) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }

    public static function isEscapedPos($pos, $haystack, &$length = 0)
    {
        while (
            (isset($haystack[$pos - 1])) &&
            '\\' === $haystack[$pos - 1]
        ) {
            $length++;
            $pos--;
        }
        return (1 === $length % 2);
    }


    public static function pregReplaceCallbackUnescaped($pattern, $callback, $subject, $flags = '')
    {
        $pat = '!(\\\\*)' . str_replace('!', '\!', $pattern) . '!' . $flags;
        return preg_replace_callback($pat, function ($m) use ($callback) {
            $len = strlen($m[1]);
            if (0 === $len % 2) {
                return $callback($m[0]);
            }
            return $m[0];
        }, $subject);
    }


}
