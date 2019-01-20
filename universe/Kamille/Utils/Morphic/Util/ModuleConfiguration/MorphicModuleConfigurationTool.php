<?php


namespace Kamille\Utils\Morphic\Util\ModuleConfiguration;


use Kamille\Utils\Morphic\Exception\MorphicModuleConfigurationException;
use QuickPdo\QuickPdo;

class MorphicModuleConfigurationTool
{

    protected static $table = null;
    private static $table2Values = [];


    public static function get(string $key, $default = null, $throwEx = false, string $table = null)
    {
        if (null === $table) {
            $table = static::$table;
        }

        if ($table) {


            if (false === array_key_exists($table, self::$table2Values)) {
                self::$table2Values[$table] = QuickPdo::fetchAll("select the_key, the_value from $table", [], \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
            }
            if (array_key_exists($key, self::$table2Values[$table])) {
                return self::$table2Values[$table][$key];
            }

            if (false === $throwEx) {
                return $default;
            }
            throw new MorphicModuleConfigurationException("Value not found in table $table with key $key");
        } else {
            throw new MorphicModuleConfigurationException("table not defined");
        }
    }
}