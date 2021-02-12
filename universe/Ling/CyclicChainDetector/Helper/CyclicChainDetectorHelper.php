<?php


namespace Ling\CyclicChainDetector\Helper;

use Ling\Bat\CurrentProcessTool;
use Ling\CyclicChainDetector\CyclicChainDetectorUtil;
use Ling\CyclicChainDetector\Link;

/**
 * The CyclicChainDetectorHelper class.
 */
class CyclicChainDetectorHelper
{


    /**
     * Prints a human readable version of the links contained in the given chain.
     *
     * @param CyclicChainDetectorUtil $util
     */
    public static function debugLinks(CyclicChainDetectorUtil $util)
    {


        $br = (true === CurrentProcessTool::isCli()) ? PHP_EOL : '<br>';

        echo "*****" . $br;


        $links = $util->getLinks();
        foreach ($links as $link) {
            self::debugLink($link, 0, $br);
        }
    }


    /**
     *
     * Prints a human readable version of the given link.
     *
     *
     * @param Link $link
     * @param int $indent
     * @param string $br
     */
    private static function debugLink(Link $link, int $indent = 0, string $br = PHP_EOL)
    {

        echo str_repeat("----", $indent) . ' ';
        echo $link->name . $br;

        $deps = $link->getDependencies();
        if ($deps) {
            $indent++;
            foreach ($deps as $dep) {
                self::debugLink($dep, $indent, $br);
            }
        }
    }


    /**
     * Returns the source names, recursively, from the given link up to the original link.
     *
     * This method returns an array of links name.
     *
     * @param Link $link
     * @return array
     */
    public static function getSourceNamesByLink(Link $link): array
    {
        $ret = [];
        while (null !== ($source = $link->getSource())) {
            $link = $source;
            $ret[] = $link->name;
        }
        return $ret;
    }


    /**
     * Returns a human readable version of the chain the given link was found in, from the source down to the link (but not further down).
     *
     * @param Link $link
     * @return string
     *
     */
    public static function getPathAsString(Link $link): string
    {
        $symbol = ' -> ';
        $s = '';
        $sources = self::getSourceNamesByLink($link);
        $sources = array_reverse($sources);
        foreach ($sources as $source) {
            $s .= $source;
            $s .= $symbol;
        }
        $s .= $link->name;
        return $s;
    }


    /**
     * Applies the given callable to the given link and every dependency found in it.
     *
     * The callable's sole argument is a link.
     *
     *
     * @param Link $link
     * @param callable $fn
     */
    public static function each(Link $link, callable $fn)
    {
        call_user_func($fn, $link);
        $deps = $link->getDependencies();
        foreach ($deps as $dep) {
            self::each($dep, $fn);
        }
    }

}