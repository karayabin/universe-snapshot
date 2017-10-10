<?php


namespace Kamille\Services;


use Logger\LoggerInterface;

class XLog
{

    /**
     * @var LoggerInterface
     */
    private static $logger;

    public static function log($msg, $identifier = null)
    {
        /**
         * Note: if a module doesn't initialize the logger,
         * then the logger functionality will not be available
         * to XLog, but that's not an error, just a choice (i.e. you don't need
         * logs and so you don't activate them, remember that XLog belongs
         * to the framework context and might be used in the framework code, so
         * if it's not set, don't do anything like throwing exception, it's just
         * that the XLog doesn't do anything unless initialized by a module, which belongs to
         * the application context).
         */
        if (null !== self::$logger) {
            self::$logger->log($msg, $identifier);
        }
    }


    public static function fatal($msg)
    {
        self::log($msg, 'fatal');
    }

    public static function error($msg)
    {
        self::log($msg, 'error');
    }

    public static function warn($msg)
    {
        self::log($msg, 'warn');
    }

    public static function info($msg)
    {
        self::log($msg, 'info');
    }

    public static function debug($msg)
    {
        self::log($msg, 'debug');
    }

    public static function trace($msg)
    {
        self::log($msg, 'trace');
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }
}