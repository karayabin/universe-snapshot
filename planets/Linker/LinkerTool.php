<?php

namespace Linker;

/*
 * LingTalfi 2016-03-24
 */
use Linker\Parser\LinkerParser;

class LinkerTool
{

    public static function checkByFile(string $file, array $vars = [])
    {
        $parser = new LinkerParser();
        $links = $parser->parse($file, $vars);
        self::checkLinks($links);
    }



    //------------------------------------------------------------------------------/
    // MAYBE SHOULD BE PROTECTED
    //------------------------------------------------------------------------------/
    /**
     * @param array <link>s
     *
     *  Each <link> is an array containing:
     *
     *          - 0: the link (resolved)
     *          - 1: the target (resolved)
     *
     */
    public static function checkLinks(array $links)
    {
        foreach ($links as $line) {
            list($link, $target) = $line;

            $recreate = false;

            if (is_link($link)) {
                $_target = readlink($link);
                if ($_target !== $target) {
                    $recreate = true;
                }
            }
            else {
                $recreate = true;
            }

            if (true === $recreate) {
                if (is_link($link)) {
                    unlink($link);
                }
                symlink($target, $link);
            }
        }
    }

}
