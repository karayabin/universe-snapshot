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
 * ExceptionTool
 * @author Lingtalfi
 * 2015-07-03
 * 
 */
class ExceptionTool {

    public static function toString(\Exception $e){
        $s = '';
//        $s .= $e->getMessage() . PHP_EOL;
        $s .= sprintf("Exception: %s, file: %s, line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
                
                ) . PHP_EOL;
        $s .= $e->getTraceAsString();
        $s .= PHP_EOL;
        return $s;
    }
}
