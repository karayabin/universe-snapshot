<?php


use Ling\CliTools\Input\CommandLineInput;
use Ling\CliTools\Output\Output;
use Ling\SvelteTemplateBuilder\MySvelteComponentBuilder;

require_once __DIR__ . "/../../../bigbang.php";


$input = new CommandLineInput();
$output = new Output();

function error(string $msg)
{
    global $output;
    $output->write("<error>$msg</error>" . PHP_EOL);
    exit;
}

function info(string $msg, $br = true)
{
    global $output;
    $output->write("<blue>$msg</blue>");
    if (true === $br) {
        $output->write(PHP_EOL);
    }
}

function success(string $msg)
{
    global $output;
    $output->write("<green>$msg</green>" . PHP_EOL);
}


$params = $input->getParameters();


if (2 === count($params)) {

    list($componentName, $dirname) = array_merge($params);

    $curDir = getcwd();
    if (false === $curDir) {
        error("The current directory couldn't be found. Try cd to a directory and try again.");
    }


    try {

        info("Building the component...", false);

        $builder = new MySvelteComponentBuilder();
        $builder->setBaseDir($curDir);
        $builder->setComponentName($componentName);
        $builder->setDirName($dirname);
        $builder->build();


        success("...ok");


    } catch (\Exception $e) {
        error($e->getMessage());
        az($e); // debug...
    }


} else {
    error("You must pass 2 parameters: the component name and the directory name. See the doc for more info.");
}




