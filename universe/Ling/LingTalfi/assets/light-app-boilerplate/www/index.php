<?php


use Ling\Light\Core\Light;

require_once __DIR__ . "/../scripts/Ling/Light/init.container.inc.php";


$light = new Light();
$light->setDebug(true);
$light->setContainer($container);


$light->registerRoute("/", function () {
    return "This is light.";
});

$light->run();
