<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\Diff\StringDiff;


/**
 * StringDiffTool
 * @author Lingtalfi
 * @pattern [lcsDiffMap™]
 * 2014-08-27
 *
 */
class StringDiffTool
{

    /**
     * Returns an array which entries represent what has been deleted to obtain the lcs
     *      from the given string.
     *
     *      Each entry has the following structure:
     *                  - 0: int, the index of the starting expression (in before)
     *                  - 1: int, the length of the expression to delete
     */
    public static function getLcsDiffMap($afterOrBefore, $lcs)
    {
        $ret = [];
        if (is_string($afterOrBefore)) {
            if (is_string($lcs)) {
                $lcsLen = strlen($lcs);
                if ($lcsLen <= strlen($afterOrBefore)) {
                    if ($lcsLen > 0) {
                        $aBefore = str_split($afterOrBefore);
                        $aLcs = str_split($lcs);

                        $lcsIndex = 0;
                        $length = false;
                        $startingIndex = 0;
                        foreach ($aBefore as $i => $c) {
                            if (isset($aLcs[$lcsIndex])) {
                                if ($c === $aLcs[$lcsIndex]) {
                                    if (false !== $length) {
                                        $ret[] = [$startingIndex, $length];
                                        $length = false;
                                    }
                                    $lcsIndex++;
                                }
                                else {
                                    if (false === $length) {
                                        $length = 1;
                                        $startingIndex = $i;
                                    }
                                    else {
                                        $length++;
                                    }
                                }
                            }
                            else {
                                // all lcs chars have been processed,
                                // so the end of the before string has been removed
                                if (false === $length) {
                                    $length = 1;
                                    $startingIndex = $i;
                                }
                                else {
                                    $length++;
                                }
                            }
                        }

                        // registering the operation if any
                        if (false !== $length) {
                            $ret[] = [$startingIndex, $length];
                        }

                        // at this point, if lcs still has unprocessed chars,
                        // well, that wasn't a real lcs, we have to discard that!
                        if ($lcsIndex < $lcsLen) {
                            throw new \UnexpectedValueException("Invalid lcs string: a lcs string must be entirely contained in the before string");
                        }
                    }
                }
                else {
                    throw new \RuntimeException("before's length must be greater than lcs's length");
                }
            }
            else {
                throw new \InvalidArgumentException("lcs must be a string");
            }
        }
        else {
            throw new \InvalidArgumentException("before must be a string");
        }
        return $ret;
    }

    /**
     * callback: a wrapper function to replace the "deleted" string by a customized one.
     */
    public static function applyLcsDiffMap($string, array $lcsDiffMap, $callback = null)
    {
        if (is_string($string)) {

            if (null === $callback) {
                $callback = function ($deletedExpression) {
                    return '<span style="background: yellow;opacity:0.3;text-decoration:line-through;">' . $deletedExpression . '</span>';
                };
            }
            if (is_callable($callback)) {
                $lcsDiffMap = array_reverse($lcsDiffMap);
                foreach ($lcsDiffMap as $op) {
                    list($index, $length) = $op;
                    $word = substr($string, $index, $length);
                    $word = $callback($word);
                    $string = substr_replace($string, $word, $index, $length);
                }
                return $string;
            }
            else {
                throw new \InvalidArgumentException("callback must be a callback");
            }
        }
        else {
            throw new \InvalidArgumentException("string must be a string");
        }
    }

}
