<?php

use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;
use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$a = [
    ["select * from mytable", [
        ['id', '>=', 6],
        ['the_name', 'like', 'maurice'],
        ['salary', 'between', 1500, 3000],
    ]],
    ["select * from mytable", [
        ['id', '>=', 6],
        ' and ( ',
        ['the_name', 'like', 'maurice'],
        ' or ',
        ['salary', 'between', 1500, 3000],
        ' )',
    ]],
    ["select * from mytable", "id in ( 6, 8, 9 )"],
    // with null
    ["select * from mytable", [
        ['id', '>=', 6],
        ['the_name', 'like', 'maurice'],
        ['type', '=', null],
        ['salary', 'between', 1500, 3000],
    ]],
];

$b = [
    ['select * from mytable where id >= :bzz_0 and the_name like :bzz_1 and salary between :bzz_2 and :bzz_3', [
        ':bzz_0' => 6,
        ':bzz_1' => 'maurice',
        ':bzz_2' => 1500,
        ':bzz_3' => 3000,
    ]],
    ['select * from mytable where id >= :bzz_0 and ( the_name like :bzz_1 or salary between :bzz_2 and :bzz_3 )', [
        ':bzz_0' => 6,
        ':bzz_1' => 'maurice',
        ':bzz_2' => 1500,
        ':bzz_3' => 3000,
    ]],
    ['select * from mytable where id in ( 6, 8, 9 )', []],
    // with null
    ['select * from mytable where id >= :bzz_0 and the_name like :bzz_1 and type is null and salary between :bzz_2 and :bzz_3', [
        ':bzz_0' => 6,
        ':bzz_1' => 'maurice',
        ':bzz_2' => 1500,
        ':bzz_3' => 3000,
    ]],    
];


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    list($stmt, $where) = $value;
    list($expectedStmt, $expectedMarkers) = $expected;
    $markers = [];
    QuickPdoStmtTool::addWhereSubStmt($where, $stmt, $markers);
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