<?php


namespace Ling\Jin\Registry;


use Ling\Jin\Application\Application;
use Ling\Jin\Configuration\ConfigurationFileParser;
use Ling\Jin\Container\ServiceContainer\ServiceContainerInterface;
use Ling\Jin\Container\VariableContainer\VariableContainerInterface;
use Ling\Jin\Log\Logger;
use Ling\Jin\TemplateEngine\TemplateEngineMaster;
use Ling\Registry\RegistryInterface;

/**
 * @nfo The Access class is a registry designed to ease the development
 * of a jin app. It provides the following useful methods:
 *
 * - app(): returns the Jin/Application/Application instance
 *
 */
class Access
{
    /**
     * This property holds the jin Application instance.
     * The jin application instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session.
     */
    private static $app;

    /**
     * This property holds the main logger of the application.
     * The logger should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $log;

    /**
     * This property holds the configurationFileParser of the application.
     * The configurationFileParser helps parsing babyYaml configuration files.
     */
    private static $configurationFileParser;

    /**
     * This property holds the VariableContainerInterface instance of the application.
     * The VariableContainerInterface instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $conf;


    /**
     * This property holds the Registry instance of the application.
     * The Registry instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $registry;


    /**
     * This property holds the template engine master instance of the application.
     * This instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $templateEngineMaster;


    /**
     * This property holds the service container instance of the application.
     * This instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $serviceContainer;


    /**
     * Returns the main Application instance.
     * @return Application
     */
    public static function app()
    {
        return self::$app;
    }

    /**
     * Returns the main Logger instance.
     * @return Logger
     */
    public static function log()
    {
        return self::$log;
    }

    /**
     * Returns the configurationFileParser instance.
     * @return ConfigurationFileParser
     */
    public static function configurationFileParser()
    {
        return self::$configurationFileParser;
    }

    /**
     * Returns the main Conf instance.
     * @return VariableContainerInterface
     */
    public static function conf()
    {
        return self::$conf;
    }


    /**
     * Returns the Registry instance.
     * @return RegistryInterface
     */
    public static function registry()
    {
        return self::$registry;
    }

    /**
     * Returns the template engine master instance.
     * @return TemplateEngineMaster
     */
    public static function templateEngine()
    {
        return self::$templateEngineMaster;
    }


    /**
     * Returns the service container instance.
     * @return ServiceContainerInterface
     */
    public static function service()
    {
        return self::$serviceContainer;
    }



    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    /**
     * Sets the Application instance.
     */
    public static function setApp(Application $app)
    {
        self::$app = $app;
    }

    /**
     * Sets the application's (main) Logger instance.
     */
    public static function setLog(Logger $log)
    {
        self::$log = $log;
    }

    /**
     * Sets the application's configurationFileParser instance
     */
    public static function setConfigurationFileParser(ConfigurationFileParser $configurationFileParser)
    {
        self::$configurationFileParser = $configurationFileParser;
    }

    /**
     * Sets the application's VariableContainerInterface instance
     */
    public static function setConf(VariableContainerInterface $conf)
    {
        self::$conf = $conf;
    }

    /**
     * Sets the Registry instance for the application
     */
    public static function setRegistry(RegistryInterface $registry)
    {
        self::$registry = $registry;
    }

    /**
     * Sets the TemplateEngineMaster instance for the application
     */
    public static function setTemplateEngineMaster(TemplateEngineMaster $engine)
    {
        self::$templateEngineMaster = $engine;
    }

    /**
     * Sets the service container instance for the application
     */
    public static function setServiceContainer(ServiceContainerInterface $service)
    {
        self::$serviceContainer = $service;
    }
}