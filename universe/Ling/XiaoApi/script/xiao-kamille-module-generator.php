<?php


use Ling\BashColorTool\BashColorTool;
use Core\Services\A;
use Ling\QuickPdo\QuickPdoInfoTool;
use Ling\XiaoApi\Generator\ApiGenerator\DbApiGenerator;
use Ling\XiaoApi\Generator\ObjectGenerator\DbObjectGenerator;


//--------------------------------------------
// THIS SCRIPT GENERATES A XIAO API FOR A GIVEN KAMILLE MODULE
//--------------------------------------------
/**
 *
 * How to?
 * -----------
 * You need a module name and a database prefix.
 * Don't forget the in the prefix.
 *
 * For instance if your module is EkomCronBot, and your tables are prefixed with ekcron_
 * then you can use the following command to generate your xiao api:
 *
 *
 *      php -f "/path/to/xiao-kamille-module-generator.php" --  --module=EkomCronBot --prefix=ekcron_'
 *
 *
 */
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$shortOptions = '';
$longOptions = [
    'module:',
    'prefix:',
];
$options = getopt($shortOptions, $longOptions);


$module = $options['module'] ?? null;
$prefix = $options['prefix'] ?? null;


if (null === $module || null === $prefix) {
    echo BashColorTool::error("Invalid command: the module and prefix args are expected (i.e. /command --module=\"MyModule\" --prefix=\"my_\"");
} else {


    //--------------------------------------------
    // CONFIGURE THIS SECTION TO YOUR LIKINGS
    //--------------------------------------------
    A::quickPdoInit();
    $db = QuickPdoInfoTool::getDatabase();
    $apiClassName = "Generated" . $module . "Api";
    $tablePrefix = $prefix;
    $nameSpace = 'Module\\' . $module . '\\Api';
    $targetDir = "/myphp/leaderfit/leaderfit/class-modules/$module/Api";


    //--------------------------------------------
    // DON'T TOUCH BELOW
    //--------------------------------------------
    DbApiGenerator::create()
        ->setClassName($apiClassName)
        ->setTablePrefix($tablePrefix)
        ->setNamespace($nameSpace)
        ->setTargetDirectory($targetDir)
        ->generateByDatabase($db);


    DbObjectGenerator::create()
        ->setUseDbPrefix(false)
        ->setTablePrefix($tablePrefix)
        ->setNamespace($nameSpace)
        ->setTargetDirectory($targetDir)
        ->generateByDatabase($db);


    BashColorTool::success("ok");
}
