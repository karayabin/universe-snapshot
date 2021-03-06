<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Light_Cli\CliTools\Program\LightCliApplication;


//--------------------------------------------
// Welcome to the Light CLI
//--------------------------------------------
/**
 * When you call this script, we detect whether there is an app or not in the current directory.
 *
 * - if there is an app (we detect the presence of scripts/Ling/Light_Cli/light-cli.php), we hook to it so that you get the latest info from your app
 * - if there is no app, we proxy your command to our internal standalone light app
 *
 */


$currentDirectory = getcwd();


//--------------------------------------------
// FIND THE light-cli.php SCRIPT TO USE
//--------------------------------------------
$lightCliScript = $currentDirectory . "/scripts/Ling/Light_Cli/light-cli.php";
if (false === file_exists($lightCliScript)) {
    $lightCliScript2 = "/usr/local/share/universe/Ling/Light_Cli/assets/light-app-standalone/scripts/Ling/Light_Cli/light-cli.php";
    if (true === file_exists($lightCliScript2)) {
        $lightCliScript = $lightCliScript2;
    } else {
        echo "No light-cli.php script found. Searched locations were: " . PHP_EOL;
        echo "- $lightCliScript" . PHP_EOL;
        echo "- $lightCliScript2" . PHP_EOL;
        exit;
    }
}




//--------------------------------------------
// FIND THE app.init.inc FILE TO USE
//--------------------------------------------
$appInit = $currentDirectory . "/scripts/Ling/Light/init.light.inc.php";
if (false === file_exists($appInit)) {
    $appInit2 = "/usr/local/share/universe/Ling/Light_Cli/assets/light-app-standalone/scripts/Ling/Light/init.light.inc.php";
    if (true === file_exists($appInit2)) {
        $appInit = $appInit2;
    } else {
        echo "No init.light.inc.php file found. Searched locations were: " . PHP_EOL;
        echo "- $appInit" . PHP_EOL;
        echo "- $appInit2" . PHP_EOL;
        exit;
    }
}


require_once $appInit;



$input = new CommandLineInput();
$output = new Output();

$app = new LightCliApplication();
$app->setContainer($container);
$app->setErrorIsVerbose(true);
$app->run($input, $output);


