<?php


namespace Jin\Configuration;


/**
 * @info The PhpConfigurator class configures the php ini directives before the application instance starts.
 */
class PhpConfigurator
{


    /**
     * @info Configures the php ini directives, according to the config/variables/php.yml file.
     *
     * @param $appDir
     * @param ConfigurationFileParser $confParser
     */
    public static function configure($appDir, ConfigurationFileParser $confParser)
    {
        $file = $appDir . "/config/php.yml";
        $conf = $confParser->parseFileRaw($file);
        foreach ($conf as $k => $v) {
            ini_set($k, $v);
        }
    }
}