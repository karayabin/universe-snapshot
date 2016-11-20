<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use WrappedString\WrappedStringTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive 
    ['abcdef', 0, '"', 1, '"', 1, true],
    ['"abcdef"', 0, '"', 1, '"', 1, true],
    ['"abcdef"', 1, '"', 1, '"', 1, true],
    ['"ab\"cdef"', 0, '"', 1, '"', 1, true],
    ['"ab"cdef"', 0, '"', 1, '"', 1, true],
    ['"ab"cdef"', 1, '"', 1, '"', 1, true],
    // a
    ['ab"cdef"', 0, '"', 1, '"', 1, true],
    ['ab\"cdef"', 0, '"', 1, '"', 1, true],
    ['ab\\\"cdef"', 0, '"', 1, '"', 1, true],
    ['ab\\\\\"cdef"', 0, '"', 1, '"', 1, true],
    ['éé\\\"éééé"', 0, '"', 1, '"', 1, true, 'utf-8'],
    // b
    ['ab*cdef*', 0, '*', 1, '*', 1, true],
    ['ab*cdef\*', 0, '*', 1, '*', 1, true],
    ['ab**cdef\**', 0, '**', 2, '**', 2, true],
    ['ab**cdef**', 0, '**', 2, '**', 2, true],
    ['ab**cd\*ef**', 0, '**', 2, '**', 2, true],
    ['ab**cd\**ef**', 0, '**', 2, '**', 2, true],
    ['ab****cd\**ef**', 0, '**', 2, '**', 2, true],
    // simple
    ['abcdef', 0, '"', 1, '"', 1, false],
    ['"abcdef"', 0, '"', 1, '"', 1, false],
    ['"abcdef"', 1, '"', 1, '"', 1, false],
    ['"ab\"cdef"', 0, '"', 1, '"', 1, false],
    ['"ab"cdef"', 0, '"', 1, '"', 1, false],
    ['"ab"cdef"', 1, '"', 1, '"', 1, false],
    // a
    ['ab"cdef"', 0, '"', 1, '"', 1, false],
    ['ab\"cdef"', 0, '"', 1, '"', 1, false],
    ['ab\\\"cdef"', 0, '"', 1, '"', 1, false],
    ['ab\\\\\"cdef"', 0, '"', 1, '"', 1, false],
    ['éé\\\"éééé"', 0, '"', 1, '"', 1, false, 'utf-8'],
    // b
    ['ab*cdef*', 0, '*', 1, '*', 1, false],
    ['ab*cdef\*', 0, '*', 1, '*', 1, false],
    ['ab**cdef\**', 0, '**', 2, '**', 2, false],
    ['ab**cdef**', 0, '**', 2, '**', 2, false],
    ['ab**cd\*ef**', 0, '**', 2, '**', 2, false],
    ['ab**cd\**ef**', 0, '**', 2, '**', 2, false],
    ['ab****cd\**ef**', 0, '**', 2, '**', 2, false],
];

$b = [
    // recursive 
    false,
    [0, 8],
    false,
    [0, 10],
    [0, 4],
    [3, 9],
    // a
    [2, 8],
    false,
    [4, 10],
    false,
    [4, 10],
    // b
    [2, 8],
    false,
    false,
    [2, 10],
    [2, 12],
    [2, 13],
    [2, 6],
    // simple
    false,
    [0, 8],
    false,
    [0, 10],
    [0, 4],
    [3, 9],
    // a
    [2, 8],
    false,
    false,
    false,
    false,
    // b
    [2, 8],
    false,
    false,
    [2, 10],
    [2, 12],
    [2, 13],
    [2, 6],    
    
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $mbPos, $beginSymbol, $beginSymbolLength, $endSymbol, $endSymbolLength, $escapingMode) = $value;


    $encoding = 'utf-8';
    if (array_key_exists(7, $value)) {
        $encoding = $value[7];
    }
    mb_internal_encoding($encoding);


    $res = WrappedStringTool::getNextWrappedStringInfo($string, $mbPos, $beginSymbol, $beginSymbolLength, $endSymbol, $endSymbolLength, $escapingMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();