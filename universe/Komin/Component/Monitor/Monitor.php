<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Monitor;


/**
 * Monitor
 * @author Lingtalfi
 * 2015-05-07
 *
 */
class Monitor implements MonitorInterface
{

    protected $autoNewLine;


    public function __construct()
    {
        // keep me alive   
        $this->autoNewLine = true;
    }



    //------------------------------------------------------------------------------/
    // IMPLEMENTS MonitorInterface
    //------------------------------------------------------------------------------/
    public function say($msg, $tags = null)
    {
        if (true === $this->autoNewLine) {
            $msg .= PHP_EOL;
        }
        echo $this->getFormattedMessage($msg, $tags);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function getFormattedMessage($msg, $tags = null)
    {
        return $msg;
    }
}
