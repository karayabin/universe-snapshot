<?php


//--------------------------------------------
// Welcome to the Light CLI
//--------------------------------------------
use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Light_Cli\CliTools\Program\LightCliApplication;

require_once __DIR__ . "/../Light/init.light.inc.php";


$input = new CommandLineInput();
$output = new Output();


$app = new LightCliApplication();
$app->setContainer($container);
$app->setErrorIsVerbose(true);
$app->run($input, $output);


