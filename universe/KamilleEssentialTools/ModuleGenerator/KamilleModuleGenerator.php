<?php


namespace KamilleEssentialTools\ModuleGenerator;


use Bat\CaseTool;
use Bat\FileSystemTool;
use KamilleEssentialTools\Exception\KamilleEssentialToolsException;


/**
 * It is recommended that you do the following steps:
 *
 * - create your schema with mysqlWorkBench
 *
 *
 * - create the following structure:
 *      - class-modules
 *      ----- My
 *      --------- assets
 *      ------------- db
 *      ----------------- my.mwb
 *      ----------------- my.sql         ( result of exporting my.mwb )
 *      --------- doc
 *      ------------- my-database.md     ( documentation )
 *
 *
 *
 * - ensure that the following script is in your structure (if you want to use the xiao api generator script)
 *      - scripts
 *      ----- inc
 *      --------- xiao-generator.inc.php   (see xiao doc for more info: https://github.com/lingtalfi/XiaoApi)
 *
 *
 *
 * Then use the generator to end with the following structure:
 *      - class-modules
 *      ----- My
 *      --------- assets
 *      ------------- db
 *      ----------------- my.mwb
 *      ----------------- my.sql        (result of exporting my.mwb, the name is the module name in snake case)
 *      --------- doc
 *      ------------- my-database.md    (documentation)
 *      --------- MyModule.php          (pre-filled)
 *      --------- MyServices.php        (empty)
 *      --------- MyHooks.php           (empty)
 *      - scripts
 *      ----- xiao-my.php               (api generator script)
 *
 *
 *
 */
class KamilleModuleGenerator
{

    private $moduleName;
    private $tablePrefix;
    private $modulesDir;
    private $xiaoGenAlias;
    private $database;


    public static function create()
    {
        return new static();
    }

    public function generate()
    {
        if (
            null === $this->moduleName ||
            null === $this->modulesDir
        ) {
            throw new KamilleEssentialToolsException("moduleName or modulesDir not set");
        }

        $moduleName = $this->moduleName;
        $moduleNameSnake = CaseTool::toSnake($moduleName, true);
        $tablePrefix = $this->tablePrefix;

        $moduleDir = $this->modulesDir . "/" . $moduleName;

        // create the base directory if not exist
        $this->out("creating moduleDir: $moduleDir...", false);
        FileSystemTool::mkdir($moduleDir);
        $this->out("ok");


        // finding tables
        $tables = [];
        $sqlFile = $moduleDir . "/assets/db/" . $moduleNameSnake . ".sql";
        if (file_exists($sqlFile)) {
            $this->out("sqlFile found: $sqlFile, extracting tables with prefix $tablePrefix");
            $content = file_get_contents($sqlFile);
            $tables = $this->extractTableByPrefixFromSql($content, $tablePrefix);

        }
        $this->out("Tables: ", false);
        $this->out(implode(', ', $tables));


        // creating module main files
        $this->out("Creating module main files");
        $moduleFile = $moduleDir . "/" . $moduleName . "Module.php";
        $this->createModuleFile($moduleFile, [
            'tables' => $tables,
            'sqlFileBaseName' => basename($sqlFile),
        ]);
        $this->createHooksAndServicesFiles($moduleDir, $moduleName);


        // creating api
        $this->createXiaoApi();

    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
        return $this;
    }

    public function setTablePrefix($tablePrefix)
    {
        $this->tablePrefix = $tablePrefix;
        return $this;
    }

    public function setModulesDir($modulesDir)
    {
        $this->modulesDir = $modulesDir;
        return $this;
    }

    public function setXiaoGenAlias($xiaoGenAlias)
    {
        $this->xiaoGenAlias = $xiaoGenAlias;
        return $this;
    }

    public function setDatabase($database)
    {
        $this->database = $database;
        return $this;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    protected function out($m, $carriageReturn = true)
    {
        echo $m;
        if (true === $carriageReturn) {
            echo PHP_EOL;
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function extractTableByPrefixFromSql($content, $prefix)
    {
        $pattern = '!' . $prefix . '([a-zA-Z0-9_-]+)!';
        $matches = [];
        $tables = [];
        if (preg_match_all($pattern, $content, $matches)) {
            $tables = $matches[1];
            $tables = array_unique($tables);
        }
        return $tables;
    }

    private function createModuleFile($dstFile, array $data)
    {
        if (!file_exists($dstFile)) { // we don't want to override existing module

            $tables = $data['tables'];
            $tplFile = __DIR__ . "/assets/MyModule.tpl.php";
            $s = '';
            if ($tables) {
                foreach ($tables as $table) {
                    $camel = CaseTool::snakeToCamel($table);

                    $start = PHP_EOL . "\t" . $this->moduleName . 'Api::inst()->' . $camel . '()';
                    $s .= $start . '->deleteAll();';
                    $s .= $start . '->drop();';
                }
                $s .= PHP_EOL;
            }

            $content = file_get_contents($tplFile);
            $content = str_replace([
                'My',
                'sqlFileBaseName',
                '// delete-tables',
            ], [
                $this->moduleName,
                $data['sqlFileBaseName'],
                $s,
            ], $content);

            FileSystemTool::mkfile($dstFile, $content);
        }
    }

    private function createHooksAndServicesFiles($moduleDir, $moduleName)
    {
        $hooksFile = $moduleDir . "/" . $moduleName . "Hooks.php";
        if (!file_exists($hooksFile)) {
            $tplFile = __DIR__ . "/assets/MyHooks.tpl.php";
            $c = file_get_contents($tplFile);
            $c = str_replace('My', $moduleName, $c);
            FileSystemTool::mkfile($hooksFile, $c);
        }

        $servicesFile = $moduleDir . "/" . $moduleName . "Services.php";
        if (!file_exists($servicesFile)) {
            $tplFile = __DIR__ . "/assets/MyServices.tpl.php";
            $c = file_get_contents($tplFile);
            $c = str_replace('My', $moduleName, $c);

            FileSystemTool::mkfile($servicesFile, $c);
        }
    }

    private function createXiaoApi()
    {
        $this->out("creating api...", false);
        $scriptDir = $this->getScriptDir();
        $xiaoGenScript = $scriptDir . "/inc/xiao-generator.inc.php";
        if (file_exists($xiaoGenScript)) {


            // executing xiaogen
            $this->out("xiaogen script found. Executing xiaoGen...", false);
            $apiClassName = "Generated" . $this->moduleName . "Api";
            $tablePrefix = $this->tablePrefix;
            $nameSpace = 'Module\\' . $this->moduleName . '\\Api';
            $targetDir = $this->modulesDir . "/" . $this->moduleName . "/Api";
            $db = $this->database;

            require $xiaoGenScript;


            $this->out("creating main xiao api file", false);
            $xiaoApiFile = $this->modulesDir . "/" . $this->moduleName . '/Api/' . $this->moduleName . 'Api.php';
            if (file_exists($xiaoApiFile)) {
                $this->out("...already exist (skipping)");
            } else {
                $tpl = __DIR__ . "/assets/MyApi.tpl.php";
                $c = file_get_contents($tpl);
                $c = str_replace('My', $this->moduleName, $c);
                FileSystemTool::mkfile($xiaoApiFile, $c);
            }

        } else {
            $this->out("xiaogen script not found (skipping api generation) in $xiaoGenScript");
        }
    }


    private function getScriptDir()
    {
        return $this->modulesDir . "/../scripts";
    }
}