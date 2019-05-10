#!/usr/bin/env php
<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Deploy\Application\DeployApplication;


require_once "/myphp/universe/bigbang.php"; // activate universe






$input = new CommandLineInput();
$output = new Output();

$app = new DeployApplication();
$app->run($input, $output);