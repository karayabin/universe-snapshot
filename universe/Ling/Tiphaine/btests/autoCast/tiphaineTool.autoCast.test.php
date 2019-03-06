<?php

use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\Tiphaine\TiphaineTool;

require_once "bigbang.php";




//------------------------------------------------------------------------------/
// EXHAUSTING TEST DEMO
//------------------------------------------------------------------------------/
$agg = AuthorTestAggregator::create();

$a = [
    '',
    '/path/to/file.txt',
    'empty', // nope
    'false',
    'true',
    'null',
    '6.4',
    '6',
    '"ee"',
];

$b = [
    '',
    '/path/to/file.txt',
    'empty',
    false,
    true,
    null,
    (float)6.4,
    (int)6,
    '"ee"',
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg) {
    $res = TiphaineTool::autoCast($value);
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);