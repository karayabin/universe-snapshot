<?php


namespace Ling\Logger;


/**
 * Logs a message, and send it to listeners.
 *
 *
 *
 * If you want, you can use this system for identifier names (taken from the log4j framework):
 *
 * - fatal: Designates very severe error events that will presumably lead the application to abort.
 * - error: Designates error events that might still allow the application to continue running.
 * - warn: Designates potentially harmful situations.
 * - info: Designates informational messages that highlight the progress of the application at coarse-grained level.
 * - debug: Designates fine-grained informational events that are most useful to debug an application.
 * - trace: Designates finer-grained informational events than the "debug".
 *
 */
interface LoggerInterface
{
    public function log($msg, $identifier);
}
