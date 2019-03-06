<?php


namespace Ling\OrmTools\Helper;


use Ling\Bat\CaseTool;
use Ling\QuickPdo\QuickPdo;
use Ling\QuickPdo\QuickPdoInfoTool;

class OrmToolsHelper
{

    private static $irregular = [
        'woman' => 'women',
        'man' => 'men',
        'child' => 'children',
        'tooth' => 'teeth',
        'foot' => 'feet',
        'person' => 'people',
        'leaf' => 'leaves',
        'mouse' => 'mice',
        'goose' => 'geese',
        'half' => 'halves',
        'knife' => 'knives',
        'wife' => 'wives',
        'life' => 'lives',
        'elf' => 'elves',
        'loaf' => 'loaves',
        'potato' => 'potatoes',
        'tomato' => 'tomatoes',
        'cactus' => 'cacti',
        'focus' => 'foci',
        'fungus' => 'fungi',
        'nucleus' => 'nuclei',
        'syllabus' => 'syllabi',
        'analysis' => 'analyses',
        'diagnosis' => 'diagnoses',
        'oasis' => 'oases',
        'thesis' => 'theses',
        'crisis' => 'crises',
        'phenomenon' => 'phenomena',
        'criterion' => 'criteria',
        'datum' => 'data',
    ];


    public static function getRic($table, &$hasPrimaryKey = false)
    {
        $ret = [];
        if (false !== ($ai = QuickPdoInfoTool::getAutoIncrementedField($table))) {
            $ret[] = $ai;
            $hasPrimaryKey = true;
            return $ret;
        }
        return QuickPdoInfoTool::getPrimaryKey($table, null, true, $hasPrimaryKey);

    }

    public static function getPlural($word)
    {

        /**
         * http://www.ef.com/english-resources/english-grammar/singular-and-plural-nouns/
         */

        if (array_key_exists($word, self::$irregular)) {
            return self::$irregular[$word];
        }

        $lastLetter = substr($word, -1);
        switch ($lastLetter) {
            case "y":
                $word = substr($word, 0, -1) . 'ies';
                break;
            case "s":
            case "x":
            case "z":
                $word .= 'es';
                break;
            default:
                $lastTwoLetters = substr($word, -2);
                switch ($lastTwoLetters) {
                    case "ch":
                    case "sh":
                        $word .= 'es';
                        break;
                    default:
                        $word .= "s";
                        break;
                }
                break;
        }

        return $word;
    }


    /**
     * Gets the has tables for the given table.
     *
     * Basically if the given table is ek_product,
     * then it returns all table starting with ek_product_has_
     *
     *
     * @param $table
     * @return array
     * @throws \Exception
     */
    public static function getHasTables($table)
    {
        $ret = [];
        $needle = $table . "_has_";
        $tables = QuickPdoInfoTool::getTables(QuickPdoInfoTool::getDatabase());
        foreach ($tables as $table) {
            if (0 === strpos($table, $needle)) {
                $ret[] = $table;
            }
        }
        return $ret;
    }

    /**
     * Try to guess the right table of a has relationship,
     * using the given has table.
     *
     * Note: if the table name has multiple _has_
     * (for instance ek_shop_has_product_has_discount),
     * for now it assumes that the last _has_ is the separator.
     * This could/should be improved in the future.
     *
     *
     * The algorithm currently is the following:
     * - we get the right part off from the table name, call it rightCue
     * - then we take all the foreign keys from the hasTable.
     *      If the foreign table matches with $prefix$rightCue, then we consider it leads to the right table
     *
     * - if this fails, we try the following approach:
     *          see if $prefix$rightCue is a table, and return it if it matches
     * - if the approaches above fails, we return false
     *
     *
     * @return string|False
     *
     */
    public static function getHasRightTable($hasTable, $prefix = null)
    {

        if (null !== $prefix) {
            if (!is_array($prefix)) {
                $prefix = [$prefix];
            }
        }

        $p = explode('_has_', $hasTable);
        if (count($p) > 1) {
            $rightCue = array_pop($p);
//            $fkeys = QuickPdoInfoTool::getForeignKeysInfo($hasTable);
//            // first try with rightCue_id
//            foreach ($fkeys as $key => $info) {
//                $fTable = $info[1];
//                foreach ($prefix as $pre) {
//                    if ($fTable === $pre . $rightCue) {
//                        return $fTable;
//                    }
//                }
//            }


            // try the table name directly

            foreach ($prefix as $pre) {
                try {
                    $table = $pre . $rightCue;
                    if (false !== QuickPdo::fetch("select count(*) as count from $table")) {
                        return $table;
                    }
                } catch (\PDOException $e) {

                }
            }
        }
        return false;
    }


    public static function getHasLeftTable($hasTable)
    {
        $p = explode('_has_', $hasTable);
        if (count($p) > 1) {
            $table = array_shift($p);
            try {
                if (false !== QuickPdo::fetch("select count(*) as count from $table")) {
                    return $table;
                }
            } catch (\PDOException $e) {

            }
        }
        return false;
    }


    public static function getPhpDefaultValuesByTables(array $tables, array $callbacks = [])
    {


        $ret = [];
        $defaultDb = QuickPdoInfoTool::getDatabase();
        $callbacks = array_merge([
            '*' => function ($type, $isNullable, $isAutoIncremented, $nbColumns, $isForeignKey) {
                if ($isAutoIncremented) {
                    return null;
                }

                if (true === $isNullable) {
                    return null;
                } else {
                    switch ($type) {
                        case 'int':
                        case 'tinyint':
                        case 'decimal':
                            return 0;
                            break;
                        case 'date':
                            return '0000-00-00';
                            break;
                        case 'datetime':
                            return '0000-00-00 00:00:00';
                            break;
                        default:
                            return '';
                            break;
                    }
                }
            },
        ], $callbacks);


        foreach ($tables as $table) {

            list($fullTable, $db, $table) = self::explodeTable($table, $defaultDb);

            $nullables = QuickPdoInfoTool::getColumnNullabilities($fullTable);
            $types = QuickPdoInfoTool::getColumnDataTypes($fullTable);
            $ai = QuickPdoInfoTool::getAutoIncrementedField($table, $db);
            $fks = QuickPdoInfoTool::getForeignKeysInfo($table, $db);

            $nbColumns = count($types);

            foreach ($types as $column => $type) {
                $cb = (array_key_exists($type, $callbacks)) ? $callbacks[$type] : $callbacks['*'];
                $isNullable = (true === $nullables[$column]);
                $isAutoIncremented = ($ai === $column);
                $isFk = (array_key_exists($column, $fks));
                $phpVal = call_user_func($cb, $type, $isNullable, $isAutoIncremented, $nbColumns, $isFk);
                $ret[$column] = $phpVal;
            }
        }
        return $ret;
    }


    public static function renderGetMethod($column, $hint = null, array $options = [])
    {

        $sp = str_repeat(' ', 4);
        $sp2 = str_repeat(' ', 8);

        $pascal = CaseTool::snakeToFlexiblePascal($column);
        $fnName = "get" . $pascal;
        if (null !== $hint) {
            OrmToolsHelper::renderHint($s, $hint, $sp, 'return');
        }
        $s = '';
        $s .= $sp . 'public function ' . $fnName . '()' . PHP_EOL;
        $s .= $sp . '{' . PHP_EOL;
        if (array_key_exists('beforeReturn', $options)) {
            $s .= $sp2 . $options['beforeReturn'] . PHP_EOL;
        }
        $s .= $sp2 . 'return $this->' . $column . ';' . PHP_EOL;
        $s .= $sp . '}' . PHP_EOL;
        $s .= PHP_EOL;
        return $s;
    }

    public static function renderSetMethod($column, $hint = null, $setKeyword = "set", array $options = [])
    {
        $options = array_merge([
            'beginning' => '',
        ], $options);
        $beginning = $options['beginning'];


        $sp = str_repeat(' ', 4);
        $sp2 = str_repeat(' ', 8);

        $pascal = CaseTool::snakeToFlexiblePascal($column);

        $s = '';
        $fnName = $setKeyword . $pascal;
        $s .= $sp . 'public function ' . $fnName . '(';

        if (null !== $hint) {
            $objectHint = rtrim($hint, '[]');
            $s .= $objectHint . ' ';
        }

        $s .= '$' . $column . ')' . PHP_EOL;
        $s .= $sp . '{' . PHP_EOL;
        $s .= $beginning;
        $s .= $sp2 . '$this->' . $column . ' = $' . $column . ';' . PHP_EOL;
        $s .= $sp2 . 'return $this;' . PHP_EOL;
        $s .= $sp . '}' . PHP_EOL;
        $s .= PHP_EOL;
        return $s;
    }


    public static function renderConstructorDefaultValues(array $values)
    {
        $s = '';
        $c = 0;
        foreach ($values as $col => $value) {
            if (0 === $c++) {
                $sp = '';
            } else {
                $sp = str_repeat(' ', 8);
            }
            $s .= $sp . '$this->' . $col . ' = ' . var_export($value, true) . ';' . PHP_EOL;
        }
        return $s;
    }


    public static function renderStatements(array $statements)
    {
        $statements = array_unique($statements);
        $s = '';
        foreach ($statements as $statement) {
            $s .= 'use ' . $statement . ';' . PHP_EOL;
        }
        return $s;
    }

    /**
     *
     * Render the class properties declaration:
     *          private $myVar;
     *          private $myVar2;
     *          ...
     *
     *
     * @param array $colsInfo , array of column => info
     *              with:
     *                  - info: array containing:
     *                          - ?hint: string, the hint to use for this property
     * @param string $visibility
     * @return string
     */
    public static function renderClassPropertiesDeclaration(array $colsInfo, $visibility = 'private')
    {
        $s = '';
        $c = 0;
        foreach ($colsInfo as $col => $info) {
            if (0 === $c++) {
                $sp = '';
            } else {
                $sp = str_repeat(' ', 4);
            }
            $hint = $info['hint'];
            if (null !== $hint) {
                self::renderHint($s, $hint, $sp);
            }
            $s .= $sp . $visibility . ' $' . $col . ';' . PHP_EOL;
        }
        return $s;
    }

    public static function renderConstructorInit(array $colsInfo)
    {
        $s = '';
        $c = 0;
        foreach ($colsInfo as $col => $info) {
            if (0 === $c++) {
                $sp = '';
            } else {
                $sp = str_repeat(' ', 8);
            }
            $s .= $sp . '$this->' . $col . ' = ' . var_export($info['default'], true) . ';' . PHP_EOL;
        }
        return $s;

    }

    public static function renderHint(&$s, $hint, $sp = null, $kw = 'var')
    {
        if (null === $sp) {
            $sp = str_repeat(' ', 4);
        }
        $s .= $sp . '/**' . PHP_EOL;
        $s .= $sp . "* @$kw $hint" . PHP_EOL;
        $s .= $sp . "*/" . PHP_EOL;
    }


    public static function getPrettyColumn($table, array $prettyFields = [])
    {

        $prettyFields[] = 'label';
        $prettyFields[] = 'name';
        $prettyFields = array_unique($prettyFields);


        $cols = QuickPdoInfoTool::getColumnDataTypes($table);
        $found = false;
        $firstVarChar = null;
        foreach ($cols as $col => $type) {
            if (in_array($col, $prettyFields, true)) {
                $found = true;
                break;
            }
            if (null === $firstVarChar && 'varchar' === $type) {
                $firstVarChar = $col;
            }
        }

        if (false === $found) {
            if (null !== $firstVarChar) {
                $col = $firstVarChar;
            }
        }

        return $col;
    }


    /**
     * Takes a tables array: [address, seller],
     * and returns a table2Alias map: [address => a, seller => s].
     *
     * It also handles prefixes:
     * [ek_address, ek_seller]  ==> [ek_address => a, ek_seller => s]
     *
     *
     *
     *
     * @param array $tables
     * @param null $prefix
     * @return array
     * @throws \Exception
     */
    public static function getAliases(array $tables, $prefix = null, array $forbiddenAliases = [])
    {
        $ret = [];
        if (null !== $prefix) {
            if (!is_array($prefix)) {
                $prefix = [$prefix];
            }
        } else {
            $prefix = [];
        }

        $usefulTableNames = [];
        foreach ($tables as $table) {
            $found = false;
            foreach ($prefix as $p) {
                if (0 === strpos($table, $p)) {
                    $usefulTableNames[$table] = substr($table, strlen($p));
                    $found = true;
                    break;
                }
            }
            if (false === $found) {
                $usefulTableNames[$table] = $table;
            }
        }

        $usefulTableNames = array_unique($usefulTableNames);
        $c = 0;
        foreach ($usefulTableNames as $table => $name) {
            $alias = $name;
            $length = 1;
            while (true) {
                if ($c > 10000) {
                    throw new \Exception("too much tries for aliases, is that normal?");
                }
                $c++;
                $test = substr($alias, 0, $length);
                if (in_array($test, $forbiddenAliases, true)) {
                    $length++;
                    continue;
                }
                if (false === in_array($test, $ret, true)) {
                    $ret[$table] = $test;
                    break;
                }
                $length++;
            }
        }

        return $ret;
    }


    public static function getRepresentativeColumn($table)
    {
        $cols = QuickPdoInfoTool::getColumnDataTypes($table);


        $prettyCols = [
            "label",
            "name",
            "ref",
            "reference",
        ];
        foreach ($prettyCols as $col) {
            if (array_key_exists($col, $cols)) {
                return $col;
            }
        }


        foreach ($cols as $col => $type) {
            if ('varchar' === $type) {
                return $col;
            }
        }
        return $col;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function explodeTable($table, $defaultDb)
    {
        $p = explode(".", $table);
        if (1 === count($p)) {
            $db = $defaultDb;
            $table = $p[0];
        } else {
            $db = $p[0];
            $table = $p[1];
        }


        return [
            $db . "." . $table,
            $db,
            $table,
        ];
    }
}