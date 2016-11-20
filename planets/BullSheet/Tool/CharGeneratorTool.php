<?php

namespace BullSheet\Tool;

/*
 * LingTalfi 2016-02-10
 */
class CharGeneratorTool
{

    public static function hexa(int $length = 3): string
    {
        $s = '';
        $characters = '0123456789abcdef';
        for ($i = 0; $i < $length; $i++) {
            $s .= $characters[mt_rand(0, 15)];
        }
        return $s;
    }
    
    
    public static function numbers(int $length = 3): string
    {
        $s = '';
        for ($i = 0; $i < $length; $i++) {
            $s .= mt_rand(0, 9);
        }
        return $s;
    }

    public static function letters(int $length = 3): string
    {
        $s = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < $length; $i++) {
            $s .= $characters[mt_rand(0, 51)];
        }
        return $s;
    }

    public static function alphaNumericChars(int $length = 3): string
    {
        $s = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        for ($i = 0; $i < $length; $i++) {
            $s .= $characters[mt_rand(0, 61)];
        }
        return $s;
    }

    public static function wordChars(int $length = 3): string
    {
        $s = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_';
        for ($i = 0; $i < $length; $i++) {
            $s .= $characters[mt_rand(0, 62)];
        }
        return $s;
    }

    public static function asciiChars(int $length = 3): string
    {
        $s = '';
        for ($i = 0; $i < $length; $i++) {
            $s .= chr(mt_rand(32, 126));
        }
        return $s;
    }

}
