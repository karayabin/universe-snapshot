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
 * VoidMonitor
 * @author Lingtalfi
 * 2015-05-13
 *
 */
class VoidMonitor implements MonitorInterface
{


    //------------------------------------------------------------------------------/
    // IMPLEMENTS MonitorInterface
    //------------------------------------------------------------------------------/
    public function say($msg, $tags = null)
    {
    }


}
