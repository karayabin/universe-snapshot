<?php


use Ling\Bat\ArrayTool;
use Ling\Light_Kit\ConfigurationTransformer\DynamicVariableTransformer;
use Ling\Light_Kit\WidgetHandler\LightKitPicassoWidgetHandler;

/**
 * @var $this LightKitPicassoWidgetHandler
 */


$um = $this->getContainer()->get("user_manager");
$user = ArrayTool::objectToArray($um->getUser());


$transformer = new DynamicVariableTransformer();
$transformer->setVariables([
    "user" => $user,
]);
$transformer->transform($vars);


