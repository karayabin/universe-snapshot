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

use BeeFramework\Bat\VarTool;
use BeeFramework\Component\Log\SimpleLogger\SimpleLogger;
use BeeFramework\Component\Log\SimpleLogger\SimpleLoggerInterface;


/**
 * LoggerTrait
 * @author Lingtalfi
 * 2015-05-05
 *
 */
trait LoggerTrait
{


    /**
     * @var SimpleLoggerInterface
     */
    private $logger;


    /**
     * @return SimpleLoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    public function setLogger(SimpleLoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }


    protected function log($msg, $tags = null, array $variables = null)
    {
        if (is_array($variables)) {
            array_walk($variables, function (&$v) {
                $v = VarTool::toString($v, ['details' => true]);
            });
        }
        $this->_getLogger()->log($msg, $tags);
    }


    /**
     * Source log, adds the caller method as a tag.
     * 
     *      The caller might look like this, depending on if the caller method is static or not:
     *          className->methodName
     *
     */
    protected function slog($msg, $tags = null, array $variables = null)
    {
        if (null === $tags) {
            $tags = [];
        }
        elseif (!is_array($tags)) {
            $tags = [$tags];
        }

        $last = debug_backtrace(false)[1];
        if (array_key_exists('class', $last)) {
            $tags[] = $last['class'] . $last['type'] . $last['function'];
        }

        $this->log($msg, $tags, $variables);
    }


    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    /**
     * @return SimpleLoggerInterface
     */
    private function _getLogger()
    {
        if (null === $this->logger) {
            $this->logger = new SimpleLogger();
        }
        return $this->logger;
    }


}
