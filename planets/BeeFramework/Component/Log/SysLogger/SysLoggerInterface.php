<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\SysLogger;


/**
 * SysLoggerInterface
 * @author Lingtalfi
 * 2015-05-29
 *
 *
 * A simple logger for bee ecosystem.
 *
 *
 *
 *
 */
interface SysLoggerInterface
{

    /**
     * System is unusable.
     */
    public function emergency($message);

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     */
    public function alert($message);

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     */
    public function critical($message);

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     */
    public function error($message);

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     */
    public function warning($message);

    /**
     * Normal but significant events.
     *
     */
    public function notice($message);

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     */
    public function info($message);

    /**
     * Detailed debug information.
     *
     */
    public function debug($message);

    /**
     * Logs with an arbitrary level.
     */
    public function log($level, $message);
}
