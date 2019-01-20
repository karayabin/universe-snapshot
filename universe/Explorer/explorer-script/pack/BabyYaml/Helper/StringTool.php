<?php


namespace BabyYaml\Helper;


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
        } elseif ('true' === $string) {
            $r = true;
        } elseif ('false' === $string) {
            $r = false;
        } else {
            $trim = trim($string);
            if (is_numeric($trim)) {
                if (false === strpos($trim, '.')) {
                    $r = (int)$trim;
                } else {
                    $r = (float)$trim;
                }
            } else {
                $r = $string;
            }
        }
        return $r;
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
            } else {
                break;
            }
        }
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
        } else {
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

    public static function boolNullToString($mixed)
    {
        if (null === $mixed) {
            $mixed = 'null';
        } elseif (false === $mixed) {
            $mixed = 'false';
        } elseif (true === $mixed) {
            $mixed = 'true';
        }
        return $mixed;
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




    public static function namespaceBaseName($string)
    {
        if (false !== $pos = strrpos($string, '\\')) {
            $string = substr($string, $pos + 1);
        }
        return $string;
    }
}