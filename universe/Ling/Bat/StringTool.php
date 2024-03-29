<?php

namespace Ling\Bat;

use Ling\Tiphaine\TiphaineTool;


/**
 * The StringTool class.
 * LingTalfi 2015-10-14
 */
class StringTool
{
    private static $irregular = [
        'woman' => 'women',
        'man' => 'men',
        'child' => 'children',
        'tooth' => 'teeth',
        'foot' => 'feet',
        'person' => 'people',
        'leaf' => 'leaves',
        'mouse' => 'mice',
        'goose' => 'geese',
        'half' => 'halves',
        'knife' => 'knives',
        'wife' => 'wives',
        'life' => 'lives',
        'elf' => 'elves',
        'loaf' => 'loaves',
        'potato' => 'potatoes',
        'tomato' => 'tomatoes',
        'cactus' => 'cacti',
        'focus' => 'foci',
        'fungus' => 'fungi',
        'nucleus' => 'nuclei',
        'syllabus' => 'syllabi',
        'analysis' => 'analyses',
        'diagnosis' => 'diagnoses',
        'oasis' => 'oases',
        'thesis' => 'theses',
        'crisis' => 'crises',
        'phenomenon' => 'phenomena',
        'criterion' => 'criteria',
        'datum' => 'data',
    ];


    public static function autoCast($string)
    {
        return TiphaineTool::autoCast($string);
    }


    /**
     * Nomenclature from
     * https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md
     */
    public static function camelCase2Constant($str)
    {
        return CaseTool::camel2Constant($str);
    }


    /**
     * Returns the number of capitals in the given string.
     *
     * https://stackoverflow.com/questions/1557975/simplest-shortest-way-to-count-capital-letters-in-a-string-with-php
     *
     *
     * @param string $s
     * @return int
     */
    public static function countCapitals(string $s): int
    {
        return mb_strlen(preg_replace('![^A-Z]+!', '', $s));
    }


    /**
     * Returns a subset of the given string, which doesn't cut a word in half, and which length is the closest to the given maxNbChars without being higher.
     *
     * In addition to that, the ending string is added only if the str length is greater than the given maxNbChars limit.
     *
     * The "more" flag is raised to true if that's the case.
     *
     * The given string preferably shouldn't contain any PHP_EOL chars.
     *
     * @param string $str
     * @param int $maxNbChars
     * @return string
     */
    public static function cutAtWordBoundary(string $str, int $maxNbChars = 250, string $ending = "...", bool &$more = false): string
    {
        $s = wordwrap(str_replace(PHP_EOL, ' ', $str), $maxNbChars, PHP_EOL);

        $ret = explode(PHP_EOL, $s, 2)[0];
        if (mb_strlen($str) > $maxNbChars) {
            $ret .= $ending;
            $more = true;
        }
        return $ret;
    }

    /**
     * Take a string, and return an array containing two entries:
     *
     * - the string without the numerical suffix
     * - the numerical suffix or false if the last chars are not numerical
     *
     * For instance,
     *      hello68 => [hello, 68]
     *      hello => [hello, false]
     *      hello-78.79 => [hello78., 79]
     *      123 => ["", 123]
     *
     *
     */
    public static function cutNumericalSuffix($str)
    {
        $suffix = false;
        if (preg_match('!^(.*)([0-9]+)$!U', $str, $m)) {
            $str = $m[1];
            $suffix = (int)$m[2];
        }
        return [$str, $suffix];
    }


    /**
     * Returns a unique identifier, based on the given one.
     *
     * If you provide an identifier of:
     *
     * - abc
     *
     * Then the duplicated entries will look like this:
     *
     * - abc copy
     * - abc copy 2
     * - abc copy 3
     * - ...
     *
     *
     *
     * The given callable makes sure than the new identifier does not exist.
     * It takes the tested identifier as the input, and returns whether that identifier exists or not.
     * If not, then it's returned as the chosen identifier.
     *
     *
     *
     *
     * @param string $identifier
     * @param callable $doesItStillExist
     * @return string
     */
    public static function getUniqueDuplicatedName(string $identifier, callable $doesItStillExist): string
    {
        while (true) {

            if (preg_match('!^(.+) copy( [0-9]+)?$!', $identifier, $matches)) {
                if (2 === count($matches)) {
                    // was duplicated only once
                    $identifier .= " 2";
                } else {
                    // was duplicated more than once
                    $int = (int)$matches[2];
                    $int++;
                    $p = explode(" ", $identifier);
                    array_pop($p);
                    $identifier = implode(" ", $p) . " " . $int;
                }
            } else {
                // was never duplicated before
                $identifier .= " copy";
            }


            if (false === $doesItStillExist($identifier)) {
                break;
            }
        }
        return $identifier;
    }


    /**
     * Returns a symbolic path, where the given absolute path to the application directory is replaced by the symbol [app].
     *
     * @param string $path
     * @param string $appDir
     * @return string
     */
    public static function getSymbolicPath(string $path, string $appDir): string
    {
        $p = explode($appDir, $path, 2);
        if (2 === count($p)) {
            return '[app]' . array_pop($p);
        }
        return $path;
    }


    /**
     * Returns whether the given haystack string ends with the given needle string.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function endsWith(string $haystack, string $needle): bool
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }


    /**
     * Returns whether the given haystack string starts with the given needle string.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function startsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);
        return substr($haystack, 0, $length) === $needle;
    }


    /**
     * Returns a more compact version of the given string.
     * More compact means:
     * - trimmed
     * - consecutive whitespaces are reduced to one space
     *
     *
     * @param string $str
     * @return string
     */
    public static function getCompactString(string $str): string
    {
        return trim(preg_replace('!\s+!', ' ', $str));
    }

    /**
     * Stolen from OrmToolsHelper (OrmTools planet)
     */
    public static function getPlural($word)
    {

        /**
         * http://www.ef.com/english-resources/english-grammar/singular-and-plural-nouns/
         */

        if (array_key_exists($word, self::$irregular)) {
            return self::$irregular[$word];
        }

        $lastLetter = substr($word, -1);
        switch ($lastLetter) {
            case "y":
                $word = substr($word, 0, -1) . 'ies';
                break;
            case "s":
            case "x":
            case "z":
                $word .= 'es';
                break;
            default:
                $lastTwoLetters = substr($word, -2);
                switch ($lastTwoLetters) {
                    case "ch":
                    case "sh":
                        $word .= 'es';
                        break;
                    default:
                        $word .= "s";
                        break;
                }
                break;
        }

        return $word;
    }


    public static function getUniqueCssId($prefix = "a")
    {
        return $prefix . md5(uniqid($prefix, true));
    }

    /**
     * Returns an html attributes string based on the given array.
     * Support arguments with just value, like checked for example.
     *
     * Also, if an argument value is null, it is omitted;
     * this behaviour might be useful in this case where we define default attributes values,
     * then the client can unset them by setting a null value.
     *
     *
     * The $keyPrefix allows us to prefix with "data-" for instance.
     *
     */
    public static function htmlAttributes(array $attributes, $keyPrefix = "")
    {
        $s = '';
        foreach ($attributes as $k => $v) {
            if (is_numeric($k)) {
                $s .= ' ';
                $s .= htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
            } else {
                if (null !== $v) {
                    $s .= ' ';
                    $s .= $keyPrefix . htmlspecialchars($k, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars($v, ENT_QUOTES, 'UTF-8') . '"';
                }
            }
        }
        return $s;
    }


    /**
     * Returns a humanized version of a file name.
     *
     *
     * Basically, the file extension (if any) is dropped, and then dashes, underscores and dots are
     * converted into spaces, and all words are turned down to lowercase.
     *
     *
     * @param string $fileName
     * @param bool $firstLetterUppercase
     * @return string
     */
    public static function humanizeFileName(string $fileName, bool $firstLetterUppercase = false): string
    {
        $fileName = FileSystemTool::removeExtension($fileName);
        $s = strtolower(preg_replace('![-._\s]+!', ' ', $fileName));
        if (true === $firstLetterUppercase) {
            $s = ucfirst($s);
        }
        return $s;
    }


    /**
     * Returns a string based on the proposition, which is not found in the given pool.
     * The returned string has the following format:
     *
     * - {baseString} {separator} {numericalValue}
     *
     * We can search against the keys of the pool (useKey=true), or against the values of the pool (useKey=false).
     *
     * The baseString shouldn't contain the separator, otherwise results are unpredictable.
     *
     * See examples in the documentation.
     *
     *
     *
     * @param string $proposition
     * @param array $pool
     * @param string $separator
     * @param bool $useKey
     * @return string
     */
    public static function incrementNumericalSuffix(string $proposition, array $pool, $useKey = false, $separator = "__"): string
    {
        $function = (false === $useKey) ? 'in_array' : 'array_key_exists';

        if (true === $function($proposition, $pool)) {
            // make sure proposition has the baseString-separator-numericalValue format
            $p = explode($separator, $proposition, 2);
            if (1 === count($p)) {
                $proposition .= $separator . "1";
            }

            while (true === $function($proposition, $pool)) {
                $p = explode($separator, $proposition, 2);
                $num = (int)$p[1];
                $num++;
                $proposition = $p[0] . $separator . $num;
            }
        }

        return $proposition;
    }


    /**
     * Returns the given $string, but indented with the $indentNumber spaces for every line.
     *
     * @param string $string
     * @param int $indentNumber
     * @return string
     */
    public static function indent(string $string, int $indentNumber)
    {
        $indent = str_repeat(" ", $indentNumber);
        return $indent . str_replace(PHP_EOL, PHP_EOL . $indent, $string);
    }


//    /**
//     * Returns whether the two given strings are identical.
//     *
//     * https://stackoverflow.com/questions/3643135/two-identical-strings-yet-different-lengths-trimmed-cleansed-etc
//     *
//     *
//     * @param string $a
//     * @param string $b
//     * @return bool
//     */
//    public static function isIdentical(string $a, string $b): bool
//    {
//        return (bin2hex($a) === bin2hex($b));
//    }

    /**
     * Returns whether the given value can be turned into a string.
     *
     * https://stackoverflow.com/questions/5496656/check-if-item-can-be-converted-to-string
     *
     *
     * @param mixed $value
     * @return bool
     */
    public static function isStringable($value): bool
    {
        if (is_object($value) && method_exists($value, '__toString')) {
            return true;
        }
        if (is_null($value)) {
            return true;
        }
        return is_scalar($value);

    }


    /**
     * Drop the absoluteBaseDir string in front of the absolutePath.
     *
     * If it's not in front, the returned value depends on the default parameter:
     *  - if default is null, the absolutePath is returned
     *  - else default is returned
     *
     *
     *
     * @param $absoluteBaseDir , absolute path to the base dir containing the absolutePath
     * @param $absolutePath , absolute path to a resource
     * @return string|mixed, a relative path, starting with a slash (at least on linux,
     *          it will probably NOT WORK on windows),
     *          or the $default parameter value otherwise.
     */
    public static function relativePath($absoluteBaseDir, $absolutePath, $default = null)
    {
        if (0 === strpos($absolutePath, $absoluteBaseDir)) {
            $p = explode($absoluteBaseDir, $absolutePath, 2);
            return array_pop($p);
        }
        if (null === $default) {
            return $absolutePath;
        }
        return $default;
    }

    public static function removeAccents($str)
    {
        static $map = [
            // single letters
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'ą' => 'a',
            'å' => 'a',
            'ā' => 'a',
            'ă' => 'a',
            'ǎ' => 'a',
            'ǻ' => 'a',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Ą' => 'A',
            'Å' => 'A',
            'Ā' => 'A',
            'Ă' => 'A',
            'Ǎ' => 'A',
            'Ǻ' => 'A',


            'ç' => 'c',
            'ć' => 'c',
            'ĉ' => 'c',
            'ċ' => 'c',
            'č' => 'c',
            'Ç' => 'C',
            'Ć' => 'C',
            'Ĉ' => 'C',
            'Ċ' => 'C',
            'Č' => 'C',

            'ď' => 'd',
            'đ' => 'd',
            'Ð' => 'D',
            'Ď' => 'D',
            'Đ' => 'D',


            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ę' => 'e',
            'ē' => 'e',
            'ĕ' => 'e',
            'ė' => 'e',
            'ě' => 'e',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ę' => 'E',
            'Ē' => 'E',
            'Ĕ' => 'E',
            'Ė' => 'E',
            'Ě' => 'E',

            'ƒ' => 'f',


            'ĝ' => 'g',
            'ğ' => 'g',
            'ġ' => 'g',
            'ģ' => 'g',
            'Ĝ' => 'G',
            'Ğ' => 'G',
            'Ġ' => 'G',
            'Ģ' => 'G',


            'ĥ' => 'h',
            'ħ' => 'h',
            'Ĥ' => 'H',
            'Ħ' => 'H',

            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ĩ' => 'i',
            'ī' => 'i',
            'ĭ' => 'i',
            'į' => 'i',
            'ſ' => 'i',
            'ǐ' => 'i',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ĩ' => 'I',
            'Ī' => 'I',
            'Ĭ' => 'I',
            'Į' => 'I',
            'İ' => 'I',
            'Ǐ' => 'I',

            'ĵ' => 'j',
            'Ĵ' => 'J',

            'ķ' => 'k',
            'Ķ' => 'K',


            'ł' => 'l',
            'ĺ' => 'l',
            'ļ' => 'l',
            'ľ' => 'l',
            'ŀ' => 'l',
            'Ł' => 'L',
            'Ĺ' => 'L',
            'Ļ' => 'L',
            'Ľ' => 'L',
            'Ŀ' => 'L',


            'ñ' => 'n',
            'ń' => 'n',
            'ņ' => 'n',
            'ň' => 'n',
            'ŉ' => 'n',
            'Ñ' => 'N',
            'Ń' => 'N',
            'Ņ' => 'N',
            'Ň' => 'N',

            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ð' => 'o',
            'ø' => 'o',
            'ō' => 'o',
            'ŏ' => 'o',
            'ő' => 'o',
            'ơ' => 'o',
            'ǒ' => 'o',
            'ǿ' => 'o',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ō' => 'O',
            'Ŏ' => 'O',
            'Ő' => 'O',
            'Ơ' => 'O',
            'Ǒ' => 'O',
            'Ǿ' => 'O',


            'ŕ' => 'r',
            'ŗ' => 'r',
            'ř' => 'r',
            'Ŕ' => 'R',
            'Ŗ' => 'R',
            'Ř' => 'R',


            'ś' => 's',
            'š' => 's',
            'ŝ' => 's',
            'ş' => 's',
            'Ś' => 'S',
            'Š' => 'S',
            'Ŝ' => 'S',
            'Ş' => 'S',

            'ţ' => 't',
            'ť' => 't',
            'ŧ' => 't',
            'Ţ' => 'T',
            'Ť' => 'T',
            'Ŧ' => 'T',


            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ũ' => 'u',
            'ū' => 'u',
            'ŭ' => 'u',
            'ů' => 'u',
            'ű' => 'u',
            'ų' => 'u',
            'ư' => 'u',
            'ǔ' => 'u',
            'ǖ' => 'u',
            'ǘ' => 'u',
            'ǚ' => 'u',
            'ǜ' => 'u',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ũ' => 'U',
            'Ū' => 'U',
            'Ŭ' => 'U',
            'Ů' => 'U',
            'Ű' => 'U',
            'Ų' => 'U',
            'Ư' => 'U',
            'Ǔ' => 'U',
            'Ǖ' => 'U',
            'Ǘ' => 'U',
            'Ǚ' => 'U',
            'Ǜ' => 'U',


            'ŵ' => 'w',
            'Ŵ' => 'W',

            'ý' => 'y',
            'ÿ' => 'y',
            'ŷ' => 'y',
            'Ý' => 'Y',
            'Ÿ' => 'Y',
            'Ŷ' => 'Y',

            'ż' => 'z',
            'ź' => 'z',
            'ž' => 'z',
            'Ż' => 'Z',
            'Ź' => 'Z',
            'Ž' => 'Z',


            // accentuated ligatures
            'Ǽ' => 'A',
            'ǽ' => 'a',
        ];
        return strtr($str, $map);
    }


    /**
     * Cuts a portion of a string, and replaces it with a replacement string.
     *
     * @param int $start
     *                  the position where to start the cut.
     *                  If start is bigger than the string's length,
     *                  then the text will be inserted at the end of the string.
     * @param int $length
     *                  the length of the cut
     * @param string $replacement
     *                  the replacement string
     * @return string
     */
    public static function replacePortion($string, $start, $length, $replacement)
    {
        $begin = mb_substr($string, 0, $start);
        $end = mb_substr($string, $start + $length);
        return $begin . $replacement . $end;
    }


    /**
     * Split the given (assumed) string into an array of multi-byte characters.
     * The internal encoding used is the one returned by the php's mb_internal_encoding function.
     *
     * Note: if you have php 7.4+, consider using mb_str_split instead.
     * (this method was written before that time).
     *
     */
    public static function split($string)
    {
        $len = mb_strlen($string);
        $ret = [];
        for ($i = 0; $i < $len; $i++) {
            $ret[] = mb_substr($string, $i, 1);
        }
        return $ret;
    }

    /**
     * Returns an array containing all the positions of $needle in $haystack.
     * A warning E_USER_WARNING is generated if needle is not a string or a number.
     */
    public static function strPosAll($haystack, $needle, $offset = 0)
    {
        $ret = [];
        if (is_string($needle) || is_numeric($needle)) {
            $len = mb_strlen((string)$needle);
            while (false !== $pos = mb_strpos($haystack, $needle, $offset)) {
                $ret[] = $pos;
                $offset = $pos + $len;
            }
        } else {
            trigger_error(sprintf("strPosAll expects needle argument to be string or numeric, %s given", gettype($needle)), E_USER_WARNING);
        }
        return $ret;
    }


    /**
     * Returns a comma separated string version of the given key/value pairs array.
     * Note: by default there is a space after each comma separator.
     *
     * Available options are:
     * - commaSep: string, the expression to use as the comma separator. The default value is a comma followed by a space (, ).
     * - equalSep: string, the expression to use as the equal separator (i.e. between the key and the value). The default value is the equal symbol (=).
     *
     *
     * @param array $keyValuePairs
     * @param array $options
     * @return string
     */
    public static function toCsv(array $keyValuePairs, array $options = []): string
    {
        $equalSep = $options['equalSep'] ?? '=';
        $commaSep = $options['commaSep'] ?? ', ';

        $s = '';
        $x = false;
        foreach ($keyValuePairs as $k => $v) {
            if (true === $x) {
                $s .= $commaSep;
            }
            $s .= $k . $equalSep . $v;
            $x = true;
        }
        return $s;
    }

    /**
     * Returns the truncated version of the given expression.
     *
     * If the expression's length is greater than the given maxLen,
     * we add an ellipsis to it, which defaults to three consecutive dots (...).
     *
     *
     * Note: that the total length of the expression plus the ellipsis will then be maxLen (i.e. and not maxLen + ellipsisLen).
     * That's because the intent of this method was to prepare data for insertion in a database, which has strict limitations.
     *
     * If the length of the ellipsis is greater than the length of the given expression, then the ellipsis is not used at all,
     * and the expression is truncated without suffix.
     *
     *
     * Available options are:
     * - ellipsis: string=null, the ellipsis to use. If null, defaults to three consecutive dots (...)
     *
     *
     * @param string $expr
     * @param int $maxLen
     * @param array $options
     * @return string
     */
    public static function truncate(string $expr, int $maxLen, array $options = []): string
    {
        $len = mb_strlen($expr);
        if ($len > $maxLen) {
            $ellipsis = $options['ellipsis'] ?? '...';
            $elLen = mb_strlen($ellipsis);

            if ($len > $elLen) {
                $maxLen -= $elLen;
                $expr = mb_substr($expr, 0, $maxLen) . $ellipsis;
            } else {
                $expr = mb_substr($expr, 0, $maxLen);
            }


        }
        return $expr;
    }

    public static function ucfirst($string)
    {
        return mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
    }


    /**
     * return the serialized input as an array
     *
     * @param $string string
     * @return array|mixed
     */
    public static function unserializeAsArray($string)
    {
        if (empty($string)) {
            return [];
        }
        $ret = unserialize($string);
        if (empty($ret)) {
            return [];
        }
        return $ret;
    }
}


