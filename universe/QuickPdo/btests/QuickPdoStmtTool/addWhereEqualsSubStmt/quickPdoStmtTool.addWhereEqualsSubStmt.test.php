<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ["select * from mytable", [
        'the_name' => 'paul',
        'type' => '3',
    ]],
    ["select * from mytable", [
        'the_name' => 'paul',
        'type' => null,
    ]],
];

$b = [
    ['select * from mytable where the_name = :bzz_0 and type = :bzz_1', [
        ':bzz_0' => 'paul',
        ':bzz_1' => '3',
    ]],
    ['select * from mytable where the_name = :bzz_0 and type is null', [
        ':bzz_0' => 'paul',
    ]],
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($stmt, $keys2Values) = $value;
    list($expectedStmt, $expectedMarkers) = $expected;
    $markers = [];
    QuickPdoStmtTool::addWhereEqualsSubStmt($keys2Values, $stmt, $markers);
    if ($stmt !== $expectedStmt) {
        ComparisonErrorTableTool::collect($testNumber, $expectedStmt, $stmt);
    }
    elseif ($markers !== $expectedMarkers) {
        ComparisonErrorTableTool::collect($testNumber, $expectedMarkers, $markers);
    }
    return ($expectedStmt === $stmt && $expectedMarkers === $markers);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();