<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Komin\Component\Log\ProcessLogger;

use BeeFramework\Bat\StringTool;
use Komin\Notation\String\MiniMl\Tool\MiniMlTool;


/**
 * DisplayProcessLogger
 * @author Lingtalfi
 * 2015-05-21
 *
 */
class DisplayProcessLogger extends ProcessLogger
{
    private $logLevels;

    public function __construct()
    {
        parent::__construct();
        $this->setListener(function ($level, $message, array $context, &$stopPropagation = false) {
            $this->wrapMessage($level, $message);
            echo MiniMlTool::format($message);
        });
        $this->logLevels = [
            'debug',
            'notice',
            'warning',
            'error',
            'critical',
            'success',
        ];
    }


    private function wrapMessage($level, &$msg)
    {
        if (in_array($level, $this->logLevels)) {
            $msg = '<' . $level . '>' . $msg . '</' . $level . '>';
        }
    }


}
