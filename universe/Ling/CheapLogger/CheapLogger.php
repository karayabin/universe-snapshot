<?php


namespace Ling\CheapLogger;


use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\DebugTool;
use Ling\Bat\ExceptionTool;
use Ling\Bat\FileTool;

/**
 * The CheapLogger class.
 */
class CheapLogger
{

    /**
     * This property holds the path for this instance.
     *
     * @var string
     */
    private static $path = "/tmp/CheapLogger.txt";


    /**
     * Logs the given argument(s) to the log file.
     * If only one argument is given, it will be logged directly.
     * If more than one argument is given, the array of arguments will be logged.
     */
    public static function log()
    {
        $args = func_get_args();
        if (1 === count($args)) {
            $msg = self::getLogMessage($args[0]);
        } else {
            $msg = self::getLogMessage($args);
        }
        FileTool::append($msg, self::$path);
    }


    /**
     * Converts the given thing into a log string, and returns it.
     *
     * @param $thing
     * @return string
     */
    private static function getLogMessage($thing): string
    {
        if (is_array($thing)) {
            $thing = ArrayToStringTool::toPhpArray($thing);
        } elseif ($thing instanceof \Exception) {
            $thing = ExceptionTool::toString($thing);
        } else {
            $thing = DebugTool::toString($thing);
        }
        return date("Y-m-d H:i:s") . " -- " . $thing . PHP_EOL;
    }
}