<?php


namespace Jin\Configuration;


use Jin\Log\Logger;

/**
 * @info The LoggerConfigurator class configures the main Logger instance before the application is started.
 *
 *
 *
 * It also sets up a register shutdown function to catch fatal errors (at least those that can be catched by the mean of this function).
 * When a fatal error occurs, the error message is sent on the "php_fatal_error" channel.
 * Note: You need to add a listener in the logger.yml conf if you want to actually log those messages.
 * See section below for more details on logger.yml.
 *
 *
 *
 *
 * About logger.yml
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
 *         - app_init                   // log covering debug errors of the Jin\Application\Application.init method
 *         - php_fatal_error            // log covering php fatal errors (using register_shutdown_function under the hood)
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
 *      Each entry represents a listener instance (sic code should be used).
 *      - channels: this extra property indicates the channels this particular listener should be listening
 *      to. The wildcard * means "listen to all channels".
 *      Otherwise, an array of channels should be passed
 *
 *
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
        $loggerConf = $confParser->parseFile($loggerConfFile, true);

        $logger = new Logger();


        // set logger format
        if (array_key_exists("logger", $loggerConf)) {
            $loggerArr = $loggerConf['logger'];
            if (array_key_exists("format", $loggerArr) && is_string($loggerArr['format'])) {
                $logger->setFormat($loggerArr['format']);
            }

            if (array_key_exists("muted_channels", $loggerArr) && is_array($loggerArr['muted_channels'])
            ) {
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


        // set up a php fatal error logging system
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

        return $logger;
    }
}

