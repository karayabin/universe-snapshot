#!/usr/bin/env php
<?php


use Komin\Component\Console\Dialog\Dialog;
use Komin\Component\Console\Dialog\Tool\DialogListTool;
use Komin\Component\Console\KeyboardListener\Tool\KeyboardListenerTool;

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
