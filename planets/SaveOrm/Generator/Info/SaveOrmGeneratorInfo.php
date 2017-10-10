<?php


namespace SaveOrm\Generator\Info;

use OrmTools\Helper\OrmToolsHelper;
use QuickPdo\QuickPdoInfoTool;
use SaveOrm\Exception\GeneratorException;
use SaveOrm\Generator\Helper\SaveOrmGeneratorHelper;

class SaveOrmGeneratorInfo
{

    private $database;
    private $table;
    //
    private $colsInfo;
    private $objectProps;
    private $statements;
    private $foreignKeys;
    private $primaryKey;
    //
    private $conf;
    private $bindings;
    private $children;
    private $ai;
    private $ric;

    //
    private $prepared;


    public function __construct($database, $table)
    {
        $this->colsInfo = [];
        $this->objectProps = [];
        $this->statements = [];
        $this->foreignKeys = [];
        $this->primaryKey = [];
        $this->prepared = false;
        $this->database = $database;
        $this->table = $table;
        $this->ai = false; // false|string
        //
        $this->bindings = [];
        $this->children = [];
        $this->ric = [];
    }

    public static function create($database, $table)
    {
        return new static($database, $table);
    }

    public function getColumnsInfo()
    {
        $this->prepare();
        return $this->colsInfo;
    }

    public function getStatements()
    {
        $this->prepare();
        return $this->statements;
    }


    public function getForeignKeys()
    {
        $this->prepare();
        return $this->foreignKeys;
    }

    public function setConf(array $conf)
    {
        $this->conf = $conf;
        return $this;
    }

    public function setBindings(array $bindings)
    {
        $this->bindings = $bindings;
        return $this;
    }

    public function getBindings()
    {
        return $this->bindings;
    }


    public function setChildren(array $children)
    {
        $this->children = $children;
        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }


    /**
     * @return false|string
     */
    public function getAutoIncrementedField()
    {
        $this->prepare();
        return $this->ai;
    }

    /**
     * @return array
     */
    public function getPrimaryKey()
    {
        $this->prepare();
        return $this->primaryKey;
    }


    /**
     * @return array
     */
    public function getObjectProperties()
    {
        $this->prepare();
        return $this->objectProps;
    }


    /**
     * @return array
     */
    public function getRic()
    {
        $this->prepare();
        return $this->ric;
    }






    //--------------------------------------------
    //
    //--------------------------------------------
    private function prepare()
    {
        if (false === $this->prepared) {
            $fullTable = "$this->database.$this->table";
            $this->prepared = true;
            $defaultValues = $this->getTableDefaultValues($this->table);
            $this->objectProps = array_keys($defaultValues);
            $this->ai = QuickPdoInfoTool::getAutoIncrementedField($this->table, $this->database);
            $this->foreignKeys = QuickPdoInfoTool::getForeignKeysInfo($this->table, $this->database);
            $this->primaryKey = QuickPdoInfoTool::getPrimaryKey($this->table, $this->database);
            $rics = $this->getConfValue('ric', []);
            if (array_key_exists($fullTable, $rics)) {
                $this->ric = $rics[$fullTable];
            }


            $statements = [];
            $colsInfo = [];
            foreach ($defaultValues as $col => $val) {
                $hint = null;
                $colsInfo[$col] = [
                    'default' => $val,
                    'hint' => $hint,
                    'type' => "default",
                ];
            }


            //--------------------------------------------
            // BINDINGS
            //--------------------------------------------
            if (count($this->bindings) > 0) {


                foreach ($this->bindings as $binding) {
                    list($db, $table) = explode(".", $binding);
                    list($prop, $class, $usePath) = $this->getLinkInfo($table);
                    $colsInfo[$prop] = [
                        'default' => null,
                        'hint' => "$class",
                        'type' => "binding",
                    ];
                    $statements[] = $usePath;
                }
            }


            //--------------------------------------------
            // SIBLINGS
            //--------------------------------------------
            if (count($this->foreignKeys) > 0) {
                foreach ($this->foreignKeys as $fkInfo) {
                    $table = $fkInfo[1];
                    list($prop, $class, $usePath) = $this->getLinkInfo($table);
                    $colsInfo[$prop] = [
                        'default' => null,
                        'hint' => "$class",
                        'type' => "sibling",
                    ];
                    $statements[] = $usePath;
                }
            }


            //--------------------------------------------
            // CHILDREN
            //--------------------------------------------
            if (count($this->children) > 0) {
                foreach ($this->children as $_info) {
                    list($middle, $right) = $_info;
                    list($rightDb, $rightTable) = explode(".", $right);
                    list($middleDb, $middleTable) = explode(".", $middle);


                    list($prop, $class, $usePath) = $this->getLinkInfo($rightTable);
                    list($prop2, $class2, $usePath2) = $this->getLinkInfo($middleTable);
                    $props = OrmToolsHelper::getPlural($prop);
                    $colsInfo[$props] = [
                        'default' => [],
                        'hint' => $class . "[]",
                        'type' => "children",
                        'singular' => $prop,
                        'middleProp' => $prop2,
                        'middleClass' => $class2,
                    ];
                    $statements[] = $usePath;
                    $statements[] = $usePath2;
                }
            }


            $this->colsInfo = $colsInfo;
            $this->statements = $statements;
        }
    }


    private function getLinkInfo($table)
    {

        $tablePrefixes = $this->getConfValue('tablePrefixes', []);
        $baseNamespace = $this->getConfValue('baseNamespace');
        $usedPrefix = null;
        $relativePath = SaveOrmGeneratorHelper::getObjectRelativePath($table, $tablePrefixes, $usedPrefix);
        $useRelativePath = str_replace('/', '\\', $relativePath);
        $usePath = $baseNamespace . "\\Object\\" . $useRelativePath;
        $p = explode('/', $relativePath);
        $class = array_pop($p);
        $table = $this->stripTablePrefixes($table, $tablePrefixes);
        $prop = $table;

        if (null !== $usedPrefix) {
            $prefix = SaveOrmGeneratorHelper::toPascal($usedPrefix);
            $class = $prefix . $class;
            $p = explode('\\', $usePath);
            $newUsePath = array_pop($p);
            $usePath .= ' as ' . $prefix . $newUsePath;
        }

        return [$prop, $class, $usePath];

    }

    private function getTableDefaultValues($table)
    {
        return OrmToolsHelper::getPhpDefaultValuesByTables([$table], [
            '*' => function ($type, $isNullable, $isAutoIncremented, $nbColumns, $isForeignKey) {
                if (
                    true === $isAutoIncremented ||
                    true === $isNullable ||
                    true === $isForeignKey
                ) {
                    return null;
                }
                switch ($type) {
                    case 'int':
                    case 'tinyint':
                    case 'decimal':
                        return 0;
                        break;
                    default:
                        return '';
                        break;
                }
            },
        ]);
    }

    private function stripTablePrefixes($table, array $prefixes)
    {
        foreach ($prefixes as $prefix) {
            if (0 === strpos($table, $prefix)) {
                return substr($table, strlen($prefix));
            }
        }
        return $table;
    }

    private function getConfValue($key, $default = 'throw')
    {
        if (array_key_exists($key, $this->conf)) {
            return $this->conf[$key];
        }
        if ('throw' === $default) {
            $this->error("config value not found with key $key");
        }
        return $default;
    }

    private function error($msg)
    {
        throw new GeneratorException($msg);
    }

}