<?php


namespace Ling\XiaoApi\Generator\ObjectGenerator;

use Ling\ArrayToString\ArrayToStringTool;
use Ling\Bat\FileSystemTool;
use Ling\QuickPdo\QuickPdoInfoTool;
use Ling\XiaoApi\Generator\ObjectGenerator\Exception\ObjectGeneratorException;
use Ling\XiaoApi\Helper\GeneralHelper\GeneralHelper;

class DbObjectGenerator
{

    private $namespace;
    private $targetDirectory;
    private $tablePrefix;
    private $useDbPrefix;


    public function __construct()
    {
        $this->useDbPrefix = true;
    }

    public static function create()
    {
        return new static();
    }

    public function setUseDbPrefix($useDbPrefix)
    {
        $this->useDbPrefix = $useDbPrefix;
        return $this;
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function setTargetDirectory($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
        return $this;
    }

    public function setTablePrefix($tablePrefix)
    {
        $this->tablePrefix = $tablePrefix;
        return $this;
    }


    public function generateByDatabase($db)
    {

        if (null === $this->targetDirectory) {
            throw new ObjectGeneratorException("targetDirectory not set");
        }

        $tables = QuickPdoInfoTool::getTables($db);
        $f = file_get_contents(__DIR__ . "/assets/GeneratedExampleObject.tpl.php");

        $s = '';
        foreach ($tables as $table) {


            //--------------------------------------------
            // GENERATING GENERATED CLASSES
            //--------------------------------------------
            /**
             * ...Only if they start with the chosen prefix
             */
            if (0 !== strpos($table, $this->tablePrefix)) {
                continue;
            }


            $ClassName = GeneralHelper::tableNameToClassName($table, $this->tablePrefix);

            $fullTable = $db . "." . $table;

            $nullables = QuickPdoInfoTool::getColumnNullabilities($fullTable);
            $types = QuickPdoInfoTool::getColumnDataTypes($fullTable);
            $ai = QuickPdoInfoTool::getAutoIncrementedField($table, $db);
            $primaryKey = QuickPdoInfoTool::getPrimaryKey($table, $db);


            $nfInt = [];
            $nfStr = [];
            $sDefaults = '';
            $dPrefix = "\t\t\t";


            /**
             * If your table only contains one column which is an auto-incremented field,
             * this is a special case, otherwise, it's standard
             */
            if (1 === count($types) && $ai === key($types)) {
                $column = key($types);
                $sDefaults .= $dPrefix . "'$column' => null," . PHP_EOL;
            } else {

                foreach ($types as $column => $type) {
                    if ($ai === $column) {
                        $sDefaults .= $dPrefix . "'$column' => null," . PHP_EOL;
                        continue;
                    }

                    if (true === $nullables[$column]) {
                        $sDefaults .= $dPrefix . "'$column' => null," . PHP_EOL;
                        if (true === $this->isOfTypeNumber($type)) {
                            $nfInt[] = $column;
                        } else {
                            $nfStr[] = $column;
                        }
                    } else {
                        switch ($type) {
                            case 'int':
                            case 'tinyint':
                                $sDefaults .= $dPrefix . "'$column' => 0," . PHP_EOL;
                                break;
                            default:
                                $sDefaults .= $dPrefix . "'$column' => ''," . PHP_EOL;
                                break;
                        }
                    }
                }
            }


            $s = '';
            foreach ($nfInt as $field) {

                $s .= <<<EEE
        if (0 === (int)\$ret["$field"]) {
            \$ret["$field"] = null;
        }
EEE;
                $s .= PHP_EOL;
            }

            foreach ($nfStr as $field) {

                $s .= <<<EEE
        if ("" === \$ret["$field"]) {
            \$ret["$field"] = null;
        }
EEE;
                $s .= PHP_EOL;
            }


            $theClassName = "Generated" . $ClassName;
            $sArr = '[' . PHP_EOL . $sDefaults . "\t\t" . ']';


            $theTable = (true === $this->useDbPrefix) ? $fullTable : $table;
            $sPrimaryKeys = '';
            $_c = 0;
            foreach ($primaryKey as $key) {
                if (0 !== $_c++) {
                    $sPrimaryKeys .= ', ';
                }
                $sPrimaryKeys .= "'$key'";
            }


            $content = str_replace([
                'Module\Example\Api',
                'GeneratedExampleObject',
                'theTable',
                '//primaryKey',
                '$array',
                '//-nullables',
            ], [
                $this->namespace,
                $theClassName,
                $theTable,
                $sPrimaryKeys,
                $sArr,
                $s,
            ], $f);


            $path = $this->targetDirectory . "/GeneratedObject/" . $theClassName . '.php';
            FileSystemTool::mkfile($path, $content);

            //--------------------------------------------
            // ALSO GENERATING MANUAL CLASSES IF NOT EXIST
            //--------------------------------------------
            $path = $this->targetDirectory . "/Object/" . $ClassName . '.php';
            if (false === file_exists($path)) {
                $c = file_get_contents(__DIR__ . "/assets/ManualObject.tpl.php");
                $c = str_replace([
                    'Module\Example\Api',
                    'GeneratedClassName',
                    'ClassName',
                ], [
                    $this->namespace,
                    $theClassName,
                    $ClassName,
                ], $c);
                FileSystemTool::mkfile($path, $c);
            }


        }

    }


    //--------------------------------------------
    //
    //--------------------------------------------
    private function isOfTypeNumber(string $type)
    {
        if (in_array($type, [
            "tinyint",
            "mediumint",
            "int",
        ])) {
            return true;
        }
        return false;
    }
}