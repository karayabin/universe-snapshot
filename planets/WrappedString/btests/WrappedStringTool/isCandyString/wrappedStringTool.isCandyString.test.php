<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use WrappedString\WrappedStringTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive escape mode
    // -------------------------
    ['abcdef', '"', true],
    ['"abcdef"', '"', true],
    ['\"abcdef"', '"', true],
    ['"ab\"cdef"', '"', true],
    ['"ab\\\"cdef"', '"', true],
    ['"ab\\\\\"cdef"', '"', true],
    ['"ab\\\\\\\"cdef"', '"', true],
    ['"éé\"éé"', '"', true], // utf-8
    
    ['*abc*', '*', true], // other symbol
    ['**', '*', true], // empty
    ['*', '*', true], // candy string must have separate (but identical) begin and end symbol
    ['*abcdef*', '**', true], 
    ['**abcdef**', '**', true], 
    ['**abc\**def**', '**', true], 
    ['**abc\**d**ef**', '**', true],
    // simple escape mode
    // -------------------------
    ['abcdef', '"', false],
    ['"abcdef"', '"', false],
    ['\"abcdef"', '"', false],
    ['"ab\"cdef"', '"', false],
    ['"ab\\\"cdef"', '"', false],
    ['"ab\\\\\"cdef"', '"', false],
    ['"ab\\\\\\\"cdef"', '"', false],
    ['"éé\"éé"', '"', false], // utf-8

    ['*abc*', '*', false], // other symbol
    ['**', '*', false], // empty
    ['*', '*', false], // candy string must have separate (but identical) begin and end symbol
    ['*abcdef*', '**', false],
    ['**abcdef**', '**', false],
    ['**abc\**def**', '**', false],
    ['**abc\**d**ef**', '**', false],    
];

$b = [
    // recursive escape mode
    // -------------------------
    false,
    true,
    false,
    true,
    false,
    true,
    false,
    true,
    true,
    true,
    false,
    false,
    true,
    true,
    false,
    // simple escape mode
    // -------------------------
    false,
    true,
    false,
    true,
    true,
    true,
    true,
    true,
    true,
    true,
    false,
    false,
    true,
    true,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $symbol, $escapingMode) = $value;
    $res = WrappedStringTool::isCandyString($string, $symbol, $escapingMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();