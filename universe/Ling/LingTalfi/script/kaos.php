#!/usr/bin/env php
<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\LingTalfi\Kaos\Application\KaosApplication;

require_once "/myphp/universe/bigbang.php"; // activate universe


$input = new CommandLineInput();
$output = new Output();

$app = new KaosApplication();
$app->run($input, $output);