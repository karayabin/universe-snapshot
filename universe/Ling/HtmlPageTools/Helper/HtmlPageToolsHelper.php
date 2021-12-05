<?php

namespace Ling\HtmlPageTools\Helper;

/**
 * The HtmlPageToolsHelper class.
 */
class HtmlPageToolsHelper
{


    /**
     * Trims the given string, removes the script tags from it and returns the result.
     *
     * This method assumes that the trimmed version of the string starts and ends with a script tag with no attribute.
     *
     *
     *
     * @param string $js
     * @return string
     */
    public static function stripJsTags(string $js): string
    {
        $s = trim($js);
        return substr($s, 8, -9);
    }
}