<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use Quoter\QuoteTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ['abcdef', true],
    ['"abc"', true],
    ['"éé"', true],
    ['"ab"c"', true],
    ['"ab\"c"', true],
    ['"ab\\\"c"', true],
    ['"ab\\\\\"c"', true],
    // simple
    ['"ab"c"', false],
    ['"ab\"c"', false],
    ['"ab\\\"c"', false],
    ['"ab\\\\\"c"', false],

];

$b = [
    false,
    'abc',
    'éé',
    false,
    'ab"c',
    false,
    'ab\"c',
    // simple
    false,
    'ab"c',
    'ab\"c',
    'ab\\\\"c',
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $escapeRecursiveMode) = $value;

    $res = QuoteTool::unquote($string, $escapeRecursiveMode);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();