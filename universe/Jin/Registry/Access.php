<?php


namespace Jin\Registry;


use Jin\Application\Application;
use Jin\Configuration\Conf;
use Jin\Configuration\ConfigurationFileParser;
use Jin\Log\Logger;
use Jin\TemplateEngine\TemplateEngineMaster;
use Registry\RegistryInterface;

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
     * @info This property holds the jin Application instance.
     * The jin application instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session.
     */
    private static $app;

    /**
     * @info This property holds the main logger of the application.
     * The logger should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $log;

    /**
     * @info This property holds the configurationFileParser of the application.
     * The configurationFileParser helps parsing babyYaml configuration files.
     */
    private static $configurationFileParser;

    /**
     * @info This property holds the Conf instance of the application.
     * The Conf instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $conf;


    /**
     * @info This property holds the Registry instance of the application.
     * The Registry instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $registry;


    /**
     * @info This property holds the template engine master instance of the application.
     * This instance should be registered as soon as possible (in the www/index.php), so that
     * it's available to every component in a jin app session, including the Application itself.
     */
    private static $templateEngineMaster;


    /**
     * @info Returns the main Application instance.
     * @return Application
     */
    public static function app()
    {
        return self::$app;
    }

    /**
     * @info Returns the main Logger instance.
     * @return Logger
     */
    public static function log()
    {
        return self::$log;
    }

    /**
     * @info Returns the configurationFileParser instance.
     * @return ConfigurationFileParser
     */
    public static function configurationFileParser()
    {
        return self::$configurationFileParser;
    }

    /**
     * @info Returns the main Conf instance.
     * @return Conf
     */
    public static function conf()
    {
        return self::$conf;
    }


    /**
     * @info Returns the Registry instance.
     * @return RegistryInterface
     */
    public static function registry()
    {
        return self::$registry;
    }

    /**
     * @info Returns the template engine master instance.
     * @return TemplateEngineMaster
     */
    public static function templateEngine()
    {
        return self::$registry;
    }



    //--------------------------------------------
    // SETTERS
    //--------------------------------------------
    /**
     * @info Sets the Application instance.
     */
    public static function setApp(Application $app)
    {
        self::$app = $app;
    }

    /**
     * @info Sets the application's (main) Logger instance.
     */
    public static function setLog(Logger $log)
    {
        self::$log = $log;
    }

    /**
     * @info Sets the application's configurationFileParser instance
     */
    public static function setConfigurationFileParser(ConfigurationFileParser $configurationFileParser)
    {
        self::$configurationFileParser = $configurationFileParser;
    }

    /**
     * @info Sets the application's Conf instance
     */
    public static function setConf(Conf $conf)
    {
        self::$conf = $conf;
    }

    /**
     * @info Sets the Registry instance for the application
     */
    public static function setRegistry(RegistryInterface $registry)
    {
        self::$registry = $registry;
    }

    /**
     * @info Sets the TemplateEngineMaster instance for the application
     */
    public static function setTemplateEngineMaster(TemplateEngineMaster $engine)
    {
        self::$templateEngineMaster = $engine;
    }
}