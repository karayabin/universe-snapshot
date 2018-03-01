<?php


namespace Kamille\Utils\Morphic\Generator\GeneratorHelper;


use ArrayToString\ArrayToStringTool;
use Bat\CaseTool;
use Bat\StringTool;
use OrmTools\Helper\OrmToolsHelper;
use PhpFile\PhpFile;
use QuickPdo\QuickPdoInfoTool;

class MorphicGeneratorHelper
{


    public static function getElementType(array $operation)
    {
        $table = $operation['elementTable'];
        if (array_key_exists("elementType", $operation)) {
            $elementType = $operation['elementType'];
        } else {
            $elementType = (false !== strpos($table, '_has_')) ? 'context' : 'simple';
        }
        return $elementType;
    }

    public static function getColumnLabel($columnName, array $operation, array $config)
    {
        $viewId = $operation['elementName'];

        if (array_key_exists("columnLabels", $config)) {
            $labels = $config['columnLabels'];
            $table = array_key_exists("table", $labels) ? $labels['table'] : [];
            $default = array_key_exists("default", $labels) ? $labels['default'] : [];

            if (array_key_exists($viewId, $table) && array_key_exists($columnName, $table[$viewId])) {
                return $table[$viewId][$columnName];
            } elseif (array_key_exists($columnName, $default)) {
                return $default[$columnName];
            }
        }

        /**
         * If everything else fails, we use the default heuristic
         */
        $label = str_replace("_", " ", $columnName);
        return ucfirst($label);
    }


    /**
     * @param array|null $prefixes
     *              if null, will always drop the first component (in a underscore separated string)
     *
     * @param bool $skipIfNoPrefixMatch
     * @return string
     * @throws \QuickPdo\Exception\QuickPdoException
     */
    public static function getEnglishDictionaryCode(array $prefixes = null, $skipIfNoPrefixMatch = true)
    {


        //--------------------------------------------
        // COLLECT OBJECT TABLES
        // CREATE THE DICTIONARY ENTRIES
        //--------------------------------------------
        $dic = [];
        $objectTables = [];
        $db = QuickPdoInfoTool::getDatabase();
        $tables = QuickPdoInfoTool::getTables($db);
        sort($tables);


        $prefix2Lengths = [];
        if ($prefixes) {
            foreach ($prefixes as $prefix) {
                $prefix2Lengths[$prefix] = strlen($prefix);
            }
        }

        foreach ($tables as $table) {
            if (false === strpos($table, '_has_')) {
                $objectTables[] = $table;
                $label = $table;
                if (null === $prefixes) {
                    if (false !== strpos($label, '_')) {
                        $p = explode("_", $label);
                        array_shift($p);
                        $label = implode('_', $p);
                    }
                }


                $match = false;
                foreach ($prefix2Lengths as $prefix => $length) {
                    if (0 === strpos($table, $prefix)) {
                        $label = substr($label, $length);
                        $match = true;
                        break;
                    }
                }

                if (false === $match && true === $skipIfNoPrefixMatch) {
                    continue;
                }

                $label = str_replace('_', ' ', $label);

                $labelPlural = StringTool::getPlural($label);

                $dic[$table] = [
                    0 => $label,
                    1 => $labelPlural,
                ];

            }
        }


        //--------------------------------------------
        // COLLECT THE DICTIONARY ENTRY
        //--------------------------------------------
        $s = '$dictionary = ' . ArrayToStringTool::toPhpArray($dic);
        return $s;

    }


    public static function dropTablePrefix(&$table, &$prefix = null)
    {
        $p = explode('_', $table);
        $prefix = array_shift($p) . '_';
        $table = implode('_', $p);
    }

    /**
     * @param $hasTable
     * @return array|false
     */
    public static function getContextFieldsByHasTable($hasTable, array $leftRightTables = null)
    {
        $ret = [];
        if (null !== $leftRightTables) {
            $p = $leftRightTables;
        } else {
            $p = explode('_has_', $hasTable);
        }
        if (count($p) > 1) {
            $fkeys = QuickPdoInfoTool::getForeignKeysInfo($hasTable);
            array_pop($p); // drop the right part
            foreach ($p as $cue) {
                foreach ($fkeys as $col => $info) {
                    if ($cue === $info[1]) {
                        $ret[] = $col;
                        break;
                    }
                }
            }
            return $ret;
        }
        return false;
    }


    public static function getOperationsByTables(array $tables, array $config = [])
    {
        $ret = [];
        foreach ($tables as $table) {
            $ret[] = self::getOperationByTable($table, $config);
        }
        return $ret;
    }

    public static function getOperationByTable($table, array $config = [])
    {
        $simpleElements = (array_key_exists("simpleElements", $config)) ? $config['simpleElements'] : [];

        if (in_array($table, $simpleElements, true)) {
            $elementType = 'simple';
        } else {
            $elementType = (false !== strpos($table, '_has_')) ? 'context' : 'simple';
        }


        $dbPrefixes = (array_key_exists("dbPrefixes", $config)) ? $config['dbPrefixes'] : [];


        $icon = "fa fa-bomb";
        $icon = "";
        $name = $table;
        foreach ($dbPrefixes as $prefix) {
            if (0 === strpos($name, $prefix)) {
                $name = substr($name, strlen($prefix));
                break;
            }
        }

        $label = ucfirst(str_replace('_', ' ', $name));
        $labelPlural = StringTool::getPlural($label);
        $camel = CaseTool::snakeToFlexiblePascal($table);


        $op = [
            "operationType" => "create",
            "elementType" => $elementType,
            "icon" => $icon,
            "elementTable" => $table,
            /**
             * Element name changed to table to avoid potential conflicts arising with no namespaces (i.e. ek_card, ektra_card,...)
             */
            "elementName" => $table,
            "elementLabel" => $label,
            "elementLabelPlural" => $labelPlural,
            "elementRoute" => "NullosAdmin_Ekom_Generated_$camel" . "_List",
        ];
        return $op;
    }
}