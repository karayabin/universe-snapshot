<?php


namespace Ling\Light_Database\Helper;

/**
 * The LightDatabaseHelper class.
 */
class LightDatabaseHelper
{


    /**
     * This property holds the tablesByQueries for this instance.
     * This is a cache.
     * @var array
     */
    private static $tablesByQueries = [];

    /**
     * Returns the array of tables used in the given sql query.
     * This only works if the table names (and database names if) don't contain a dot or a space in them.
     *
     * See my stack overflow answer here for some examples:
     * https://stackoverflow.com/questions/11010901/how-to-extract-table-names-from-mysql-query-with-php/59403860#59403860
     *
     *
     *
     * @param string $query
     * @return array
     */
    public static function getTablesByQuery(string $query): array
    {

        // cached already?
        $id = crc32($query);
        if (array_key_exists($id, self::$tablesByQueries)) {
            return self::$tablesByQueries[$id];
        }


        $tables = [];
        if (preg_match_all('!((FROM|JOIN)\s([\S]+))!i', $query, $matches)) {
            $tables = array_unique($matches[3]);
            array_walk($tables, function (&$v) {
                $p = explode('.', $v, 2);
                $v = array_pop($p);
                $v = trim($v, '`');
            });
            $tables = array_filter($tables, function ($v) {
                return ('(' !== $v);
            });
        }


        self::$tablesByQueries[$id] = $tables;
        return $tables;
    }
}