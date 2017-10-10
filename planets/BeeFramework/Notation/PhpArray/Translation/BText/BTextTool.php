<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Notation\PhpArray\Translation\BText;

use BeeFramework\Bat\FileSystemTool;


/**
 * BTextTool
 * @author Lingtalfi
 * 2014-10-21
 *
 * <root>
 *      <_>
 *          <m>Oops, an error occurred.</m>
 *          <_>Oops, an error occurred.</_>
 *      </_>
 * </root>
 *
 *
 */
class BTextTool
{

    public static function parseFile($file)
    {
        $ret = [];
        $handle = fopen($file, "r");
        if ($handle) {

            // item will hold the id, and at
            // least one plural form (the singular form, referenced as 0)
            $item = [];
            $multi = false;
            $n = null;
            $c = ''; // multi content

            while (($line = fgets($handle)) !== false) {

                $trim = rtrim($line);


                if ('[m]:' === substr($trim, 0, 4)) {

                    // before entering new plural form, let's
                    // register the previous one if any
                    if (true === $multi && '' !== $c) {
                        $item[] = trim($c);
                        $c = '';
                    }

                    // new item, register last item if valid
                    if (count($item) > 1) {
                        $ret[] = $item;
                        $item = [];
                    }

                    // is it a one line syntax or multiple line?
                    $tail = trim(substr($line, 4));
                    if ('' !== $tail) {
                        $item['m'] = $tail;
                        $multi = false;
                    }
                    else {
                        $multi = true;
                    }
                }
                elseif (
                    '[' === substr($trim, 0, 1) &&
                    2 === strpos($trim, ']:')
                ) {
                    // before entering new plural form, let's
                    // register the previous one if any
                    if (true === $multi && '' !== $c) {
                        if (0 === count($item)) {
                            $item['m'] = trim($c);
                        }
                        else {
                            $item[] = trim($c);
                        }
                        $c = '';
                    }


                    // is it a one line syntax or multiple line?
                    $tail = trim(substr($line, 4));
                    if ('' !== $tail) {
                        $item[] = $tail;
                        $multi = false;
                    }
                    else {
                        $multi = true;
                    }


                }
                else {
                    if (true === $multi) {
                        $c .= $line;
                    }
                }

            }


            // register any multi line content left
            if (true === $multi && '' !== $c) {
                $item[] = trim($c);
            }
            if (count($item) > 1) {
                $ret[] = $item;
            }
            fclose($handle);
        }
        else {
            trigger_error(sprintf("Error opening file %s", $file), \E_USER_WARNING);
        }
        return $ret;
    }


    public static function writeToFile(array $translations, $file)
    {
        $c = '';
        $limit = 70;
        foreach ($translations as $tr) {
            $id = 'm';
            if (is_array($tr) && count($tr) > 1) {
                while (null !== $msg = array_shift($tr)) {
                    if (strlen($msg) < $limit) {
                        $c .= '[' . $id . ']: ' . $msg;
                    }
                    else {
                        $c .= '[' . $id . ']:' . PHP_EOL . $msg;
                    }
                    $c .= PHP_EOL;
                    if ('m' === $id) {
                        $id = 0;
                    }
                    else {
                        $id++;
                    }
                }
                $c .= PHP_EOL;

            }
        }
        FileSystemTool::filePutContents($file, $c);
    }

}
