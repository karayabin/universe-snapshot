<?php

use Ling\Bate\MicroStringTool;
use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\Tool\ComparisonErrorTableTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ["abcdef", 0],
    ["abc def", 0],
    [" abcdef", 0],
    ["  abcdef", 0],
    ["\tabcdef", 0],
    [" \t abcdef", 0],
    [" \t abcdef", 1],
    [" \t abcdef", 2],
    [" \t abcdef", 3],
    [" \t abcdef", 4],
];

$b = [
    0,
    0,
    1,
    2,
    1,
    3,
    3,
    3,
    3,
    4,
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($string, $pos) = $value;
    MicroStringTool::skipBlanks($string, $pos);
    if ($expected !== $pos) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $pos);
    }
    return ($expected === $pos);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();