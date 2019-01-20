<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SimpleLogger\Listener;


/**
 * DebugLoggerListener
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class DebugLoggerListener implements LoggerListenerInterface
{

    protected $cr;

    public function __construct($cr = null)
    {
        if (null === $cr) {
            $cr = "\n";
        }
        $this->cr = $cr;
    }




    //------------------------------------------------------------------------------/
    // IMPLEMENTS LoggerListenerInterface
    //------------------------------------------------------------------------------/
    public function listen($msg, array $tags)
    {
        $prefix = '';
        if ($tags) {
            $prefix = implode('.', $tags) . ': ';
        }
        echo $prefix . $msg . $this->cr;
    }
}
