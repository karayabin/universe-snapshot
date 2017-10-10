<?php


namespace OrmTools\Helper;


use Bat\CaseTool;
use QuickPdo\QuickPdoInfoTool;

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