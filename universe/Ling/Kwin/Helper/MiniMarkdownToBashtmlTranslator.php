<?php


namespace Ling\Kwin\Helper;

/**
 * The MiniMarkdownToBashtmlTranslator class.
 */
class MiniMarkdownToBashtmlTranslator
{


    /**
     * Converts a [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown) string to its @page(bashtml) equivalent.
     *
     * Available options are:
     * - fmtText: string=green, the bashtml format to use for the text part of a link
     * - fmtUrl: string=blue, the bashtml format to use for the url part of a link
     *
     *
     *
     * @param string $string
     * @param array $options
     * @return string
     */
    public static function convertString(string $string, array $options = []): string
    {
        if (true === is_numeric($string)) {
            return $string;
        }

        $co = $options["fmtText"] ?? 'green';
        $ur = $options["fmtUrl"] ?? 'blue';

        $string = preg_replace_callback('!\*\*([^*]+)\*\*!m', function (array $match) {
            $key = $match[1];
            return "<b>$key</b>";
        }, $string);


        $string = preg_replace_callback('!\[([^\]]+)\]\(([^)]+)\)!', function (array $match) use ($co, $ur) {
            $text = $match[1];
            $url = $match[2];
            return "<$co>$text</$co>(<$ur>$url</$ur>)";
        }, $string);
        return $string;
    }


    /**
     * Converts the [mini-markdown](https://github.com/lingtalfi/TheBar/blob/master/discussions/kwin-notation.md#mini-markdown)) to @page(bashtml) in the given array, and returns the result.
     * Both the keys and the values are translated.
     *
     * Available options are:
     * - fmtText: string=green, the bashtml format to use for the text part of a link
     * - fmtUrl: string=blue, the bashtml format to use for the url part of a link
     *
     *
     * @param array $arr
     * @param array $options
     * @return array
     */
    public static function convertArray(array $arr, array $options = []): array
    {
        $ret = [];
        self::convertArrayRecursive($arr, $ret, $options);
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Converts the mini-markdown to bashtml in the given array, and place it in the given $ret variable.
     *
     * Available options are:
     * - fmtText: string=green, the bashtml format to use for the text part of a link
     * - fmtUrl: string=blue, the bashtml format to use for the url part of a link
     *
     * @param array $arr
     * @param array $ret
     * @param array $options
     */
    private static function convertArrayRecursive(array $arr, array &$ret, array $options = [])
    {
        foreach ($arr as $key => $value) {
            $key = self::convertString($key, $options);
            if (true === is_array($value)) {
                $tmpArr = [];
                self::convertArrayRecursive($value, $tmpArr, $options);
                $ret[$key] = $tmpArr;
            } else {
                if (true === is_string($value)) {
                    $value = self::convertString($value, $options);
                }
                $ret[$key] = $value;
            }
        }
    }


}