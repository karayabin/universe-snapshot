<?php


namespace PersistentRowCollection\Util;


use PersistentRowCollection\Exception\PersistentRowCollectionException;

class PersistentRowCollectionHelper
{

    private static $separator = '+--ric_separator--+';

    public static function combineRic($ricValue, array $ricColumns)
    {
        $ricVals = explode(self::$separator, $ricValue);
        if (count($ricVals) === count($ricColumns)) {
            return array_combine($ricColumns, $ricVals);
        } else {
            throw new PersistentRowCollectionException(sprintf("ricValue and ricColumns don't have the same number of items (%s and %s)", count($ricVals), count($ricColumns)));
        }
    }

}