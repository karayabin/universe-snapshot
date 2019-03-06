<?php


namespace Ling\Dash2Array;

use Ling\Dash2Array\Node\Node;
use Ling\Dash2Array\Node\NodeInterface;

/**
 * Class Dash2ArrayTool
 * @package Dash2Array
 *
 *
 * - home
 * -- category1
 * ---- subcat1
 * ---- subcat2
 * -- category2
 * -- category3
 *
 *
 * The space between the dash and the text IS MANDATORY (otherwise it won't work).
 *
 *
 * Will translate to either the following array (with leavesAsArray=true):
 *
 * [
 *     home => [
 *          category1 => [
 *              subcat1 => [],
 *              subcat2 => [],
 *          ],
 *          category2 => [],
 *          category3 => [],
 *     ],
 * ],
 *
 *
 * or this array (with leavesAsArray=false):
 *
 * [
 *     home => [
 *          category1 => [
 *              subcat1,
 *              subcat2,
 *          ],
 *          category2,
 *          category3,
 *     ],
 * ],
 *
 *
 * dash increment is 2 by default.
 * Starts with one dash always.
 *
 *
 */
class Dash2ArrayTool
{

    /**
     * @param $f
     * @param array $options
     *      - leavesAsArray: bool=true, whether the leaves should be displayed as empty arrays or strings
     *      - increment: int=2, the base multiple for increments (1 is always the first, then multiple of the increments are used,
     *              for instance with increment=2, the following number of dashes are used: 1, 2, 4, 6, etc...
     * @return array
     * @throws \Exception
     */
    public static function parseFile($f, array $options = [])
    {

        $options = array_replace([
            "leavesAsArray" => true,
            "increment" => 2,
        ], $options);

        $leavesAsArray = $options['leavesAsArray'];
        $increment = $options['increment'];


        if (file_exists($f)) {

            $lines = file($f, \FILE_SKIP_EMPTY_LINES | \FILE_IGNORE_NEW_LINES);
            $previousLevel = -1;
            $root = new Node();
            $level2Node = [];
            $lastNode = $root;
            $level2Node[-1] = $root;

            $ret = [];
            foreach ($lines as $line) {
                $line = trim($line);
                if (0 === strpos($line, '-')) { //  line must start with a dash, or ignore
                    $p = explode(' ', $line, 2);
                    $d = trim($p[0]);
                    $length = strlen($d);
                    $text = trim($p[1]);


                    // find level
                    $level = 0;
                    if ($length > 1) {
                        $level = (int)($length / $increment);
                    }


                    $currentNode = new Node($text);


                    // going to a deeper level
                    if ($level > $previousLevel) {
                        if ($level - $previousLevel > 1) {
                            throw new \Exception("You cannot go down more than one level at the time: text: $text");
                        }
                        $lastNode = self::getNodeAtLevel($previousLevel, $level2Node);
                        /**
                         * @var NodeInterface $lastNode
                         */
                        $lastNode->addChild($currentNode);
                    } // staying at the same level, or going up in a lower level
                    elseif ($level <= $previousLevel) {
                        $lastNode = self::getNodeAtLevel($level - 1, $level2Node);
                        /**
                         * @var NodeInterface $lastNode
                         */
                        $lastNode->addChild($currentNode);
                    }

                    $lastNode = $currentNode;
                    $level2Node[$level] = $currentNode;
                    $previousLevel = $level;

                }

            }

            $ret = self::resolveChildren($root->getChildren(), $leavesAsArray);
            return $ret;
        }
        throw new \Exception("File does not exist: $f");
    }


    /**
     * @return NodeInterface
     */
    private static function getNodeAtLevel($level, array $level2Node)
    {
        return $level2Node[$level];
    }
    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function resolveChildren(array $children, $leavesAsArray)
    {
        $ret = [];
        foreach ($children as $node) {
            /**
             * @var NodeInterface $node
             */
            $v = $node->getValue();

            $children2 = $node->getChildren();
            if ($children2) {
                $ret[$v] = self::resolveChildren($children2, $leavesAsArray);
            } else {
                if (true === $leavesAsArray) {
                    $ret[$v] = [];
                } else {
                    $ret[] = $v;
                }
            }
        }
        return $ret;
    }


}