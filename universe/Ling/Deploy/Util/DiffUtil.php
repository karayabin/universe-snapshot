<?php


namespace Ling\Deploy\Util;


/**
 * The DiffUtil class.
 */
class DiffUtil
{


    /**
     * Compares the two maps which paths are given, and returns a diff map array.
     * The structure of the diff map array is the following:
     *
     * - add: []       # list of files existing in source, not in dest
     * - remove: []    # list of files existing in dest, not in source
     * - replace: []   # list of files existing in both source and dest, but their hash_id is different
     *
     *
     * To make the destination a clone of the source, you would need to:
     *
     * - remove the files listed in "remove" from the destination
     * - copy (with overwriting) the files listed in "add" and "replace" from the source to the destination
     *
     *
     * @param string $mapPathSource
     * @param string $mapPathDest
     * @param array $options
     * - ignoreName: list of file/directory names to ignore
     * - ignorePath: list of file/directory relative paths to ignore
     *
     *
     * @return array
     */
    public function getDiffMap(string $mapPathSource, string $mapPathDest, array $options = [])
    {
        $ignoreName = $options['ignoreName'] ?? [];
        $ignorePath = $options['ignorePath'] ?? [];
        $linesSource = file($mapPathSource, \FILE_IGNORE_NEW_LINES);
        $linesDest = file($mapPathDest, \FILE_IGNORE_NEW_LINES);


        //--------------------------------------------
        // PREPARE SOURCE AND DEST ARRAYS
        //--------------------------------------------
        $source = [];
        $dest = [];
        foreach ($linesSource as $line) {
            $p = explode("::", $line, 2);
            $source[$p[0]] = $p[1];
        }
        foreach ($linesDest as $line) {
            $p = explode("::", $line, 2);
            $dest[$p[0]] = $p[1];
        }


        //--------------------------------------------
        // NOW PARSING ARRAYS
        //--------------------------------------------
        $add = [];
        $remove = [];
        $replace = [];


        //--------------------------------------------
        // ADD & REPLACE
        //--------------------------------------------
        foreach ($source as $rpath => $hashId) {
            if (false === in_array($rpath, $ignorePath)) {
                $base = basename($rpath);
                if (false === in_array($base, $ignoreName)) {

                    if (false === array_key_exists($rpath, $dest)) {
                        $add[] = $rpath;
                    } else {
                        if ($hashId !== $dest[$rpath]) {
                            $replace[] = $rpath;
                        }
                    }
                }
            }
        }

        //--------------------------------------------
        // REMOVE
        //--------------------------------------------
        foreach ($dest as $rpath => $hashId) {
            if (false === in_array($rpath, $ignorePath)) {
                $base = basename($rpath);
                if (false === in_array($base, $ignoreName)) {
                    if (false === array_key_exists($rpath, $source)) {
                        $remove[] = $rpath;
                    }
                }
            }
        }


        return [
            "add" => $add,
            "remove" => $remove,
            "replace" => $replace,
        ];
    }
}