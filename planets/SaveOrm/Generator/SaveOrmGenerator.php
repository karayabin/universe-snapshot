<?php


namespace SaveOrm\Generator;


use ArrayToString\ArrayToStringTool;
use Bat\CaseTool;
use Bat\FileSystemTool;
use OrmTools\Helper\OrmToolsHelper;
use QuickPdo\QuickPdoInfoTool;
use SaveOrm\Exception\GeneratorException;
use SaveOrm\Generator\Helper\SaveOrmGeneratorHelper;
use SaveOrm\Generator\Info\SaveOrmGeneratorInfo;

class SaveOrmGenerator
{

    private $configFile;
    /**
     * Cache can significantly improve performances.
     * I recommend it while developing/testing the generator.
     *
     * @var string|null,
     *          if null, the cache is not used
     *          if string, path to the cache dir (for instance /tmp/saveorm)
     */
    private $cacheDir;

    // contextual
    private $_conf;
    private $_objectsCreated;
    private $_reversedFKeys;
    private $_childrenArray;

    /**
     * @var array of hostDb.hostTable => [guestDb.guestTable,...]
     */
    private $_bindings;
    private $carriageReturn;
    private $focus; // debug table


    public function __construct()
    {
        $this->configFile = null;
        $this->cacheDir = "/tmp/saveorm";
        $this->_reversedFKeys = [];
        $this->_childrenArray = [];
        $this->_bindings = [];
        if ('cli' === PHP_SAPI) {
            $this->carriageReturn = PHP_EOL;
        } else {
            $this->carriageReturn = '<br>';
        }

//        $this->focus = "ek_shop_has_product";
    }


    public static function create()
    {
        return new static();
    }

    public function setConfigFile($file)
    {
        $this->configFile = $file;
        return $this;
    }

    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
        return $this;
    }

    public function cleanCache()
    {
        if (null !== $this->cacheDir) {
            FileSystemTool::remove($this->cacheDir);
        }
    }

    public function generate()
    {
        //--------------------------------------------
        // CHECKING CONFIGURATION FILE
        //--------------------------------------------
        $file = $this->configFile;
        if (file_exists($file)) {
            $this->prepareConf($file);


            // cache?
            if (null !== $this->cacheDir) {
                FileSystemTool::mkdir($this->cacheDir);
            }


            // creating base dir
            $baseDir = $this->getConfValue('baseDir');
            FileSystemTool::mkdir($baseDir, 0777, true);


            // initializing object collector
            $this->_objectsCreated = [];

            // generating everything
            $databases = $this->getConfValue('databases', []);


            // first do some prep work
            $this->_reversedFKeys = $this->prepareReverseForeignKeys($databases);
            $this->_childrenArray = $this->getChildrenArray($databases);
            $this->_bindings = $this->prepareBindings($this->_reversedFKeys, $this->_childrenArray);


            $tableFilters = $this->getConfValue('tables', []);
            foreach ($databases as $database) {
                $tables = $this->getAllowedTables($database, $tableFilters);
                foreach ($tables as $table) {
                    $this->doGenerate($database, $table);
                }
            }


            $tablePrefixes = $this->getConfValue('tablePrefixes', []);
            $baseDir = $this->getConfValue('baseDir');
            $baseNamespace = $this->getConfValue('baseNamespace');

            //--------------------------------------------
            // GENERATE OBJECT MANAGER
            //--------------------------------------------
            $path = $baseDir . "/GeneratedObjectManager.php";
            $tplFile = __DIR__ . "/templates/GeneratedObjectManager.tpl.php";
            $tplContent = file_get_contents($tplFile);
            $content = str_replace([
                'ChoumGeneratedObjectManager',
                'SaveOrm\TEST',
                '[]',
            ], [
                "GeneratedObjectManager",
                $baseNamespace,
                ArrayToStringTool::toPhpArray($tablePrefixes, null, 12),

            ], $tplContent);
            FileSystemTool::mkfile($path, $content);


            //--------------------------------------------
            // GENERATE BASE OBJECT
            //--------------------------------------------
            $path = $baseDir . "/GeneratedBaseObject.php";
            $tplFile = __DIR__ . "/templates/GeneratedBaseObject.tpl.php";
            $tplContent = file_get_contents($tplFile);
            $content = str_replace([
                'CoumeGeneratedBaseObject',
                'SaveOrm\Test',
            ], [
                "GeneratedBaseObject",
                $baseNamespace,
            ], $tplContent);
            FileSystemTool::mkfile($path, $content);


        } else {
            $this->error("configFile not found: $file");
        }
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function log($msg) // override me
    {
        throw new GeneratorException($msg);
    }

    /**
     * This algorithm is not perfect; it works in most cases but you might encounter
     * cases where it fails.
     *
     *
     * @return array of children relationships:
     *
     *      - leftDb.leftTable => [middleDb.middleTable, rightDb.rightTable, middleTableLeftForeignKey, middleTableRightForeignKey]
     *      - ...
     *
     */
    protected function doGetChildrenArray(array $databases)
    {
        $ret = [];
        $kws = $this->getConfValue("childrenDetectionKeywords", []);
        $ignore = $this->getConfValue("childrenDetectionKeywordsExceptions", []);
        if ($kws) {
            foreach ($databases as $db) {
                $tables = QuickPdoInfoTool::getTables($db);
                foreach ($tables as $table) {

                    if (in_array("$db.$table", $ignore)) {
                        continue;
                    }

                    foreach ($kws as $kw) {
                        if (false !== strpos($table, $kw)) {

                            $p = explode($kw, $table);
                            /**
                             * Note: we consider the last prefix only in case of multiple
                             * prefixes are in the same table name (i.e. ekev_event_has_course_has_participant),
                             * that's because the has relationship is made on a table which already has
                             * an has relationship.
                             */
                            $right = array_pop($p);
                            $left = implode($kw, $p);

                            $left = $this->stripTablePrefixes($left);
                            $right = $this->stripTablePrefixes($right);


                            /**
                             * we want the longest to be the first, in
                             * case the shortest is contained in the longest, thus
                             * creating more problems...
                             */

                            if (strlen($left) > strlen($right)) {
                                $both = [$left, $right];
                            } else {
                                $both = [$right, $left];
                            }

                            $sides = [];
                            $leftTable = null;
                            $rightTable = null;
                            $fks = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
                            $foundCols = [];
                            foreach ($both as $side) {
                                foreach ($fks as $col => $fkInfo) {
                                    if (!in_array($col, $foundCols)) {
                                        if (false !== strpos($fkInfo[1], $side)) {
                                            $sides[$side] = [$fkInfo[0], $fkInfo[1], $col];
                                            $foundCols[] = $col;
                                        }
                                    }
                                }
                            }


                            if (2 === count($sides)) {
                                $ret[$sides[$left][0] . '.' . $sides[$left][1]][] = [
                                    $db . '.' . $table,
                                    $sides[$right][0] . "." . $sides[$right][1],
                                    $sides[$left][2],
                                    $sides[$right][2],
                                ];

                            } else {
//                                az("oops", $table, $sides, $both, $fks);
                                $this->log("The algorithm to find children tables failed with table $table (detected as a children method, but couldn't define the left and right members)");

                            }
                        }
                    }
                }
            }
        }
        return $ret;
    }

    protected function say($msg)
    {
        echo $msg . $this->carriageReturn;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Generating everything for a given object
     */
    private function doGenerate($database, $table, $generateType = null)
    {

        if (null !== $this->focus && $table !== $this->focus) {
            return;
        }
        $fullTable = "$database.$table";
        if (!in_array($fullTable, $this->_objectsCreated)) {
            $this->say("generate $fullTable");

            $this->_objectsCreated[] = $fullTable;


            $info = $this->getInfo($database, $table);


            $bindings = $this->getBindings($database, $table);
            $children = $this->getChildren($database, $table);
            $info->setBindings($bindings);
            $info->setChildren($children);


            //--------------------------------------------
            // BINDINGS
            //--------------------------------------------
            foreach ($bindings as $binding) {
                list($_db, $_table) = explode('.', $binding);
                $this->doGenerate($_db, $_table, 'binding');
            }

            //--------------------------------------------
            // SIBLINGS
            //--------------------------------------------
            $fks = $info->getForeignKeys();
            foreach ($fks as $fk => $fkInfo) {
                $this->doGenerate($fkInfo[0], $fkInfo[1], 'sibling');
            }


            //--------------------------------------------
            // CHILDREN
            //--------------------------------------------
            if (count($children) > 0) {
                foreach ($children as $child) {
                    list($_db, $_table) = explode(".", $child[0]);
                    $this->doGenerate($_db, $_table, 'childrenMiddle');

                    list($_db, $_table) = explode(".", $child[1]);
                    $this->doGenerate($_db, $_table, 'childrenRight');
                }
            }


            $this->generateObjects($database, $table, $info);


        }
    }


    private function prepareBindings(array $reversedFKeys, array $children)
    {
        $ret = $reversedFKeys;

        $middles = [];
        foreach ($children as $left => $allInfo) {
            foreach ($allInfo as $info) {
                $middles[] = $info[0];
            }
        }
        $middles = array_unique($middles);

        foreach ($ret as $col => $tables) {
            foreach ($tables as $k => $table) {
                if (in_array($table, $middles)) {
                    unset($ret[$col][$k]);
                }
            }
        }
        return $ret;
    }


    private function getChildren($db, $table)
    {
        if (array_key_exists("$db.$table", $this->_childrenArray)) {
            return $this->_childrenArray["$db.$table"];
        }
        return [];
    }


    private function stripTablePrefixes($table)
    {
        $prefixes = $this->getConfValue('tablePrefixes', []);
        foreach ($prefixes as $prefix) {
            if (0 === strpos($table, $prefix)) {
                return substr($table, strlen($prefix));
            }
        }
        return $table;
    }


    private function getBindings($db, $table)
    {
        $full = "$db.$table";
        if (array_key_exists($full, $this->_bindings)) {
            return array_unique($this->_bindings[$full]);
        }
        return [];
    }

    /**
     * return array:
     * - $referencedDb:
     *     - $referencedTable:
     *          - $foreignKeyDb.$foreignKeyTable
     *
     *
     */
    private function prepareReverseForeignKeys(array $databases)
    {
        return $this->tryFromCache($databases, function () use ($databases) {
            $ret = [];
            foreach ($databases as $database) {
                $tables = QuickPdoInfoTool::getTables($database);
                foreach ($tables as $table) {
                    $fks = QuickPdoInfoTool::getForeignKeysInfo($table, $database);
                    foreach ($fks as $col => $fkInfo) {
                        list($fdb, $ftable, $fcol) = $fkInfo;
                        $ret["$fdb.$ftable"][] = "$database.$table";
                    }
                }
            }
            return $ret;
        });
    }


    private function getChildrenArray(array $databases)
    {
        $ids = $databases;
        $ids[] = '_children_'; // databases is already used as an identifier by another method...

        return $this->tryFromCache($ids, function () use ($databases) {
            return $this->doGetChildrenArray($databases);
        });
    }

    private function tryFromCache($input, callable $getContentFn)
    {
        if (null !== $this->cacheDir) {

            if (is_array($input)) {
                $input = implode("", $input);
            }
            $hash = hash("md5", (string)$input);
            $file = $this->cacheDir . "/$hash";
            if (file_exists($file)) {
                return unserialize(file_get_contents($file));
            } else {
                $content = call_user_func($getContentFn);
                FileSystemTool::mkfile($file, serialize($content));
                return $content;
            }
        }
        return call_user_func($getContentFn);
    }


    private function getInfo($database, $table)
    {
        $ret = SaveOrmGeneratorInfo::create($database, $table);
        $ret->setConf($this->_conf);
        return $ret;
    }

    private function generateObjects($database, $table, SaveOrmGeneratorInfo $info)
    {
        //--------------------------------------------
        // PREPARING INFORMATION
        //--------------------------------------------
        $tablePrefixes = $this->getConfValue('tablePrefixes', []);
        $relativePath = SaveOrmGeneratorHelper::getObjectRelativePath($table, $tablePrefixes);
        $elements = explode('/', $relativePath);
        $className = str_replace(' ', '_', array_pop($elements));

        $sNamespace = implode('\\', $elements);
        $generatedClassName = "Generated" . $className;
        $generatedObjectTplFile = __DIR__ . "/templates/GeneratedObject.tpl.php";
        $generatedObjectTplContent = file_get_contents($generatedObjectTplFile);

        $baseDir = $this->getConfValue('baseDir');
        $baseNamespace = $this->getConfValue('baseNamespace');

        $sRelativeInnerPath = "";
        if ($elements) {
            $sRelativeInnerPath = "/" . implode('/', $elements);
        }
        $generatedFilePath = $baseDir . "/GeneratedObject" . $sRelativeInnerPath . "/$generatedClassName.php";
        $generatedNamespace = $baseNamespace . "\\GeneratedObject";
        if (!empty($sNamespace)) {
            $generatedNamespace .= '\\' . $sNamespace;
        }


        $colsInfo = $info->getColumnsInfo();
        $tableProps = QuickPdoInfoTool::getColumnNames($table, $database);


        $sDefine = OrmToolsHelper::renderClassPropertiesDeclaration($colsInfo);
        $sConstructor = OrmToolsHelper::renderConstructorInit($colsInfo);
        $sp = str_repeat(' ', 8);
        $sConstructor .= PHP_EOL;
        $sConstructor .= $sp . '$this->_tableProps = ' . ArrayToStringTool::toPhpArray($tableProps, false, 8) . ';' . PHP_EOL;


        $sAccessors = $this->computeAccessors($colsInfo, $tableProps);
        $sUse = OrmToolsHelper::renderStatements($info->getStatements());


        //--------------------------------------------
        // GENERATING CREATE BY METHOD
        //--------------------------------------------
        $sCreateBy = '';
        $uniqueSets = [];
        $uniqueIndexes = QuickPdoInfoTool::getUniqueIndexes($database . "." . $table);
        if (count($uniqueIndexes) > 0) {
            $uniqueSets = $uniqueIndexes;
        }
        $_pk = $info->getPrimaryKey();
        if (count($_pk) > 0) {
            $uniqueSets[] = $_pk;
        }
        $ric = $info->getRic();
        if (count($ric) > 0) {
            $uniqueSets[] = $ric;
        }
        $sCreateBy = $this->renderCreateByMethod($table, $info->getObjectProperties(), $uniqueSets);


        //--------------------------------------------
        // GENERATING GENERATED OBJECTS
        //--------------------------------------------
        $content = str_replace([
            'SaveOrm\Object\Ekev',
            'SaveOrm\Test\GeneratedBaseObject',
            'XXOBJECTXXX',
            '// use',
            '// define',
            '// createBy',
            '// constructor',
            '// accessors',
        ], [
            $generatedNamespace,
            $baseNamespace . '\\GeneratedBaseObject',
            $generatedClassName,
            $sUse,
            $sDefine,
            $sCreateBy,
            $sConstructor,
            $sAccessors,

        ], $generatedObjectTplContent);


        FileSystemTool::mkfile($generatedFilePath, $content);


        //--------------------------------------------
        // GENERATE USER OBJECT (only if not exist)
        //--------------------------------------------
        $filePath = $baseDir . "/Object" . $sRelativeInnerPath . "/$className.php";
        $namespace = $baseNamespace . "\\Object";
        if (!empty($sNamespace)) {
            $namespace .= '\\' . $sNamespace;
        }

        if (false === file_exists($filePath)) {

            $objectTplFile = __DIR__ . "/templates/Object.tpl.php";
            $objectTplContent = file_get_contents($objectTplFile);
            $sUse = 'use ' . $generatedNamespace . '\\' . $generatedClassName . ';' . PHP_EOL;


            $content = str_replace([
                'OOCourseObject',
                'GENERATEDObject',
                'SaveOrm\Object\Ekev',
                '// use',
            ], [
                $className,
                $generatedClassName,
                $namespace,
                $sUse,

            ], $objectTplContent);

            FileSystemTool::mkfile($filePath, $content);
        }


        //--------------------------------------------
        // GENERATE OBJECT MANAGER CONF
        //--------------------------------------------
        $ai = $info->getAutoIncrementedField();
        if (false === $ai) {
            $ai = null;
        }


        $unit = [
            'table' => $table,
            'prefix' => $this->getUsedPrefix($table, $tablePrefixes),
            'properties' => $info->getObjectProperties(),
            'fks' => $this->formatForeignKeys($info->getForeignKeys()),
            'uniqueIndexes' => $uniqueIndexes,
            'ai' => $ai,
            'primaryKey' => $info->getPrimaryKey(),
            'bindings' => $info->getBindings(),

        ];
        $ric = $this->getRic($database, $table);
        if (count($ric) > 0) {
            $unit['ric'] = $ric;
        }
        $children = $info->getChildren();
        if (count($children) > 0) {
            $unit['childrenTables'] = $this->formatChildren($children);
        }

        $key = $namespace . '\\' . $className;
        $class = substr($className, 0, -6) . 'Conf'; // replace trailing Object by Conf
        $namespaceConf = str_replace('\\Object\\', '\\Conf\\', $namespace);
        $confPath = str_replace([
            '/Object/',
            'Object.php',
        ], [
            '/Conf/',
            'Conf.php',
        ], $filePath);
        $confTplFile = __DIR__ . "/templates/Conf.tpl.php";
        $confTplContent = file_get_contents($confTplFile);
        $content = str_replace([
            'OOCourseObject',
            'SaveOrm\Object\Ekev',
            '[]',
        ], [
            $class,
            $namespaceConf,
            ArrayToStringTool::toPhpArray($unit, null, 4),

        ], $confTplContent);

        FileSystemTool::mkfile($confPath, $content);


    }


    private function renderCreateByMethod($table, array $columns, array $uniqueSets)
    {
        $s = '';
        $sp = str_repeat(' ', 4);
        $sp2 = str_repeat(' ', 8);
        $sp3 = str_repeat(' ', 12);
        $sp4 = str_repeat(' ', 16);


        if ($uniqueSets) {


            $s .= PHP_EOL;
            $s .= $sp . '//--------------------------------------------' . PHP_EOL;
            $s .= $sp . '//' . PHP_EOL;
            $s .= $sp . '//--------------------------------------------' . PHP_EOL;

            foreach ($uniqueSets as $uniqueSet) {
                $cols = [];
                $vars = [];
                $pascals = [];


                foreach ($uniqueSet as $column) {
                    $cols[] = $column;
                    $vars[] = '$' . $column;
                    $pascals[] = CaseTool::snakeToFlexiblePascal($column);
                }


                $fnName = 'createBy' . implode('', $pascals);
                $s .= $sp . 'public static function ' . $fnName . '(';
                $s .= implode(', ', $vars) . ')' . PHP_EOL;
                $s .= $sp . '{' . PHP_EOL;
                $s .= $sp2 . '$ret = self::create();' . PHP_EOL;
                $s .= $sp2 . '$ret->_mode = \'update\';' . PHP_EOL;

                $s .= $sp2 . '$ret->_where = [' . PHP_EOL;
                foreach ($cols as $col) {
                    $s .= $sp3 . "'$col' => \$$col," . PHP_EOL;
                }
                $s .= $sp2 . '];' . PHP_EOL;

                $s .= $sp2 . '$ret->_whereQuery = "select * from `' . $table . '` where ';
                $c = 0;
                foreach ($cols as $col) {
                    if (0 !== $c++) {
                        $s .= ' and ';
                    }
                    $s .= '`' . $col . '`=:' . $col;
                }
                $s .= '";' . PHP_EOL;

                $s .= $sp2 . 'return $ret;' . PHP_EOL;
                $s .= $sp . '}' . PHP_EOL;
                $s .= PHP_EOL;
            }
        }
        return $s;
    }


    private function getUsedPrefix($table, $tablePrefixes)
    {
        foreach ($tablePrefixes as $prefix) {
            if (0 === strpos($table, $prefix)) {
                return $prefix;
            }
        }
        return "";
    }


    private function formatChildren(array $children)
    {
        $ret = [];
        foreach ($children as $child) {
            list($middleTable, $rightTable) = $child;
            list($rightDb, $rightTable) = explode('.', $rightTable);
            $ret[] = [$rightTable, $child[2], $child[3]];
        }
        return $ret;
    }

    private function formatForeignKeys(array $fks)
    {
        $ret = [];
        foreach ($fks as $col => $fk) {
            $ret[$col] = [$fk[1], $fk[2]];
        }
        return $ret;
    }

    private function getRic($db, $table)
    {
        $ret = [];
        $rics = $this->getConfValue('ric', []);
        if (array_key_exists("$db.$table", $rics)) {
            return $rics["$db.$table"];
        }
        return $ret;
    }


    private function computeAccessors(array $colsInfo, array $tableProps)
    {
        $s = '' . PHP_EOL;
        $sp = str_repeat(' ', 4);
        $sp2 = str_repeat(' ', 8);
        $sp3 = str_repeat(' ', 12);

        foreach ($colsInfo as $col => $info) {


            $pascal = CaseTool::snakeToFlexiblePascal($col);


            // getter
            $hint = $info['hint'];
            if (null !== $hint) {
                OrmToolsHelper::renderHint($s, $hint, $sp, 'return');
            }
            if (in_array($col, $tableProps)) {
                $s .= OrmToolsHelper::renderGetMethod($col, $hint, [
                    'beforeReturn' => '$this->_resolveUpdate();',
                ]);
            } else {
                $s .= OrmToolsHelper::renderGetMethod($col, $hint);
            }


            // setter
            $type = $info['type'];
            switch ($type) {
                case "binding":
                    $s .= OrmToolsHelper::renderSetMethod($col, $hint, 'create');
                    break;
                case "children":
                    $pascal = CaseTool::snakeToFlexiblePascal($info['singular']);
                    $fnName = "add" . $pascal;
                    $s .= $sp . 'public function ' . $fnName . '(';
                    $objectHint = rtrim($hint, '[]');
                    $s .= $objectHint . ' ';
                    $s .= '$' . $info['singular'] . ', ';
                    $s .= $info['middleClass'] . ' $' . $info['middleProp'] . ' = null';
                    $s .= ')' . PHP_EOL;
                    $s .= $sp . '{' . PHP_EOL;

                    $s .= $sp2 . 'if (null === $' . $info['middleProp'] . ') {' . PHP_EOL;
                    $s .= $sp3 . '$' . $info['middleProp'] . ' = ' . $info['middleClass'] . '::createUpdate();' . PHP_EOL;
                    $s .= $sp2 . '}' . PHP_EOL;

                    $s .= $sp2 . '$this->' . $col . '[] = $' . $info['singular'] . ';' . PHP_EOL;
                    $s .= $sp2 . '$' . $info['singular'] . '->_has_ = $' . $info['middleProp'] . ';' . PHP_EOL;
                    $s .= $sp2 . 'return $this;' . PHP_EOL;
                    $s .= $sp . '}' . PHP_EOL;
                    $s .= PHP_EOL;
                    break;
                default:
                    $s .= OrmToolsHelper::renderSetMethod($col, $hint, 'set', [
                        'beginning' => $sp2 . '$this->_changedProperties[] = "' . $col . '";' . PHP_EOL,
                    ]);
                    break;
            }


        }
        return $s;
    }


    private function getAllowedTables($database, $tables)
    {
        $dbTables = QuickPdoInfoTool::getTables($database);
        if (array_key_exists($database, $tables)) {
            $filters = $tables[$database];
            if (is_array($filters)) {
                $ret = [];
                foreach ($filters as $filter) {
                    if (false === strpos($filter, ' * ')) {
                        $ret[] = $filter;
                    } else {
                        $pattern = '!' . $filter . '!';
                        foreach ($dbTables as $table) {
                            if (preg_match($pattern, $table, $match)) {
                                $ret[] = $table;
                            }
                        }
                    }
                }
                $ret = array_unique($ret);
                return $ret;
            } else {
                $this->error("unknown filters with type " . gettype($filters));
            }
        }
        $dbTables = array_unique($dbTables);
        return $dbTables;
    }

    private function getConfValue($key, $default = 'throw')
    {
        if (array_key_exists($key, $this->_conf)) {
            return $this->_conf[$key];
        }
        if ('throw' === $default) {
            $this->error("config value not found with key $key");
        }
        return $default;
    }

    private function prepareConf($file)
    {
        // loading conf
        $conf = [];
        require $file;
        $this->_conf = $conf;
    }


    private function error($msg)
    {
        throw new GeneratorException($msg);
    }
}