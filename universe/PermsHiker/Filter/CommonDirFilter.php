<?php

namespace PermsHiker\Filter;

use PermsHiker\Tool\PermsHikerTool;


/*
 * LingTalfi 2016-06-22
 */

class CommonDirFilter implements PermsHikerFilterInterface
{

    public static function create()
    {
        return new static();
    }

    public function filter($s)
    {
        if ($s) {
            $lines = explode(PHP_EOL, $s);
            $ret = [];

            //------------------------------------------------------------------------------/
            // SUM
            //------------------------------------------------------------------------------/
            $lastPath = null;
            foreach ($lines as $line) {
                if ($line) {


                    list($mode, $ownerGroup, $owner, $path) = PermsHikerTool::pullDataFromPermsMapEntry($line);
                    $score = 0;


                    $perms = $owner . ":" . $ownerGroup . ":" . $mode;

                    if (null !== $lastPath) {
                        // is it a children of the previous line?
                        if (false !== strpos($path, $lastPath . '/')) {
                            // is it different (perms) than parent?
                            $parentPerms = $ret[$lastPath][1];
                            if ($perms !== $parentPerms) {
                                $this->bubbleUp($path, $ret);
                            }
                        }


                    }
                    else {
                        // it's the first line, nothing special...
                    }


                    $ret[$path] = [$score, $perms];
                    $lastPath = $path;
                }
            }

            //------------------------------------------------------------------------------/
            // REWRITE
            //------------------------------------------------------------------------------/
            $finalRet = [];
            $curGroup = null;
            foreach ($ret as $path => $lineInfo) {

                /**
                 * A potential group was detected during the last iteration,
                 * so now, we can skip all the children of that group
                 */
                if (null !== $curGroup && 0 === strpos($path, $curGroup . '/')) {
                    continue;
                }


                // is it a potential group?
                if (0 === $lineInfo[0]) {
                    $curGroup = $path;
                }
                else {
                    // it's just a regular entry
                    $curGroup = null;
                }
                $finalRet[] = $path . ':' . $lineInfo[1];
            }
            $s = implode(PHP_EOL, $finalRet);
        }
        return $s;
    }


    /**
     * @param string , path to a permsmap.
     * @return string|false, the content of the filtered file, or false if the file couldn't be read.
     */
    public function filterFile($path)
    {
        if (is_readable($path) && is_writable($path)) {
            $content = file_get_contents($path);
            return $this->filter($content);
        }
        return false;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    private function bubbleUp($path, array &$paths)
    {
        $p = array_filter(explode('/', $path));

        while (array_pop($p)) {
            $parent = implode('/', $p);
            if ($parent && '.' !== $parent && array_key_exists($parent, $paths)) {
                $paths[$parent][0]++;
            }
        }
    }
}
