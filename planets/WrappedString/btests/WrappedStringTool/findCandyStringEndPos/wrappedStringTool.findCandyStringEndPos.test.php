<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use WrappedString\WrappedStringTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive escape mode
    ['abcdef', '"', 0, true],
    ['ab"cdef', '"', 0, true],
    ['ab"cd"ef', '"', 0, true],
    ['"abcd"ef', '"', 0, true],
    ['"éééé"ef', '"', 0, true], // utf-8
    ['"abcdef', '"', 0, true],
    ['""abcdef', '"', 0, true],
    ['ab"cde"f', '"', 2, true],
    ['ab\"cde"f', '"', 3, true], // does it find the first symbol if escaped => yes
    ['ab\"cde\"f', '"', 3, true], // does it find the second symbol if escaped => no
    ['ab\"cde\\\"f', '"', 3, true], // recursive specific
    ['ab\"cde\\\\\"f', '"', 3, true], 
    ['ab\"cde\\\\\\\"f', '"', 3, true],
    // simple escape mode
    ['abcdef', '"', 0, false],
    ['ab"cdef', '"', 0, false],
    ['ab"cd"ef', '"', 0, false],
    ['"abcd"ef', '"', 0, false],
    ['"éééé"ef', '"', 0, false], // utf-8
    ['"abcdef', '"', 0, false],
    ['""abcdef', '"', 0, false],
    ['ab"cde"f', '"', 2, false],
    ['ab\"cde"f', '"', 3, false], // does it find the first symbol if escaped => yes
    ['ab\"cde\"f', '"', 3, false], // does it find the second symbol if escaped => no
    ['ab\"cde\\\"f', '"', 3, false], // simple specific
    ['ab\"cde\\\\\"f', '"', 3, false],
    ['ab\"cde\\\\\\\"f', '"', 3, false],
    // other chars (2015-11-22)
    ['*abcde*', '*', 0, true],
    ['*ab\*cde*', '*', 0, true],
    ['*ab\*cde*', '**', 0, true],
    ['**abcde**', '**', 0, true],
    ['**ab\**cde**', '**', 0, true],
];

$b = [
    // recursive escape mode
    false,
    false,
    false,
    5,
    5,
    false,
    1,
    6,
    7,
    false,
    9,
    false,
    11,
    // simple escape mode
    false,
    false,
    false,
    5,
    5,
    false,
    1,
    6,
    7,
    false,
    false,
    false,
    false,
    // other chars (2015-11-22)
    6,
    8,
    false,    
    7,
    10,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $symbol, $pos, $escapingMode) = $value;
    $res = WrappedStringTool::findCandyStringEndPos($string, $symbol, $pos, $escapingMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();