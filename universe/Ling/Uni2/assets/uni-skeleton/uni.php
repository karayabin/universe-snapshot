#!/usr/bin/env php
<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\Uni2\Application\UniToolApplication;

require_once __DIR__ . "/universe/bigbang.php"; // activate universe


$input = new CommandLineInput();
$output = new Output();

$app = new UniToolApplication();
$app->run($input, $output);