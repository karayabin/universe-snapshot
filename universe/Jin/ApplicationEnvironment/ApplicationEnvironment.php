<?php

namespace Jin\ApplicationEnvironment;


use Jin\Configuration\Conf;
use Jin\Configuration\ConfigurationFileParser;
use Jin\Configuration\ConfigurationVariableFileParser;
use Jin\Configuration\LoggerConfigurator;
use Jin\Configuration\PhpConfigurator;
use Jin\Registry\Access;
use Registry\Registry;

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
     * - Preparing the {-Registry-} instance for this application
     * - Preparing the {-ConfParser-} object
     *      - set an Access reference for sharing the ConfParser with other components
     * - Preparing the {-Conf-} object
     *      - Collecting all configuration files
     *      - Resolving references (flattening process)
     *      - set an Access reference for sharing the Conf with other components
     * - Initialize the php directives (calls to ini_set function...) according to the php.yml configuration file.
     *          Note that since Conf is instantiated at this point, we can use configuration variables in
     *          our php directives.
     * - Initialize the main {-Logger-} instance which will be used by the Application instance.
     *
     *
     *
     * @param $appDir
     * @param $appProfile
     * @see \Jin\Configuration\ConfigurationFileParser
     * @see \Jin\Configuration\PhpConfigurator
     * @see \Jin\Configuration\ConfigurationVariableFileParser
     * @see \Jin\Configuration\Conf
     * @see \Jin\Log\Logger
     */
    public static function boot($appDir, $appProfile)
    {

        // preparing the Registry for this application
        Access::setRegistry(new Registry());

        // preparing the configurationFileParser instance
        $confParser = new ConfigurationFileParser();
        $confParser->setProfile($appProfile);
        Access::setConfigurationFileParser($confParser);


        // preparing the Conf instance
        $parser = new ConfigurationVariableFileParser();
        $parser->setProfile("dev");
        $parser->setConfigurationFileParser($confParser);
        $variables = $parser->collectConfigurationVariables($appDir . "/config/variables");
        $errors = $parser->getErrors();


        $conf = new Conf();
        $conf->setVars($variables);
        $conf->setVar("appDir", $appDir);
        $conf->setVar("appProfile", $appProfile);
        Access::setConf($conf);


        // configure php directives.
        // Note that we do this AFTER Conf is instantiated, so that we can use
        // configuration variables in our config/php.yml file
        if (true !== ($phpConfErrors = PhpConfigurator::configure($appDir, $confParser))) {
            $errors = array_merge($errors, $phpConfErrors);
        }


        // setup the logger
        Access::setLog(LoggerConfigurator::configure($appDir, $confParser)); // share the main app logger instance with all other components


        // sharing errors
        self::$errors = $errors;


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