<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Monitor\ActionMonitor\Formatter;


/**
 * HtmlTableActionMonitorFormatter
 * @author Lingtalfi
 * 2014-09-02
 *
 */
class HtmlTableActionMonitorFormatter implements ActionMonitorFormatterInterface
{

    protected $options;

    public function __construct()
    {
        $this->options = [];
    }


    //------------------------------------------------------------------------------/
    // IMPLEMENTS ActionMonitorFormatterInterface
    //------------------------------------------------------------------------------/
    public function startMonitorTable(array $options = [])
    {
        $this->options = array_replace([
            'useStyle' => true,
            'class' => 'bee-actionmonitor-table',
            'lineNoErrorClass' => 'bee-actionmonitor-tr',
            'lineErrorClass' => 'bee-actionmonitor-tr-error',
            'labelAction' => 'Action',
            'labelResult' => 'Result',
        ], $options);

        if (true === $this->options['useStyle']) {
            echo '<style>' . PHP_EOL;
            echo '

                .bee-actionmonitor-table{
                    border-collapse: collapse;
                    text-align:left;
                }

                .bee-actionmonitor-table,
                .bee-actionmonitor-table tr,
                .bee-actionmonitor-table td,
                .bee-actionmonitor-table th{
                    border: 1px solid #ddd;
                    padding: 3px;
                }

                .bee-actionmonitor-table th{
                    background: #aca;
                }

                .bee-actionmonitor-tr-error{
                    background: red;
                }

                .bee-actionmonitor-tr{
                    background: #aca;
                }


            ' . PHP_EOL;
            echo '</style>' . PHP_EOL;
        }


        echo '<table class="' . $this->options['class'] . '">' . PHP_EOL;
        echo '<tr>' . PHP_EOL;
        echo '<th>' . $this->options['labelAction'] . '</th>' . PHP_EOL;
        echo '<th>' . $this->options['labelResult'] . '</th>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
    }

    public function printLine($label, $resultMessage, $isError, array $options = [])
    {
        $s = '';
        if (true === $isError) {
            $s = ' class="' . $this->options['lineErrorClass'] . '"';
        }
        elseif ($this->options['lineNoErrorClass']) {
            $s = ' class="' . $this->options['lineNoErrorClass'] . '"';
        }
        echo '<tr' . $s . '>' . PHP_EOL;
        echo '<td>' . $label . '</td>' . PHP_EOL;
        echo '<td>' . $resultMessage . '</td>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
    }

    public function endMonitorTable()
    {
        echo '</table>' . PHP_EOL;
    }
}
