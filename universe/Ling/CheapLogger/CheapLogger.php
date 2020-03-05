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
     * Logs the thing to the log file.
     * @param $thing
     */
    public static function log($thing)
    {
        if (is_array($thing)) {
            $thing = ArrayToStringTool::toPhpArray($thing);
        } elseif ($thing instanceof \Exception) {
            $thing = ExceptionTool::toString($thing);
        } else {
            $thing = DebugTool::toString($thing);
        }
        $msg = date("Y-m-d H:i:s") . " -- " . $thing . PHP_EOL;
        FileTool::append($msg, self::$path);
    }
}