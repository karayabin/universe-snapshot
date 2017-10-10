<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ExceptionLogger\Listener\Tool;

use BeeFramework\Bat\ClassTool;
use BeeFramework\Bat\DateTool;


/**
 * ExceptionTagsFormatterTool
 * @author Lingtalfi
 * 2015-05-27
 *
 */
class ExceptionTagsFormatterTool
{


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    public static function formatString($string, \Exception $e)
    {

        $string = str_replace([
            '{date}',
            '{dateTime}',
            '{name}',
            '{message}',
            '{code}',
            '{file}',
            '{line}',
            '{trace}',
            '{eol}',
        ], [
            DateTool::getY4mdDate(),
            DateTool::getY4mdDateTime(),
            ClassTool::getClassShortName($e),
            $e->getMessage(),
            $e->getCode(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString(),
            PHP_EOL,
        ], $string);
        return $string;
    }
}
