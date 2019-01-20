<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Bat;


/**
 * StringTool
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class StringTool
{

    public static function autoCast($string)
    {
        if (!is_string($string)) {
            throw new \InvalidArgumentException(sprintf("The given argument must be a string, %s given", gettype($string)));
        }

        $r = null;
        if ('null' === $string) {
            $r = null;
        }
        elseif ('true' === $string) {
            $r = true;
        }
        elseif ('false' === $string) {
            $r = false;
        }
        else {
            $trim = trim($string);
            if (is_numeric($trim)) {
                if (false === strpos($trim, '.')) {
                    $r = (int)$trim;
                }
                else {
                    $r = (float)$trim;
                }
            }
            else {
                $r = $string;
            }
        }
        return $r;
    }


    public static function boolNullToString($mixed)
    {
        if (null === $mixed) {
            $mixed = 'null';
        }
        elseif (false === $mixed) {
            $mixed = 'false';
        }
        elseif (true === $mixed) {
            $mixed = 'true';
        }
        return $mixed;
    }


    /**
     * Trims the given string, and reduces multiple (consecutive) blanks to one single space
     * (, and return the result).
     */
    public static function collapseWhiteSpaces($s){
        $s = trim($s);        
        // // remove non breaking spaces: http://stackoverflow.com/questions/12837682/non-breaking-utf-8-0xc2a0-space-and-preg-replace-strange-behaviour/12838189#12838189
        $s = preg_replace('/\s+|\x{00a0}/siu', ' ', $s);
        return $s;
    }

    /**
     * @param int $start
     * @param int $length
     * @return string
     */
    public static function delete($string, $start, $length)
    {
        $begin = mb_substr($string, 0, $start);
        $end = mb_substr($string, $start + $length);
        return $begin . $end;
    }


    public static function endsWith($haystack, $needle)
    {
        return (substr($haystack, -strlen($needle)) === $needle);

    }


    public static function getChars($s)
    {
        /**
         * I tested this technique over the one below:
         *
         * $ret = [];
         * $len = mb_strlen($s);
         * for ($i = 0; $i < $len; $i++) {
         *      $ret[] = mb_substr($s, $i, 1);
         * }
         * return $ret;
         *
         *
         * And the preg_match_all technique is about two times faster.
         *
         */
        if (false === preg_match_all('/./us', $s, $chars)) {
            return [];
        }
        return $chars[0];
    }

    /**
     * This method assumes that the input is a string
     */
    public static function isBlank($s)
    {
        return (' ' === $s || "\t" === $s);
    }


    public static function isTrue($v)
    {
        if (
            true === $v ||
            (is_numeric($v) && (int)$v > 0) ||
            'true' === $v ||
            'yes' === $v
        ) {
            return true;
        }
        return false;
    }


    /**
     * @param int $start
     *                  if start is bigger than the string's length,
     *                  then the text will be inserted at the end of the string.
     * @return string
     */
    public static function insertAt($string, $start, $insertText)
    {
        return self::replace($string, $start, 0, $insertText);
    }


    public static function namespaceBaseName($string)
    {
        if (false !== $pos = strrpos($string, '\\')) {
            $string = substr($string, $pos + 1);
        }
        return $string;
    }

    public static function parseTags($string, array $tags = [])
    {
        $r = [];
        foreach ($tags as $k => $v) {
            if (!is_string($v)) {
                $v = VarTool::toString($v, ['details' => true]);
            }
            $r['{' . $k . '}'] = $v;
        }
        return str_replace(array_keys($r), array_values($r), (string)$string);
    }

    /**
     * @param int $start
     *                  if start is bigger than the string's length,
     *                  then the text will be inserted at the end of the string.
     * @param int $length
     * @return string
     */
    public static function replace($string, $start, $length, $replacement)
    {
        $begin = mb_substr($string, 0, $start);
        $end = mb_substr($string, $start + $length);
        return $begin . $replacement . $end;
    }


    public static function skipBlanks($line, &$pos)
    {
        while (isset($line[$pos])) {
            $char = $line[$pos];
            if (
                ' ' === $char ||
                "\t" === $char
            ) {
                $pos++;
            }
            else {
                break;
            }
        }
    }


    public static function stripAccents($string)
    {
        $accents = array('À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'Ā' => 'A', 'ā' => 'a', 'Ă' => 'A', 'ă' => 'a', 'Ą' => 'A', 'ą' => 'a', 'Ç' => 'C', 'ç' => 'c', 'Ć' => 'C', 'ć' => 'c', 'Ĉ' => 'C', 'ĉ' => 'c', 'Ċ' => 'C', 'ċ' => 'c', 'Č' => 'C', 'č' => 'c', 'Ð' => 'D', 'ð' => 'd', 'Ď' => 'D', 'ď' => 'd', 'Đ' => 'D', 'đ' => 'd', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'Ē' => 'E', 'ē' => 'e', 'Ĕ' => 'E', 'ĕ' => 'e', 'Ė' => 'E', 'ė' => 'e', 'Ę' => 'E', 'ę' => 'e', 'Ě' => 'E', 'ě' => 'e', 'Ĝ' => 'G', 'ĝ' => 'g', 'Ğ' => 'G', 'ğ' => 'g', 'Ġ' => 'G', 'ġ' => 'g', 'Ģ' => 'G', 'ģ' => 'g', 'Ĥ' => 'H', 'ĥ' => 'h', 'Ħ' => 'H', 'ħ' => 'h', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'Ĩ' => 'I', 'ĩ' => 'i', 'Ī' => 'I', 'ī' => 'i', 'Ĭ' => 'I', 'ĭ' => 'i', 'Į' => 'I', 'į' => 'i', 'İ' => 'I', 'ı' => 'i', 'Ĵ' => 'J', 'ĵ' => 'j', 'Ķ' => 'K', 'ķ' => 'k', 'ĸ' => 'k', 'Ĺ' => 'L', 'ĺ' => 'l', 'Ļ' => 'L', 'ļ' => 'l', 'Ľ' => 'L', 'ľ' => 'l', 'Ŀ' => 'L', 'ŀ' => 'l', 'Ł' => 'L', 'ł' => 'l', 'Ñ' => 'N', 'ñ' => 'n', 'Ń' => 'N', 'ń' => 'n', 'Ņ' => 'N', 'ņ' => 'n', 'Ň' => 'N', 'ň' => 'n', 'ŉ' => 'n', 'Ŋ' => 'N', 'ŋ' => 'n', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'Ō' => 'O', 'ō' => 'o', 'Ŏ' => 'O', 'ŏ' => 'o', 'Ő' => 'O', 'ő' => 'o', 'Ŕ' => 'R', 'ŕ' => 'r', 'Ŗ' => 'R', 'ŗ' => 'r', 'Ř' => 'R', 'ř' => 'r', 'Ś' => 'S', 'ś' => 's', 'Ŝ' => 'S', 'ŝ' => 's', 'Ş' => 'S', 'ş' => 's', 'Š' => 'S', 'š' => 's', 'ſ' => 's', 'Ţ' => 'T', 'ţ' => 't', 'Ť' => 'T', 'ť' => 't', 'Ŧ' => 'T', 'ŧ' => 't', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'Ũ' => 'U', 'ũ' => 'u', 'Ū' => 'U', 'ū' => 'u', 'Ŭ' => 'U', 'ŭ' => 'u', 'Ů' => 'U', 'ů' => 'u', 'Ű' => 'U', 'ű' => 'u', 'Ų' => 'U', 'ų' => 'u', 'Ŵ' => 'W', 'ŵ' => 'w', 'Ý' => 'Y', 'ý' => 'y', 'ÿ' => 'y', 'Ŷ' => 'Y', 'ŷ' => 'y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'ź' => 'z', 'Ż' => 'Z', 'ż' => 'z', 'Ž' => 'Z', 'ž' => 'z');
        return strtr($string, $accents);
    }


    /**
     * Return false|int, the position of the nth occurrence, nth given by
     * the third parameter.
     * An empty needle will always return false.
     *
     * If the given occurrence number is higher than the actual number of occurrences found,
     * this method will return:
     *          false if lastOccurrenceStays is set to false,
     *          the position of the last occurrence found if lastOccurrenceStays is set to true
     *
     */
    public static function strOccPos($haystack, $needle, $occurrence = 1, $lastOccurrenceStays = false)
    {
        return self::_strOccPos($haystack, $needle, $occurrence, $lastOccurrenceStays);
    }


    /**
     * Return false|int, the position of the nth occurrence starting from the end, nth given by
     * the third parameter.
     * An empty needle will always return false.
     *
     * If the given occurrence number is higher than the actual number of occurrences found,
     * this method will return:
     *          false if lastOccurrenceStays is set to false,
     *          the position of the first occurrence found if lastOccurrenceStays is set to true
     *
     */
    public static function strOccRPos($haystack, $needle, $occurrence = 1, $lastOccurrenceStays = false)
    {
        return self::_strOccPos($haystack, $needle, $occurrence, $lastOccurrenceStays, false);
    }


    /**
     * Returns an array containing all the positions of $needle in $haystack.
     * A warning E_USER_WARNING is generated if needle is the empty string.
     *
     */
    public static function strPosAll($haystack, $needle, $offset = 0)
    {
        $ret = [];
        if (is_string($needle)) {
            $len = mb_strlen($needle);
            while (false !== $pos = mb_strpos($haystack, $needle, $offset)) {
                $ret[] = $pos;
                $offset = $pos + $len;
            }
        }
        else {
            throw new \InvalidArgumentException("needle must be a string");
        }
        return $ret;
    }


    /**
     * Takes an array of needles, and returns the position (absolute) of the first needle found.
     * Or false, if no needle was found.
     *
     * @return false|int
     */
    public static function strposMultiple($haystack, array $needles, $pos = 0, &$matchingNeedle = null)
    {
        $ret = false;

        $sub = mb_substr($haystack, $pos);

        // we are going to compare the position of the different symbols
        $positions = [];
        foreach ($needles as $needle) {
            if (false !== $nPos = mb_strpos($sub, $needle)) {
                $positions[] = [$nPos, $needle];
            }
        }
        if ($positions) {
            foreach ($positions as $info) {
                list($nPos, $needle) = $info;
                if (
                    false === $ret ||
                    (false !== $ret && $nPos < $ret)
                ) {
                    $ret = $nPos;
                    $matchingNeedle = $needle;
                }
            }
        }
        if (false !== $ret) {
            $ret += $pos;
        }
        return $ret;
    }


    //------------------------------------------------------------------------------/
    //
    //------------------------------------------------------------------------------/
    private static function _strOccPos($haystack, $needle, $occurrence = 1, $lastOccurrenceStays = false, $isForward = true)
    {
        $ret = false;
        if (is_string($haystack) || is_numeric($haystack)) {
            $haystack = (string)$haystack;
            if (is_string($needle) || is_numeric($needle)) {
                $needle = (string)$needle;
                if ('' !== $needle) {
                    if (preg_match_all('!' . preg_quote($needle, '!') . '!m', $haystack, $m, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE)) {
                        $occurrence = (int)$occurrence;
                        if ($occurrence >= 1) {
                            if (false === $isForward) {
                                $m[0] = array_reverse($m[0]);
                            }
                            $n = $occurrence - 1;
                            if (array_key_exists($n, $m[0])) {
                                $ret = $m[0][$n][1];
                            }
                            elseif (true === $lastOccurrenceStays) {
                                if (true === $isForward) {
                                    $ret = $m[0][count($m[0]) - 1][1];
                                }
                                else {
                                    $ret = $m[0][0][1];
                                }
                            }
                        }
                        else {
                            throw new \InvalidArgumentException("Occurrence must be a positive integer");
                        }
                    }
                }
            }
            else {
                throw new \InvalidArgumentException("needle must be a string");
            }
        }
        else {
            throw new \InvalidArgumentException("haystack must be a string");
        }
        return $ret;
    }


}
