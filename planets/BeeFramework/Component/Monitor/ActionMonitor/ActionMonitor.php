<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Monitor\ActionMonitor;

use BeeFramework\Component\Monitor\ActionMonitor\Formatter\ActionMonitorFormatterInterface;
use BeeFramework\Component\Monitor\ActionMonitor\Formatter\HtmlTableActionMonitorFormatter;


/**
 * ActionMonitor
 * @author Lingtalfi
 * 2014-09-02
 *
 */
class ActionMonitor
{

    protected $lines;

    public function __construct()
    {
        $this->lines = [];
    }


    public function addLine($label, $result, array $options = [])
    {
        if (is_callable($result)) {
            $this->lines[] = [$label, $result, $options];
        }
        else {
            throw new \InvalidArgumentException("result must be a callable");
        }
    }


    public function printLines(array $options = [])
    {
        $options = array_replace([
            'formatter' => 'htmlTable',
            'formatterOptions' => [],
        ], $options);



        /**
         * Let's first find the formatter
         */
        $formatter = null;
        if (is_string($options['formatter'])) {
            switch ($options['formatter']) {
                case 'htmlTable':
                    $formatter = new HtmlTableActionMonitorFormatter();
                    break;
                default:
                    throw new \UnexpectedValueException(sprintf("%s is not a builtin formatter", $options['formatter']));
                    break;
            }
        }


        /**
         * Let's process the lines now
         */
        if ($formatter instanceof ActionMonitorFormatterInterface) {
            if ($this->lines) {
                $formatter->startMonitorTable($options['formatterOptions']);
                foreach ($this->lines as $line) {
                    $resultMessage = '';
                    list($label, $result, $op) = $line;
                    try {
                        $isError = false;
                        $resultMessage = call_user_func_array($result, [&$isError]);
                    } catch (\Exception $e) {
                        $resultMessage = $e->getMessage();
                    }
                    $formatter->printLine($label, $resultMessage, $isError, $op);
                }
                $formatter->endMonitorTable();
            }
        }
        else {
            throw new \RuntimeException(sprintf("formatter must be an instanceof ActionMonitorFormatterInterface, %s given", gettype($formatter)));
        }
    }
}
