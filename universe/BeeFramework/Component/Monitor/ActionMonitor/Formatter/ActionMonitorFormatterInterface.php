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
 * ActionMonitorFormatterInterface
 * @author Lingtalfi
 * 2014-09-02
 *
 */
interface ActionMonitorFormatterInterface
{

    public function startMonitorTable(array $options = []);

    public function printLine($label, $resultMessage, $isError, array $options = []);

    public function endMonitorTable();
}
