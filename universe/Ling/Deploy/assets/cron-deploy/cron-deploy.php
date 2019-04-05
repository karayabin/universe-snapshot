#!/usr/bin/env php
<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Deploy\Application\DeployApplication;



require_once __DIR__ . "/cron-deploy-universe/bigbang.php"; // activate universe



$input = new CommandLineInput();
$output = new Output();

$app = new DeployApplication();
$app->setConfPath(__DIR__ . "/cron-deploy-conf.byml");
$app->setProjectIdentifier("my_project_identifier");
$app->run($input, $output);