#!/usr/bin/env php
<?php


use Ling\Komin\Component\Console\Dialog\Dialog;
use Ling\Komin\Component\Console\Dialog\Tool\DialogListTool;
use Ling\Komin\Component\Console\KeyboardListener\Tool\KeyboardListenerTool;

require_once 'alveolus/bee/boot/autoload.php';


KeyboardListenerTool::safeStty();


$fruits = [
    'apple',
    'banana',
    'cherry',
    'daemon',
];



$r = Dialog::create()->setQuestion(DialogListTool::listToQuestion("Quels fruits?\n", $fruits))->setSubmitCodes('return')->execute();
echo "\nréponse: $r";
