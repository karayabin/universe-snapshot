<?php


namespace CrudGeneratorTools\Skinny;


use ArrayToString\ArrayToStringTool;
use Bat\FileSystemTool;
use QuickPdo\QuickPdo;
use QuickPdo\Util\QuickPdoInfoCacheUtil;

class SkinnyTypeUtil
{
    private $cacheDir;

    /**
     * @var QuickPdoInfoCacheUtil
     */
    protected $quickPdoInfoCache;
    private $onTypesGeneratedCb;


    public function __construct()
    {
        $this->cacheDir = "/tmp/SkinnyUtil";
    }

    public static function create()
    {
        return new static();
    }

    public function setOnTypesGeneratedCb(callable $onTypesGeneratedCb)
    {
        $this->onTypesGeneratedCb = $onTypesGeneratedCb;
        return $this;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Return the skinny types for a given table, or false if there aren't
     *
     * @param $db
     * @param $table
     * @param bool $useCache
     * @return array|false
     */
    public function getTypes($db, $table)
    {
        $this->prepare();
        $manualFile = $this->cacheDir . "/manual/$db.php";
        $autoFile = $this->getAutoFile($db);

        $types = [];
        if (file_exists($manualFile)) {
            include $manualFile;
        } else {
            if (file_exists($autoFile)) {
                include $autoFile;
            } else {
                $this->generateTypes($db, $autoFile, $table);
                include $autoFile;
            }
        }
        if (array_key_exists($table, $types)) {
            return $types[$table];
        }
        return false;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setCacheDir($cacheDir)
    {
        $this->cacheDir = $cacheDir;
        return $this;
    }

    public function cleanCache()
    {
        FileSystemTool::remove($this->cacheDir);
    }

    public function setQuickPdoInfoCache(QuickPdoInfoCacheUtil $quickPdoInfoCache)
    {
        $this->quickPdoInfoCache = $quickPdoInfoCache;
        return $this;
    }


    public function prepareDb($db)
    {
        $this->generateTypes($db, $this->getAutoFile($db));
    }


    //--------------------------------------------
    //
    //--------------------------------------------
    protected function prepare()
    {
        if (null === $this->quickPdoInfoCache) {
            $this->quickPdoInfoCache = QuickPdoInfoCacheUtil::create();
        }
    }

    protected function generateTypes($db, $file)
    {
        $table2Types = $this->getTable2Types($db);
        $sItems = ArrayToStringTool::toPhpArray($table2Types);
        $c = <<<EEE
<?php

\$types = $sItems;

EEE;
        if (null !== $this->onTypesGeneratedCb) {
            call_user_func($this->onTypesGeneratedCb, $file);
        }
        FileSystemTool::mkfile($file, $c);
    }

    protected function getTable2Types($db)
    {
        $tables = $this->quickPdoInfoCache->getTables($db);
        $table2Types = [];
        foreach ($tables as $table) {
            $types = $this->quickPdoInfoCache->getColumnDataTypes($db . "." . $table);
            $detailedTypes = $this->quickPdoInfoCache->getColumnDataTypes($db . "." . $table, true);
            $fks = $this->quickPdoInfoCache->getForeignKeysInfo($table, $db);
            $nullables = $this->quickPdoInfoCache->getColumnNullabilities($db . "." . $table);
            $autoIncField = $this->quickPdoInfoCache->getAutoIncrementedField($db . '.' . $table);

            $column2SkinnyType = [];
            foreach ($types as $column => $type) {


                $detailedType = $detailedTypes[$column];
                $isAutoInc = ($column === $autoIncField);
                $foreignKey = (array_key_exists($column, $fks)) ? $fks[$column] : null;
                $isNullable = $nullables[$column];

                if (false !== $skinnyType = ($this->getSkinnyType($column, $table, $db, $type, $detailedType, $isAutoInc, $foreignKey, $isNullable))) {
                    $column2SkinnyType[$column] = $skinnyType;
                }
            }
            $table2Types[$table] = $column2SkinnyType;
        }
        return $table2Types;
    }

    protected function getSkinnyType($column, $table, $db, $type, $detailedType, $isAutoInc, $foreignKey, $isNullable)
    {
        $ret = false;
        if (true === $isAutoInc) {
            $ret = 'auto_increment';
        } else {
            if (null !== $foreignKey) {
                $fDb = $foreignKey[0];
                $fTable = $foreignKey[1];


                $lotOfItems = false;

                $q = "select count(*) as count from $fDb.$fTable";
                if (false !== ($ret = QuickPdo::fetch($q))) {
                    $nbItems = $ret["count"];
                    if ($nbItems > 365) {
                        $lotOfItems = true;
                    }
                }
                if (false === $lotOfItems) {
                    $ret = "selectForeignKey";
                } else {
                    $ret = "autocomplete";
                }
            } else {
                switch ($type) {
                    case 'text':
                        $ret = 'textarea';
                        break;
                    case 'date':
                        $ret = 'date';
                        break;
                    case 'datetime':
                        $ret = 'datetime';
                        break;
                    default:


                        if ('tinyint(1)' === $detailedType) {
                            $ret = 'switch';
                        } elseif (
                            $this->contains($column, 'photo') ||
                            $this->contains($column, 'image') ||
                            $this->contains($column, 'avatar')
                        ) {
                            $ret = 'upload';
                        } elseif ($this->contains($column, 'color')) {
                            $ret = 'color';
                        } elseif (
                            'pass' === $column ||
                            'password' === $column
                        ) {
                            $ret = 'pass';
                        } else {
                            $ret = 'input';
                        }
                        break;
                }
            }
        }
        if (false !== $ret) {
            $this->onTypeChosen($ret, $column, $table, $db, $type, $detailedType, $isAutoInc, $foreignKey, $isNullable);
        }
        return $ret;
    }


    protected function onTypeChosen(&$chosenType, $column, $table, $db, $type, $detailedType, $isAutoInc, $foreignKey, $isNullable)
    {

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function contains($haystack, $needle)
    {
        return (false !== strpos($haystack, $needle));
    }

    private function getAutoFile($db)
    {
        return $this->cacheDir . "/auto/$db.php";
    }

}