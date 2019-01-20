<?php


namespace Updf\Util;


class UpdfUtil
{


    /**
     * @return string, the string to use inside an html <img> tag's src attribute
     */
    public static function getImgSrc($path)
    {
        $ext = substr($path, strpos($path, '.') + 1);
        return 'data:image/' . $ext . ';base64,' . base64_encode(file_get_contents($path));
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Converts a CamelCase word into a snake_case word.
     *
     * For instance MyClass becomes my_class.
     */
    public static function camelToSuperSnake($camelString)
    {
        return preg_replace_callback('!([A-Z])!', function ($m) {
            return '_' . strtolower($m[1]);
        }, lcfirst(substr($camelString, 0, -5))); // -5: strip out Model suffix
    }
}