<?php

namespace Tiphaine;

/*
 * LingTalfi 2015-11-11
 */
class TiphaineTool {

    
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

}
