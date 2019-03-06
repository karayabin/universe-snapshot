<?php

use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\Tool\ComparisonErrorTableTool;
use Ling\Quoter\QuoteTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ['abcdef', null, true],
    ['"abcdef"', null, true],
    ['\'abcdef\'', null, true],  
    ['\\\'abcdef\\\'', null, true],
    ['\\\\\'abcdef\\\\\'', null, true],
    // recursive
    ['"ab\"cdef"', null, true],
    ['"ab"cdef"', null, true],
    ['"ab"cdef"', null, true],
    ['"ab\\\\\"cdef"', null, true],
    // simple
    ['"ab\"cdef"', null, false],
    ['"ab"cdef"', null, false],
    ['"ab"cdef"', null, false],
    ['"ab\\\"cdef"', null, false],
    ['"ab\\\\\"cdef"', null, false],
    // restricting quote type
    ['"ab\"cdef"', '"', true],
    ['"ab\"cdef"', '\'', true],
    
];

$b = [
    false,
    true,
    true,
    false,
    false,
    // recursive
    true,
    false,
    false,
    true,
    // simple
    true,
    false,
    false,
    true,
    true,
    // restricting quote type
    true,
    false,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $quoteType, $escapeRecursiveMode) = $value;
    $res = QuoteTool::isQuotedString($string, $quoteType, $escapeRecursiveMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();