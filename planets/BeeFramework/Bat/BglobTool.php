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
 * BglobTool
 * @author Lingtalfi
 * 2015-05-25
 *
 */
class BglobTool
{


    public static function toRegex($glob)
    {
        if (!is_string($glob)) {
            throw new \InvalidArgumentException(sprintf("glob argument must be of type string, %s given", gettype($glob)));
        }
        $regex = $glob;


        /**
         * Extracting ranges to have better readability
         * (and because special chars must not be interpreted inside of ranges).
         *
         *
         * $ranges: array of
         *              index => rangePattern
         */
        $ranges = [];
        $n = 0;
        if (false !== strpos($regex, '[')) {
            $regex = preg_replace_callback('#(?<!\\\)\[((?:\\\\]|[^\]])*)\]#s', function ($match) use (&$ranges, &$n) {
                $inner = $match[1];
                $wrap = true;
                if ('!' === substr($inner, 0, 1) && strlen($inner) > 1) {
                    $inner = '^' . substr($inner, 1);
                }
                elseif ('^' === substr($inner, 0, 1)) {
                    if (1 === strlen($inner)) {
                        $inner = '\^';
                    }
                    else {
                        $inner = '[' . substr($inner, 1) . '^]';
                    }
                    $wrap = false;
                }

                if (true === $wrap) {
                    $inner = '[' . $inner . ']';
                }

                $key = '__bglob_tmp_range_' . $n;

                $ranges[$key] = $inner;
                return $key;

            }, $glob);
        }

        // if a backslash is not followed by a special char, we escape it
        if (false !== strpos($regex, '\\')) {
            $regex = preg_replace('#\\\(?!(\[|\]|\*|\?))#', '\\\$0', $regex);
        }


        // now let's escape symbols that are not part of the glob notation,
        // but part of the php regex notation (the # is added because it will be the regex delimiter)
        $regex = addcslashes($regex, ".{}=!<>:-#()|+^$");


        // and let's not forget that we need to escape the possibly remaining  ]
        // (if the user wrote \[] for instance)
        if (false !== strpos($regex, ']')) {
            $regex = preg_replace('#(?<!\\\)(\]|\[)#', '\\\$1', $regex);
        }


        // now safely apply regexification for the non ranges chars
        $regex = preg_replace_callback('#(?<!\\\)[?*]#', function ($match) {
            if ('?' === $match[0]) {
                return '[\s\S]';
            }
            return '.*';
        }, $regex);


        // then, reinject ranges
        $regex = str_replace(array_keys($ranges), array_values($ranges), $regex);


        return '#^' . $regex . '$#s';

    }


    public static function toRegexNoRange($glob)
    {
        if (!is_string($glob)) {
            throw new \InvalidArgumentException(sprintf("glob argument must be of type string, %s given", gettype($glob)));
        }
        $regex = $glob;


        // if a backslash is not followed by a special char, we escape it
        if (false !== strpos($regex, '\\')) {
            $regex = preg_replace('#\\\(?!(\*|\?))#', '\\\$0', $regex);
        }

        $regex = addcslashes($regex, ".{}[]=!<>:-#()|+^$");
        if (false !== strpos($regex, '*') || false !== strpos($regex, '?')) {
            // now safely apply regexification for the non ranges chars
            $regex = preg_replace_callback('#(?<!\\\)[?*]#', function ($match) {
                if ('?' === $match[0]) {
                    return '[\s\S]';
                }
                return '.*';
            }, $regex);
        }


        return '#^' . $regex . '$#s';
    }

    public static function match($globString, $string)
    {
        $pattern = self::toRegex($globString);
        if (preg_match($pattern, $string)) {
            return true;
        }
        return false;
    }


    public static function matchNoRange($globString, $string)
    {
        $pattern = self::toRegexNoRange($globString);
        if (preg_match($pattern, $string)) {
            return true;
        }
        return false;
    }

}
