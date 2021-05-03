<?php


use Ling\Light\Helper\ServiceContainerHelper;



require_once __DIR__ . "/../../../universe/bigbang.php"; // activate universe


date_default_timezone_set("Europe/Paris");
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);


$appDir = __DIR__ . "/../../../";




$container = ServiceContainerHelper::getInstance($appDir, [
    'type' => 'blue',
    'blueMode' => 'create',
    'environment' => $_SERVER['APPLICATION_ENVIRONMENT'] ?? 'prod',
]);





