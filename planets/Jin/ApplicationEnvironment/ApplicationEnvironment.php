<?php

namespace Jin\ApplicationEnvironment;


use Jin\Configuration\Conf;
use Jin\Configuration\ConfigurationFileParser;
use Jin\Configuration\ConfigurationVariableFileParser;
use Jin\Configuration\LoggerConfigurator;
use Jin\Configuration\PhpConfigurator;
use Jin\Registry\Access;

/**
 *
 * @info The ApplicationEnvironment class represents the application environment.
 * The application environment must be set BEFORE the application object is initialized.
 *
 */
class ApplicationEnvironment
{

    /**
     * @info This property holds the error messages that occur during the boot phase.
     * Those messages shall be transmitted to the Logger when it awakes, so that
     * the maintainer of this application can see them via the logging system.
     *
     *
     * @type array
     */
    private static $errors = [];


    /**
     * @info Initializes the application environment.
     * The following steps are executed in order:
     *
     * - Preparing the ConfParser object
     *      - set an Access reference for sharing the ConfParser with other components
     * - Preparing the Conf object
     *      - Collecting all configuration files
     *      - Resolving references (flattening process)
     *      - set an Access reference for sharing the Conf with other components
     *
     *
     *
     *
     * @param $appDir
     * @param $appProfile
     */
    public static function boot($appDir, $appProfile)
    {

        // preparing the configurationFileParser instance
        $confParser = new ConfigurationFileParser();
        $confParser->setProfile($appProfile);
        Access::setConfigurationFileParser($confParser);


        // configure php directives
        PhpConfigurator::configure($appDir, $confParser);


        // preparing the Conf instance
        $parser = new ConfigurationVariableFileParser();
        $parser->setProfile("dev");
        $parser->setConfigurationFileParser($confParser);
        $variables = $parser->collectConfigurationVariables($appDir . "/config/variables");
        $parserErrors = $parser->getErrors();


        $conf = new Conf();
        $conf->setVars($variables);
        $conf->setVar("appDir", $appDir);
        $conf->setVar("appProfile", $appProfile);
        Access::setConf($conf);


        // setup the logger
        Access::setLog(LoggerConfigurator::configure($appDir, $confParser)); // share the main app logger instance with all other components


        // sharing errors
        self::$errors = $parserErrors;


    }


    /**
     * @info Returns the errors collected during the boot phase (boot method).
     * @return array
     */
    public static function getErrors()
    {
        return self::$errors;
    }

}