<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use Quoter\QuoteTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();


/**
 * Tests apply only if encoding is utf-8;
 * at least I created them with that assertion in mind. 
 */
mb_internal_encoding('utf-8');


$a = [
    // recursive
    // ---------------
    ['abcdef', 0, true],
    ['"ab"cdef', 0, true],
    ['"éé"cdef', 0, true], // utf-8 
    ['"ab\"cdef"', 0, true],
    ['"ab\"cdef"', 1, true],
    ['a"b\"cdef"', 1, true],
    ['a\"b\"cdef"', 2, true], // notice that the first quote's escaping is irrelevant
    ['a\"b\\\"cdef"', 2, true], // recursive specific
    ['a\"b\\\\\"cdef"', 2, true], // recursive specific
    // simple
    // ---------------
    ['abcdef', 0, false],
    ['"ab"cdef', 0, false],
    ['"éé"cdef', 0, false], // utf-8 
    ['"ab\"cdef"', 0, false],
    ['"ab\"cdef"', 1, false],
    ['a"b\"cdef"', 1, false],
    ['a\"b\"cdef"', 2, false], // notice that the first quote's escaping is irrelevant
    ['a\"b\\\"cdef"', 2, false],
    ['a\"b\\\\\"cdef"', 2, false],
];

$b = [
    // recursive
    // ---------------
    false,
    3,
    3,
    9,
    false,
    9,
    10,
    6,
    12,
    // simple
    // ---------------
    false,
    3,
    3,
    9,
    false,
    9,
    10,
    11,
    12,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {


    list($string, $position, $escapeRecursiveMode) = $value;
    $res = QuoteTool::getCorrespondingEndQuotePos($string, $position, $escapeRecursiveMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();