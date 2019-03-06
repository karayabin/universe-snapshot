<?php

use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\Tool\ComparisonErrorTableTool;
use Ling\WrappedString\WrappedStringTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    // recursive 
    ['abcdef', '"', 1, '"', 1, true],
    ['ab\"cdef', '"', 1, '"', 1, true],
    ['"ab\"cdef"', '"', 1, '"', 1, true],
    ['"ab\"cd\"ef"', '"', 1, '"', 1, true],
    ['"ab\"cd\"e\&f"', '"', 1, '"', 1, true],
    ['"ab\\\"cd\"e\&f"', '"', 1, '"', 1, true],
    ['"ab\\\\\"cd\"e\&f"', '"', 1, '"', 1, true],
    // 
    ['"ab\"cdef"', '&', 1, '&', 1, true],
    ['"ab\&cdef"', '&', 1, '&', 1, true],
    ['&&ab\&&cdef&', '&&', 2, '&', 1, true],
    ['&&ab\&cdef&&', '&&', 2, '&&', 2, true],
    // simple
    ['abcdef', '"', 1, '"', 1, false],
    ['abc"def', '"', 1, '"', 1, false],
    ['abc\"def', '"', 1, '"', 1, false],
    ['abc\\\"def', '"', 1, '"', 1, false],
    ['abc\\\\\"def', '"', 1, '"', 1, false],
];

$b = [
    // recursive 
    'bcde',
    'b"cde',
    'ab"cdef',
    'ab"cd"ef',
    'ab"cd"e\&f',
    'ab\"cd"e\&f',
    'ab\"cd"e\&f',
    //
    'ab\"cdef',
    'ab&cdef',
    'ab&&cdef',
    'ab\&cdef',
    // simple
    'bcde',
    'bc"de',
    'bc"de',
    'bc\"de',
    'bc\\\"de',
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($wrappedString, $beginSymbol, $beginSymbolLength, $endSymbol, $endSymbolLength, $escapingMode) = $value;
    $res = WrappedStringTool::unwrap($wrappedString, $beginSymbol, $beginSymbolLength, $endSymbol, $endSymbolLength, $escapingMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();