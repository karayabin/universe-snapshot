<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SimpleLogger;

use BeeFramework\Component\Log\SimpleLogger\Listener\DebugLoggerListener;


/**
 * DebugSimpleLogger
 * @author Lingtalfi
 * 2015-05-05
 *
 */
class DebugSimpleLogger extends SimpleLogger
{


    public function __construct($cr = "\n")
    {
        parent::__construct();
        $this->addListener(new DebugLoggerListener($cr));
    }


}
