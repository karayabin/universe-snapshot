<?php


namespace PhpUploadFileFix;


class PhpUploadFileFixTool
{


    /**
     * Takes the $_FILES super array and flattens it.
     * See README.md for more info.
     *
     * @return array.
     * Note: if you don't provide a valid $_FILES like array, this method
     * returns unpredictable results.
     *
     */
    public static function fixPhpFiles(array $files, $useDot = false)
    {
        $ret = [];
        foreach ($files as $name => $file) {
            $keys = [];
            $newFile = self::fixPhpFile($file, $useDot, $keys);

            if ($keys) {
                if (true === $useDot) {
                    $newName = $name . "." . implode('.', $keys);
                } else {
                    $newName = $name . "[" . implode('][', $keys) . ']';
                }
            } else {
                $newName = $name;
            }
            $ret[$newName] = $newFile;
        }
        return $ret;
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private static function fixPhpFile(array $file, $useDot = false, array &$keys)
    {
        $props = [
            "name",
            "type",
            "tmp_name",
            "error",
            "size",
        ];

        $newFile = [];

        foreach ($props as $prop) {

            $name = $file[$prop];
            if (is_array($name)) {
                $keys = [];

                while (true) {
                    $key = key($name);
                    $val = current($name);
                    $keys[] = $key;
                    if (is_array($val)) {
                        $name = $val;
                    } else {
                        break;
                    }
                }

                $newFile[$prop] = $val;

            } else {
                $newFile[$prop] = $file[$prop];
            }
        }
        return $newFile;
    }

}