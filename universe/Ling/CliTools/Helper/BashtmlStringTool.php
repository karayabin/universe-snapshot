<?php


namespace Ling\CliTools\Helper;


/**
 * The BashtmlStringTool class.
 */
class BashtmlStringTool
{


    /**
     * When you trim a long formatted string (because it's too long description that you want to reduce to only the first 100 chars, for instance),
     * then it can happen that the bashtml formatting of the trimmed string is incorrect, leading to bleeding formatting.
     * For instance, a trimmed string could look like this:
     *
     * - With no argument, reads the <bold:green>lpi.byml</bold:gr
     *
     * The problem is that if you display that in a console, everything that follows will be bold green.
     *
     * This method helps fixing this problem by recreating the missing/incomplete formatting tags, and returns the "repaired" string.
     *
     * It assumes that bashtml formatting is used (i.e. it doesn't fix any other notation).
     *
     *
     *
     * @param string $trimmed
     * @return string
     */
    public static function fixTrimmedStringFormatting(string $trimmed): string
    {
        $trimmed = self::removeLastIncompleteTag($trimmed);
        $tags = self::captureTags($trimmed);


        $tags = array_reverse($tags, true);
        foreach($tags as $tag => $info){
            if(true === $info[1]){
                break;
            }
            $trimmed .= '</' . $tag . '>';
        }
        return $trimmed;
    }


    /**
     * Returns the given string, after removing an incomplete bashtml tag if it ends the given string.
     * So for instance, if the given string is:
     *
     * - With no argument, reads the <bold:green>lpi.byml</bold:gr
     *
     * Then this method returns:
     *
     * - With no argument, reads the <bold:green>lpi.byml
     *
     *
     *
     * @param string $str
     * @return string
     */
    public static function removeLastIncompleteTag(string $str): string
    {
        if ('<' === substr($str, -1)) {
            return substr($str, 0, -1);
        } elseif ('</' === substr($str, -2)) {
            return substr($str, 0, -2);
        }

        $matches = [];
        if (preg_match('!\</[^>]+$!sm', $str, $matches, \PREG_OFFSET_CAPTURE)) {
            $pos = $matches[0][1];
            return mb_substr($str, 0, $pos);
        }
        return $str;

    }


    /**
     * Captures and returns all valid bashtml tags found in the given string.
     * The tags are captured in the order they are found in the string.
     *
     *
     * The return is an array of tagContent => info,
     * with:
     *
     * - tagContent: string, the tag content, such as:
     *      - b
     *      - bold
     *      - red:bgBlue
     * - info: array containing two elements:
     *      - 0: bool, whether the opening form of the tag was found
     *      - 0: bool, whether the closing form of the tag was found
     *
     *
     *
     *
     * @param string $str
     * @return array
     */
    private static function captureTags(string $str): array
    {
        $ret = [];
        $matches = [];
        if (preg_match_all('!\<([/a-zA-Z0-9:]+)>!sm', $str, $matches)) {
            $results = $matches[1];
            foreach ($results as $result) {

                $isClosing = false;
                if ('/' === substr($result, 0, 1)) {
                    $isClosing = true;
                    $result = substr($result, 1);
                }


                if (false === array_key_exists($result, $ret)) {
                    $ret[$result] = [
                        false,
                        false,
                    ];
                }


                if (true === $isClosing) {
                    $ret[$result][1] = true;
                } else {
                    $ret[$result][0] = true;
                }
            }
        }
        return $ret;
    }


}