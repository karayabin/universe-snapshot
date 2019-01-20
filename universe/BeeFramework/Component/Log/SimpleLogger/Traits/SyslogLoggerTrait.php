<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SimpleLogger\Traits;

use BeeFramework\Component\Log\SimpleLogger\SimpleLogger;
use BeeFramework\Component\Log\SimpleLogger\SimpleLoggerInterface;


/**
 * LoggerTrait
 * @author Lingtalfi
 * 2015-05-05
 *
 * Based on http://en.wikipedia.org/wiki/Syslog
 *
 *
 */
trait SyslogLoggerTrait
{
    use LoggerTrait;

    public function emergency($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "emergency", $variables);
    }

    public function alert($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "alert", $variables);
    }

    public function critical($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "critical", $variables);
    }

    public function error($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "error", $variables);
    }

    public function warning($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "warning", $variables);
    }

    public function notice($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "notice", $variables);
    }

    public function info($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "info", $variables);
    }

    public function debug($msg, array $variables = null)
    {
        $this->_getLogger()->log($msg, "debug", $variables);
    }


}
