<?php


namespace SaveOrm\Generator\Helper;

use Bat\CaseTool;

class SaveOrmGeneratorHelper
{


    public static function toPascal($word)
    {
        return CaseTool::snakeToFlexiblePascal($word);
    }

    public static function getObjectRelativePath($table, $tablePrefixes, &$usedTablePrefix = null)
    {

        foreach ($tablePrefixes as $tablePrefix) {
            if (0 === strpos($table, $tablePrefix)) {
                $usedTablePrefix = $tablePrefix;
                $table = substr($table, strlen($tablePrefix));
                $tablePrefix = rtrim($tablePrefix, '_');
                return SaveOrmGeneratorHelper::toPascal($tablePrefix) . "/" . SaveOrmGeneratorHelper::toPascal($table) . 'Object';
            }
        }
        return SaveOrmGeneratorHelper::toPascal($table) . 'Object';
    }


}