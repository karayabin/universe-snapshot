<?php


namespace Jin\Configuration;


use Jin\Log\Logger;
use PhpErrorName\PhpErrorName;

/**
 * @info The LoggerConfigurator class configures the main logger instance of a jin application.
 * This usually happens BEFORE the application instance's init method is called.
 *
 * CONFIGURATION
 * ----------------
 *
 * The configuration of the main logger is done via babyYaml files, in which we define the listeners instances (@class(Jin\Log\Listener\LoggerListenerInterface))
 * which will listen to the main logger messages.
 *
 *
 * Registration of listeners can be done in one of two places:
 * - config/logger.yml          # the file is configured by the maintainer of the application
 * - config/logger              # in this directory, third-party plugins can add their own logger files, which have the same structure
 *                              # as config/logger.yml (although only the listeners property shall be modified)
 *
 *
 *
 * logger.yml
 * ===================
 * This file contains the code for initializing the main logger (during the application environment boot phase).
 *
 *
 * Example
 * -------
 *
 * ```yaml
 * logger:
 *     format: {channel}: {dateTime} -- {message}
 *     mutedChannels:
 *         - app_init                   # log covering debug errors of the Jin\Application\Application.init method
 *         - php_fatal_error            # log covering php fatal errors (using register_shutdown_function under the hood)
 *         - stat
 *         - browser
 * listeners:
 *     - :
 *         instance: Jin\Log\Listener\FileLoggerListener
 *         methods:
 *             configure:
 *                 -
 *                     file: ${appDir}/log/jin.log
 *                     isFileRotationEnabled: true
 *                     maxFileSize: 2M
 *                     rotatedFileExtension: log
 *                     zipRotatedFiles: true
 * #        channels: [debug, warning]
 *         channels: *
 *     - :
 *         instance: Jin\Log\Listener\FileLoggerListener
 *         methods:
 *             configure:
 *                 -
 *                      # note: we heavily rely on the default values for this instance
 *                     file: ${appDir}/log/php_fatal_error.log
 *         channels: php_fatal_error
 *
 * ```
 *
 *
 * Features
 * --------
 * - logger: an array to configure the main logger instance.
 *     - format: define the format of the log messages (see Jin\Log\Logger.setFormat method for more info)
 *     - mutedChannels: array of channels to discard.
 *          Note: use comment/uncomment to quickly discard any channel
 *
 * - listeners: this array defines the listeners to add to the logger instance.
 *      Each entry represents a listener instance (@keyword(sic) code should be used).
 *      - channels: this extra property indicates the channels this particular listener should be listening
 *      to. The wildcard * means "listen to all channels".
 *      Otherwise, an array of channels should be passed
 *
 *
 *
 *
 * PHP ERRORS
 * --------------
 *
 * This configurator class catches php fatal errors (using the register shutdown function) and sends them to the "php_fatal_error" channel.
 *
 * Optionally, you can enable logging of regular php errors (E_WARNING, E_NOTICE, ...), which will then be sent to the
 * main logger on the "php_error" channel.
 * Note that this mechanism is independent of the default php error logging system (configured by the ini directives log_errors and error_log),
 * which means you can potentially have the php errors logged twice (once by the main logger system, and once by the default php error log system).
 *
 *
 *
 */
class LoggerConfigurator
{


    /**
     * @info Configure the main Logger instance and its listeners using the config/logger.yml file.
     * Returns the main Logger instance.
     *
     *
     * @param $appDir
     * @param ConfigurationFileParser $confParser
     * @return Logger
     */
    public static function configure($appDir, ConfigurationFileParser $confParser)
    {
        $loggerConfFile = $appDir . "/config/logger.yml";
        $loggerDir = $appDir . "/config/logger";
        $loggerConf = $confParser->parseFileWithDir($loggerConfFile, $loggerDir, true);
        $generalConf = $loggerConf['conf'] ?? [];

        $logger = new Logger();


        // set logger format
        if (array_key_exists("logger", $loggerConf)) {
            $loggerArr = $loggerConf['logger'];
            if (array_key_exists("format", $loggerArr) && is_string($loggerArr['format'])) {
                $logger->setFormat($loggerArr['format']);
            }

            if (array_key_exists("whitelist", $loggerArr) && is_array($loggerArr['whitelist'])) {
                $logger->setWhitelist($loggerArr['whitelist']);
            }

            if (array_key_exists("muted_channels", $loggerArr) && is_array($loggerArr['muted_channels'])) {
                $logger->setMutedChannels($loggerArr['muted_channels']);
            }
        }


        // set listeners
        if (array_key_exists("listeners", $loggerConf)) {
            $listeners = $loggerConf['listeners'];
            if (is_array($listeners)) {
                foreach ($listeners as $listenerArray) {

                    $instance = $listenerArray['instance'];
                    $channels = $listenerArray['channels'];
                    $logger->listen($channels, [$instance, "listen"]);
                }
            }
        }


        //--------------------------------------------
        // LOG PHP FATAL ERROR
        //--------------------------------------------
        register_shutdown_function(function () use ($logger) {

            // http://php.net/manual/en/errorfunc.constants.php
            $lastError = error_get_last();
            if (null !== $lastError) {
                $type = $lastError["type"];
                $fatalTypes = [
                    \E_ERROR => "E_ERROR",
                    \E_CORE_ERROR => "E_CORE_ERROR", // not sure if you can actually catch it, but just in case
                    \E_COMPILE_ERROR => "E_COMPILE_ERROR", // not sure if you can actually catch it, but just in case
                    \E_RECOVERABLE_ERROR => "E_RECOVERABLE_ERROR",
                ];
                if (array_key_exists($type, $fatalTypes)) {
                    $message = $lastError["message"];
                    $file = $lastError["file"];
                    $line = $lastError["line"];
                    $msg = 'TYPE: ' . $fatalTypes[$type] . "," . PHP_EOL;
                    $msg .= 'FILE: ' . $file . "," . PHP_EOL;
                    $msg .= 'LINE: ' . $line . "," . PHP_EOL;
                    $msg .= 'MESSAGE: ' . $message;
                    $logger->log($msg, "php_fatal_error");
                }
            }
        });


        //--------------------------------------------
        // LOG PHP ERRORS
        //--------------------------------------------
        if (array_key_exists('log_php_errors', $generalConf) && true === $generalConf['log_php_errors']) {
            set_error_handler(function ($code, $description, $file = null, $line = null, $context = null) use ($logger) {
                $errorType = PhpErrorName::getErrorName($code);
                $msg = $errorType . ' (' . $code . '): ' . $description . ' in [' . $file . ', line ' . $line . ']';
                $logger->log($msg, "php_error");
                return false;
            });
        }

        return $logger;
    }
}

