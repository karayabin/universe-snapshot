<?php


namespace Ling\DocTools\Helper;


/**
 * The TagHelper class.
 * It helps with tags found in the doc comments.
 */
class TagHelper
{


    /**
     * Returns the tag info associated with an @concept(expandable block-level tag).
     * The returned array contains the following entries:
     *
     * - 0: string. The tag definition: the tag string until it is stopped by either a dot or a newline character.
     * - 1: string. The tag comment text: it is composed of everything on the first line that follows the first dot character found,
     *      plus all the subsequent lines (if any). It is an empty string by default
     *
     *
     * @param string $tag . The raw tag expression.
     * @return array
     */
    public static function getTagInfo(string $tag)
    {
        $tagText = "";
        $p = explode(PHP_EOL, $tag);
        $firstLine = array_shift($p);
        $tail = implode(PHP_EOL, $p);


        $q = explode(".", $firstLine);
        $tagDef = trim(array_shift($q));

        if ($q) {
            $tagText .= trim(implode('.', $q));
        }
        if ($tail) {
            if ($tagText) {
                $tagText .= PHP_EOL;
            }
            $tagText .= $tail;
        }
        return [
            $tagDef,
            $tagText,
        ];
    }

}