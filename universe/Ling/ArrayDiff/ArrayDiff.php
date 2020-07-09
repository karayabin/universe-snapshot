<?php


namespace Ling\ArrayDiff;


use Ling\Bat\BDotTool;

/**
 * The ArrayDiff class.
 */
class ArrayDiff
{


    /**
     * Returns the diff between the given arrays "a" and "b".
     *
     * The diff is an array with the following structure, which represents the changes
     * to apply to "a" so that it ends in "b".
     *
     * - 0: toAdd, an array of bkey => value, the values to add to "a" so that it looks like "b".
     * - 1: toRemove,  an array of bkeys to remove from "a" so that it looks like "b".
     * - 2: toUpdate,  an array of bkeys => value, the values to update in "a" so that it looks like "b".
     *
     *
     * bkey refers to the @page(bdot notation).
     *
     *
     *
     *
     * @param array $a
     * @param array $b
     * @return array
     */
    public static function diff(array $a, array $b): array
    {
        $toAdd = [];
        $toRemove = [];
        $toUpdate = [];


        // toRemove
        BDotTool::walk($a, function (&$value, $key, $dotPath) use ($b, &$toRemove) {
            $found = false;
            BDotTool::getDotValue($dotPath, $b, null, $found);
            if (false === $found) {
                $toRemove[] = $dotPath;
            }
        });


        // toAdd, toUpdate
        BDotTool::walk($b, function (&$value, $key, $dotPath) use ($a, &$toAdd, &$toUpdate) {
            $found = false;
            $aVal = BDotTool::getDotValue($dotPath, $a, null, $found);

            if (false === $found) {
                $toAdd[$dotPath] = $value;
            } else {

                // if it's an array, it will be walked...
                if (false === is_array($value)) {
                    if ($aVal !== $value) {
                        $toUpdate[$dotPath] = $value;
                    }
                }
            }
        });


        return [
            $toAdd,
            $toRemove,
            $toUpdate,
        ];
    }
}