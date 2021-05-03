<?php


//--------------------------------------------
// Welcome to the Light_PlanetInstaller CLI
//--------------------------------------------
use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Light_PlanetInstaller\CliTools\Program\LightPlanetInstallerApplication;

require_once __DIR__ . "/../Light/init.light.inc.php";





$input = new CommandLineInput();
$output = new Output();



$app = new LightPlanetInstallerApplication();
$app->setContainer($container);
$app->run($input, $output);


