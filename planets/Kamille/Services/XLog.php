<?php


namespace Kamille\Services;


/**
 * -- DO NOT USE THIS CLASS DIRECTLY - (THIS IS JUST AN EXAMPLE CLASS) --
 * -- COPY PASTE THIS CLASS INTO YOUR APPLICATION AND REMOVE THIS STUPID COMMENT --
 * -- AND THEN REPLACE THE NAMESPACE WITH namespace Services; --
 *
 *
 */
class XLog
{


    public static function log($msg, $identifier = null)
    {
        /**
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
    }
}