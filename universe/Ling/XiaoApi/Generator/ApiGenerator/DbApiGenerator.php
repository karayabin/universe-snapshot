<?php


namespace Ling\XiaoApi\Generator\ApiGenerator;


use Ling\Bat\FileSystemTool;
use Ling\QuickPdo\QuickPdoInfoTool;
use Ling\XiaoApi\Generator\ApiGenerator\Exception\ApiGeneratorException;
use Ling\XiaoApi\Helper\GeneralHelper\GeneralHelper;


/**
 *
 * Generate the GeneratedApi for your project from a database.
 *
 * It is assumed that the tables in your database are named
 * using snake_case (case_with_underscore_as_separator_and_all_lowercase).
 * That's because the table names are then converted to ClassNames which use another case (FlexiblePascalCase).
 *
 *
 *
 * Cases used in this class are defined here:
 * https://github.com/lingtalfi/ConventionGuy/blob/master/nomenclature.stringCases.eng.md
 *
 *
 */
class DbApiGenerator
{

    private $className;
    private $namespace;
    private $targetDirectory;
    private $tablePrefix;


    public static function create()
    {
        return new static();
    }

    public function setClassName($className)
    {
        $this->className = $className;
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
            throw new ApiGeneratorException("targetDirectory not set");
        }

        $tables = QuickPdoInfoTool::getTables($db);
        $f = file_get_contents(__DIR__ . "/assets/GeneratedExampleApi.tpl.php");


        $uses = [];
        $s = '';
        foreach ($tables as $table) {

            /**
             * ...Only if they start with the chosen prefix
             */
            if (0 !== strpos($table, $this->tablePrefix)) {
                continue;
            }

            $ClassName = GeneralHelper::tableNameToClassName($table, $this->tablePrefix);
            $className = lcfirst($ClassName);

            $s .= PHP_EOL;
            $s .= <<<EEE
    /**
     * @return $ClassName
     */
    public function $className()
    {
        return \$this->getObject('$className');
    }
EEE;


            $uses[] = $this->namespace . '\Object\\' . $ClassName;

        }

        $sUses = 'use ' . implode(';' . PHP_EOL . "use ", $uses) . ';' . PHP_EOL;
        $f = str_replace([
            'Module\Example\Api',
            'GeneratedExampleApi',
            '//-uses',
            '//-methods',
        ], [
            $this->namespace,
            $this->className,
            $sUses,
            $s,
        ], $f);
        $path = $this->targetDirectory . "/" . $this->className . '.php';
        FileSystemTool::mkfile($path, $f);

    }
}