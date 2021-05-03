<?php


use Ling\Light\Core\Light;

require_once "init.container.inc.php";

$light = new Light();
$light->setDebug(true);
$light->setContainer($container);
$light->initialize();
