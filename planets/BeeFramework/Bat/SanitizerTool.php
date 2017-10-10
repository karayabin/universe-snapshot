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
 * SanitizerTool
 * @author Lingtalfi
 * 2014-08-13
 *
 */
class SanitizerTool
{


    public static function sanitizeHtmlAttributeValue($string)
    {
        $string = self::removeAccents($string);
        // blanks to underscore
        $string = str_replace(array(' ', "\t"), '_', $string);
        // remove weird chars
        $string = preg_replace('![^a-zA-Z0-9_]!', '', $string);
        // converts multiple underscores to one single underscore
        $string = preg_replace('!_+!', '_', $string);
        return $string;
    }

    public static function sanitizeFileName($string)
    {
        $string = self::removeAccents($string);
        // blanks to underscore
        $string = str_replace(array(' ', "\t"), '-', $string);
        // replace weird chars with dashes.
        // The motivation was to preserve the distance created
        // by a space or a dot with a dash
        $string = preg_replace('![^a-zA-Z0-9-_.]!', '-', $string);
        // converts multiple underscores to one single underscore
        $string = preg_replace('!-+!', '-', $string);
        return $string;
    }

    public static function sanitizeUrl($string)
    {
        $string = self::removeAccents($string);
        // blanks to underscore
        $string = str_replace(array(' ', "\t"), '-', $string);
        // remove weird chars
        $string = preg_replace('![^a-zA-Z0-9-_]!', '', $string);
        // converts multiple underscores to one single underscore
        $string = preg_replace('!-+!', '-', $string);
        return $string;
    }

    public static function sanitizeVariableName($string, $extraAllowedChars = '')
    {
        $string = self::removeAccents($string);
        // blanks to underscore
        $string = str_replace(array(' ', "\t"), '_', $string);
        // remove weird chars
        $chars = 'a-zA-Z0-9_';
        $chars .= $extraAllowedChars;
        $string = preg_replace('![^' . $chars . ']!', '', $string);
        // converts multiple underscores to one single underscore
        $string = preg_replace('!_+!', '_', $string);
        return $string;
    }

    public static function removeAccents($string)
    {
        return strtr($string, [
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ý' => 'y',
            'ÿ' => 'y',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Ÿ' => 'Y',
        ]);
    }


    /**
     * This method only removes dot (.) and double dot (..) components of a path.
     *
     *
     * You might want to use it when the path (or some part of it) you're working with
     * comes from an external user.
     * Alternatively, if the file is supposed to exist, you should use the Bat/FileTool::existsUnder
     * method, which is more secure (relies on realpath).
     *
     *
     */
    public static function removeDotDirectoriesFromPath($path)
    {
        return str_replace([
            '/./',
            '/../',
        ], '/', $path);
    }

}
