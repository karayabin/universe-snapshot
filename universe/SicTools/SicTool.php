<?php


namespace SicTools;


/**
 * The SicTool class contains general purpose methods to work with the sic notation.
 *
 * @link https://github.com/lingtalfi/NotationFan/blob/master/sic.md
 *
 */
class SicTool
{


    /**
     * Returns whether the given $thing is a sic block.
     *
     * @param mixed $thing
     * @param string=null $passKey
     * @return bool
     */
    public static function isSicBlock($thing, $passKey = null)
    {
        if (
            is_array($thing) &&
            array_key_exists("instance", $thing) &&
            (
                null === $passKey ||
                false === array_key_exists($passKey, $thing)
            )
        ) {
            return true;
        }
        return false;
    }

}