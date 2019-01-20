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
 * UrlTool
 * @author Lingtalfi
 *
 *
 */
class UrlTool
{


    public static function buildPathAndQueryString(array $params=[])
    {
        list($url, $p) = self::getPathAndQueryArgs();
        $p = array_replace($p, $params);
        if ($p) {
            return $url . '?' . http_build_query($p);
        }
        return $url;
    }

    public static function getPathAndQueryArgs(){
        $path = $_SERVER['REQUEST_URI'];
        $args = [];
        if (false !== $pos = strpos($path, '?')) {
            $queryString = substr($path, $pos + 1);
            $path = substr($path, 0, $pos);
            parse_str($queryString, $args);
        }
        return [$path, $args];
    }

}
