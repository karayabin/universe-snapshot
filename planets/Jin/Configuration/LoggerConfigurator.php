<?php


namespace Jin\Configuration;


use Jin\Log\Logger;

/**
 * @info The LoggerConfigurator class configures the main Logger instance before the application is started.
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
        if (
            array_key_exists("logger", $loggerConf) &&
            array_key_exists("format", $loggerConf['logger']) &&
            is_string($loggerConf['logger']['format'])
        ) {
            $logger->setFormat($loggerConf['logger']['format']);
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

        return $logger;
    }
}

