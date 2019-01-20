<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\Html\MarkDown\MarkDown\Filter;

use BeeFramework\Devil\HtmlParser\HtmlParserTool;


/**
 * FlattenBlockElementsFilter
 * @author Lingtalfi
 * 2014-08-29
 *
 *
 * Since markdown doesn't process html block level element's content,
 * our approach is to flatten them (kind of extrude them)
 * to clean the path for the other filters,
 * then at the end (when all other filters have applied),
 * we unflat the block elements again.
 *
 *
 * Because it is possible for a block element to be followed by some trailing
 * content, like in:
 *
 *      <div></div>extra content
 *
 * Our technique is to flatten and add \n\n.
 * So for instance, the string above should look something like this once flattened:
 *
 *
 *      __md:45__\n\nextra content
 *
 *
 * Thus, the other filter might be able to do their job without noticing.
 * Also note that other filters should ignore our flattened tags.
 * This is constraining, but at least all block elements are handled at once
 * (theoretically).
 *
 *
 */
class FlattenBlockElementsFilter extends BaseFilter
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS TextConvertorFilterInterface
    //------------------------------------------------------------------------------/
    public function filter($string)
    {
        $blockPos = $this->getStartingBlockPositions($string);
        a($blockPos);
        /**
         * Here we store the start-end positions of the outer blocks (longest valid blocks)
         * starting at the beginning of a line, and sorted per type.
         * Maybe it should have been called longestValidRanges.
         */
        $longestRanges = [];

        foreach ($blockPos as $p) {
            $sub = substr($string, $p[1]);
            if (false !== $ranges = HtmlParserTool::getValidOuterTagPositions($sub, $p[0])) {
                if (!array_key_exists($p[0], $longestRanges)) {
                    $longestRanges[$p[0]] = [];
                }
                $ranges[0][0] = $p[1];
                $ranges[0][1] += $p[1];
                $longestRanges[$p[0]][] = $ranges[0]; // we are only interested by the very first range
            }
        }

        /**
         * Now that we have our valid ranges, let's take care (strip out) of nested elements
         */
        foreach ($longestRanges as $type => $blocks) {
            $parent = null;
            foreach ($blocks as $k => $p) {
                if (null !== $parent) {
                    if ($parent[0] < $p[0] && $parent[1] > $p[1]) {
                        unset($longestRanges[$type][$k]);
                    }
                }
                $parent = $p;
            }
            $blocks = array_merge($blockPos); // not tested...
        }


        /**
         * Now we only have the longest valid block level elements which opening tag
         * is at the beginning of a line (allowing 3 indent spaces).
         * So let's flatten them.
         */
        a($longestRanges);
        return $string;
    }


    protected function getBlockNamesAsRegexAlternatives()
    {
        $alt = [];
        foreach ($this->getBlockNames() as $name) {
            $alt[] = '(?:' . $name . ')';
        }
        return implode('|', $alt);
    }


    /**
     * @return array of:
     *      - tagName
     *      - pos
     */
    public function getStartingBlockPositions($string)
    {
        $ret = [];
        $alts = $this->getBlockNamesAsRegexAlternatives();
        if (preg_match_all('!^(?: {0,3})?<(' . $alts . ')[^>]*>!mi', $string, $m, PREG_OFFSET_CAPTURE | PREG_PATTERN_ORDER)) {
            foreach ($m[1] as $p) {
                $ret[] = [
                    $p[0],
                    $p[1] - 1,
                ];
            }
        }
        return $ret;
    }

}
