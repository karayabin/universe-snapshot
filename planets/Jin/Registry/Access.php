<?php


namespace Jin\Registry;


use Jin\Application\Application;
use Jin\Log\Logger;

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
}