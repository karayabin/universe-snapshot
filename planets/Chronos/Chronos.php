<?php


namespace Chronos;


use Chronos\Exception\ChronosException;

class Chronos
{
    /**
     * @var $measures array of identifier => timeString
     *
     *
     *
     */
    private static $measures = [];


    /**
     * @param $identifier
     * @return array:
     *      - 0: the number of seconds.microseconds ellapsed since the first measurement for this identifier
     *      - 1: the amount of memory (in octets) used since the first measurement for this identifier
     */
    public static function point($identifier)
    {
        $first = (false === array_key_exists($identifier, self::$measures));
        self::$measures[$identifier][] = [self::getTime(), self::getMemory()];
        if (false === $first) {
            return self::getCurrentItemDifference($identifier);
        }
        return [0, 0];
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected static function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return $sec . "." . substr($usec, 2);
    }

    protected static function getCurrentItemDifference($identifier)
    {
        $identifiers = self::$measures[$identifier];
        if (count($identifiers) > 1) {

            $first = array_shift($identifiers);
            $last = array_pop($identifiers);

            list($firstTime, $firstMemory) = $first;
            list($lastTime, $lastMemory) = $last;
            return [$lastTime - $firstTime, $lastMemory - $firstMemory];

        } else {
            throw new ChronosException("Did you call the start method first?");
        }
    }

    protected static function getMemory()
    {
        return memory_get_usage();
    }
}