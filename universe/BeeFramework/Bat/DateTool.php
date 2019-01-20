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
 * DateTool
 * @author Lingtalfi
 * 2014-11-02
 *
 */
class DateTool
{

    public static function getIso8601Date()
    {
        $datetime = new \DateTime();
        return $datetime->format(\DateTime::ISO8601);
    }

    public static function getY4mdDate()
    {
        $datetime = new \DateTime();
        return $datetime->format('Y-m-d');
    }

    public static function getY4mdDateTime($variant = null)
    {
        $datetime = new \DateTime();
        $fmt = 'Y-m-d H:i:s';
        if ('file' === $variant) {
            $fmt = 'Y-m-d__H-i-s';
        }
        return $datetime->format($fmt);
    }


}
