<?php

/*
 * This file is part of the BeeFramework package.
 *
 * (c) Ling Talfi <lingtalfi@bee-framework.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BeeFramework\Component\Log\Logger;


/**
 * LoggerInterface
 * @author Lingtalfi
 * 2015-06-01
 *
 *
 * A tag can be an array or a string.
 * If it's null, it will be considered as an empty array.
 * 
 * 
 * The difference between the log method and the others is that the other methods add an extra level tag,
 * which has the value of the name of the method, while the log method doesn't.  
 *
 */
interface LoggerInterface
{
    /**
     * System is unusable.
     */
    public function emergency($message, $tags = null);

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     */
    public function alert($message, $tags = null);

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     */
    public function critical($message, $tags = null);

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     */
    public function error($message, $tags = null);

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     */
    public function warning($message, $tags = null);

    /**
     * Normal but significant events.
     *
     */
    public function notice($message, $tags = null);

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     */
    public function info($message, $tags = null);

    /**
     * Detailed debug information.
     *
     */
    public function debug($message, $tags = null);

    /**
     * Logs with user defined tags.
     */
    public function log($message, $tags = null);
}
