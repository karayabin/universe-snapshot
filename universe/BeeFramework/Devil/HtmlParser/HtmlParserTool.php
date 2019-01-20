<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Devil\HtmlParser;


/**
 * HtmlParserTool
 * @author Lingtalfi
 * 2014-08-29
 *
 */
class HtmlParserTool
{

    /**
     * Returns array|false if no valid tag is found (or in case of error)
     * If an array is returned, each entry contains two values:
     *
     *      - (node)
     *      ----- 0: index of the first char of the longest valid opening tag
     *      ----- 1: index of the last char of the longest valid closing tag
     */
    public static function getValidOuterTagPositions($string, $tag)
    {
        $ret = false;
        if (preg_match_all('!(?:<' . $tag . '[^>]*>)|(?:</' . $tag . '>)!i', $string, $m, PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER)) {
            $nbTotalValidTags = 0;
            $ret = [];
            /**
             * - 0: index
             * - 1: type=open|close
             */
            $stack = [];
            $endTagLength = strlen($tag) + 3;
            foreach ($m[0] as $info) {
                list($tag, $pos) = $info;
                $type = ('</' === substr($tag, 0, 2)) ? 'close' : 'open';
                if ('open' === $type) {
                    $stack[] = [$pos, $type];
                }
                else {
                    $addToStack = true;
                    $n = count($stack);
                    if (isset($stack[$n - 1])) {
                        $prevType = $stack[$n - 1][1];
                        if ('open' === $prevType) {
                            $prevPos = $stack[$n - 1][0];
                            $addToStack = false;
                            $ret[] = [
                                $prevPos,
                                $pos + $endTagLength,
                            ];
                            // remove the previous opening tag
                            array_pop($stack);
                            $nbTotalValidTags++;
                        }
                    }
                    if (true === $addToStack) {
                        $stack[] = [$pos, $type];
                    }
                }
            }

            // now we need to filter out children, so that we only have outer tags left.
            // first let's sort by the opening tag index
            usort($ret, function ($a, $b) {
                return ($a[0] > $b[0]);
            });

            $parent = null;
            foreach ($ret as $k => $p) {
                $changeParent = true;
                if (null !== $parent) {
                    if ($parent[0] < $p[0] && $parent[1] > $p[1]) {
                        unset($ret[$k]);
                        $changeParent = false;
                    }
                }
                if (true === $changeParent) {
                    $parent = $p;
                }
            }
            $ret = array_merge($ret);

            if ($nbTotalValidTags < 1) {
                $ret = false;
            }
        }
        return $ret;
    }

}
