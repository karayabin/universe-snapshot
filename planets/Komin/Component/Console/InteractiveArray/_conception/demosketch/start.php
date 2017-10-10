#!/usr/bin/env php
<?php


use Komin\Component\Console\InteractiveArray\InteractiveArray;
use Komin\Component\Console\KeyboardListener\Observer\SymbolicCodeObserver\EditableLineSymbolicCodeObserver;
use Komin\Component\Console\KeyboardListener\Tool\KeyboardListenerTool;

require_once 'alveolus/bee/boot/autoload.php';


KeyboardListenerTool::safeStty();


$array = [
//    'name' => 'alice',
//    'age' => 26,
//    'author' => 'ling',
//    'site' => 'kipuduku.com',
];

$o = new InteractiveArray();
$newArray = $o
    ->setArray($array)
    ->play();


echo "\n";
a($newArray);

