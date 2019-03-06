<?php

namespace Ling\Jin\ApplicationEnvironment;


use Ling\ArrayRefResolver\ArrayTagResolver;
use Ling\BumbleBee\Autoload\ButineurAutoloader;
use Ling\Jin\Configuration\Conf;
use Ling\Jin\Configuration\ConfigurationFileParser;
use Ling\Jin\Configuration\LoggerConfigurator;
use Ling\Jin\Configuration\PhpConfigurator;
use Ling\Jin\Configuration\TemplateEngineMasterConfigurator;
use Ling\Jin\Container\ServiceContainer\JinHotServiceContainer;
use Ling\Jin\Log\Logger;
use Ling\Jin\Registry\Access;
use Ling\Registry\Registry;

/**
 *
 * @info The ApplicationEnvironment class represents the application environment.
 * The application environment must be set BEFORE the application object is initialized.
 *
 */
class ApplicationEnvironment
{


    /**
     * @info Initializes the application environment.
     *
     *
     *
     * The initialization of the application consists of the following phase:
     *
     * - prepare the basic tools that we will be using
     *      - a Jin\Configuration\ConfigurationFileParser instance, to parse profile sensitive yml files quickly
     *
     * - variables and services booting
     * - php directives
     *
     *
     *
     *
     * Variables and Services booting
     * ===============================
     *
     * In this phase we initialize the variables container (aka Conf) and the service container (using the configuration
     * files provided by the plugins and or the maintainer, and/or the cache files if they exist).
     *
     *
     * This is done by calling the bootVariables and bootServices methods.
     *
     * The bootVariables method's goal is to make variables accessible via Access::Conf,
     * and the bootServices method's goal is to make services accessible via Access::Services.
     *
     * The basic synopsis is that the variables are first collected, then resolved (variables use the default
     * ArrayTagResolver mechanism, see https://github.com/karayabin/universe-snapshot/blob/master/universe/Ling/ArrayRefResolver/ArrayTagResolver.md fore more info).
     *
     * Then resolved variables are stored in the Conf object.
     * Then services are parsed, and resolved using the (resolved) variables.
     *
     * It's important (design wise) to understand that variables are already resolved when the services parsing phase begins.
     *
     *
     * Services are then stored in the ServiceContainer object.
     *
     *
     *
     *
     *
     *
     * Caching
     * -----------
     * By default, both methods use a similar caching system, where they first test the existence of a cache file:
     *
     * - cache/application/VariableContainer-${appProfile}.php         (for variables)
     * - cache/application/ServiceContainer-${appProfile}.php          (for services)
     *
     *
     * Those cache files, when they exist, contains a class which can be used directly by the booter method,
     * in order to save some time and cpu cycles.
     *
     * If those object don't exist, then the booter methods will do their job as normal.
     *
     * Note: they will not create those files by themselves: a service must be configured in order to do so
     * (so that the booting phase don't force the user to use a cache system).
     *
     *
     *
     *
     *
     *
     * Php directives
     * ================
     * Todo...
     *
     *
     *
     *
     *
     *
     *
     *
     * @deprecated
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
     * - Initialize the template engine master instance
     * - Initialize the main {-Logger-} instance which will be used by the Application instance.
     * - Add the following directories to the autoloader search paths:
     *      - controller
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


        //--------------------------------------------
        // CONFIGURATION FILE PARSER
        //--------------------------------------------
        $confParser = new ConfigurationFileParser();
        $confParser->setProfile($appProfile);
//        $confParser->setResolver(new ArrayTagResolver());
        Access::setConfigurationFileParser($confParser);


        //--------------------------------------------
        // CREATING VARIABLES AND SERVICES CONTAINERS
        //--------------------------------------------
        self::bootVariables($appDir, $appProfile, $confParser); // now variables are accessible via Access::Conf
        self::bootServices($appDir, $appProfile, $confParser); // now services are accessible via Access::Service


        /**
         * @var Logger $logger
         */
        $logger = Access::service()->get("core.dispatcher")->trigger('on_services_ready');
        $logger = Access::service()->get("on_services_ready")->prepare();
        az($logger);
        az($logger->debug("Test"));
        az("ok", __FILE__);


        //--------------------------------------------
        // MAIN LOGGER
        //--------------------------------------------
        Access::setLog(LoggerConfigurator::configure($appDir, $confParser)); // share the main app logger instance with all other components


        //--------------------------------------------
        // REGISTRY
        //--------------------------------------------
        Access::setRegistry(new Registry());


        $errors = [];


        //--------------------------------------------
        // PHP DIRECTIVES
        //--------------------------------------------
        // configure php directives.
        // Note that we do this AFTER Conf is instantiated, so that we can use
        // configuration variables in our config/php.yml file
        if (true !== ($phpConfErrors = PhpConfigurator::configure($appDir, $confParser))) {
            $errors = array_merge($errors, $phpConfErrors);
        }


        //--------------------------------------------
        // TEMPLATE ENGINE MASTER
        //--------------------------------------------
        if (true !== ($temErrors = TemplateEngineMasterConfigurator::configure($appDir, $confParser))) {
            $errors = array_merge($errors, $temErrors);
        }


        //--------------------------------------------
        // AUTOLOADER
        //--------------------------------------------
        ButineurAutoloader::getInst()->addLocation($appDir . "/controller", "Controller");
        ButineurAutoloader::getInst()->addLocation($appDir . "/plugin", "Plugin");


        if ($errors) {
            $logger = Access::log();
            foreach ($errors as $msg) {
                $logger->fatal($msg);
            }
        }


    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Finds the first available VariableContainerInterface (aka Conf) instance, and registers it to the Access object.
     *
     * It will first try to load the cached (aka static) version of the Conf, by looking in this file (if it exists):
     *
     * - cache/application/VariableContainer-${appProfile}.php
     *
     * If this file doesn't exist and the Conf instance cannot be found, then it will create a Conf instance itself
     * using the static configuration files, located in:
     *
     * - config/variables.yml           reserved the application maintainer
     * - config/variables/*.yml         reserved for plugins
     *
     *
     *
     * @param $appDir
     * @param $appProfile
     */
    private static function bootVariables($appDir, $appProfile, ConfigurationFileParser $confParser)
    {
        $cachedConfFile = $appDir . "/cache/application/VariableContainer-$appProfile.php";
        if (file_exists($cachedConfFile)) {
            // using blue octopus
            include_once $cachedConfFile;
            $className = "VariableContainer" . ucfirst(strtolower($appProfile));
            $oConf = new $className();
        } else {
            // using red octopus
            $varDir = $appDir . "/config/variables";
            $conf = $confParser->parseDir($varDir, [
                "resolve" => false,
            ]);


            // resolving references on themselves, once for all...
            $resolver = $confParser->getResolver();
            $resolver->setVariables(array_merge([
                "appDir" => $appDir,
                "appProfile" => $appProfile,
            ], $conf));
            $resolver->resolve($conf, [
                "recursive" => true,
            ]);

            $oConf = new Conf();
            $oConf->setVars($conf);
        }


        Access::setConf($oConf);
    }


    /**
     * Finds the first available ServiceContainerInterface instance, and registers it to the Access object.
     *
     * It will first try to load the cached (aka static) version of the ServiceContainer, by looking in this file (if it exists):
     *
     * - cache/application/ServiceContainer-${appProfile}.php
     *
     * If this file doesn't exist and the service container instance cannot be found, then it will create a service container instance itself
     * using the static configuration files, located in:
     *
     * - config/services.yml           reserved the application maintainer
     * - config/services/*.yml         reserved for plugins
     *
     *
     *
     * @param $appDir
     * @param $appProfile
     */
    private static function bootServices($appDir, $appProfile, ConfigurationFileParser $confParser)
    {
        $cachedConfFile = $appDir . "/cache/application/ServiceContainer-$appProfile.php";
        if (file_exists($cachedConfFile)) {
            include_once $cachedConfFile;
            $className = "ServiceContainer" . ucfirst(strtolower($appProfile));
            $oService = new $className();

        } else {
            $varDir = $appDir . "/config/services";
            $sicConf = $confParser->parseDir($varDir);
            $services = $sicConf['services'] ?? [];
            $oService = new JinHotServiceContainer();
            $oService->build($services);
        }
        Access::setServiceContainer($oService);

    }

}