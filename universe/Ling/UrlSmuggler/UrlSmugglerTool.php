<?php


namespace Ling\UrlSmuggler;


/**
 * The UrlSmugglerTool class.
 */
class UrlSmugglerTool
{


    /**
     * Returns the smuggled version of the url.
     *
     * @param string $url
     * @return string
     */
    public static function smuggle(string $url): string
    {
        return str_replace([
            "?",
            "&",
        ], [
            '__question_mark__',
            '__ampersand__',
        ], $url);
    }


    /**
     * Returns the unsmuggled version of the (smuggled) url.
     *
     * @param string $smuggledUrl
     * @return string
     */
    public static function unsmuggle(string $smuggledUrl): string
    {
        return str_replace([
            '__question_mark__',
            '__ampersand__',
        ], [
            "?",
            "&",
        ], $smuggledUrl);
    }

}