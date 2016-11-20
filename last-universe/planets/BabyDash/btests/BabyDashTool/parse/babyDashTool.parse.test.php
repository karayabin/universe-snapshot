<?php

use BabyDash\BabyDashTool;
use PhpBeast\AuthorTestAggregator;
use PhpBeast\PrettyTestInterpreter;
use PhpBeast\Tool\ComparisonErrorTableTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

function test($str, $exp)
{
    global $agg;

    $agg->addTest(function (&$msg, $testNumber) use ($str, $exp) {
        $res = BabyDashTool::parse($str);
        $ret = ($res === $exp);
        if (false === $ret) {
            ComparisonErrorTableTool::collect($testNumber, $exp, $res);
        }
        return $ret;
    });
}


function testQuote($str, $exp)
{
    global $agg;

    $agg->addTest(function (&$msg, $testNumber) use ($str, $exp) {
        $res = BabyDashTool::parse($str, true);
        $ret = ($res === $exp);
        if (false === $ret) {
            ComparisonErrorTableTool::collect($testNumber, $exp, $res);
        }
        return $ret;
    });
}

//------------------------------------------------------------------------------/
// BASIC TEST
//------------------------------------------------------------------------------/
$s = <<<EEE
- apple
- banana
- cherry
EEE;

test($s, [
    'apple',
    'banana',
    'cherry',
]);


//------------------------------------------------------------------------------/
// BASIC INDENTATION
//------------------------------------------------------------------------------/
$s = <<<EEE
- fruits:
----- apple
----- banana
- cherry
EEE;

test($s, [
    'fruits' => [
        'apple',
        'banana',
    ],
    'cherry',
]);


//------------------------------------------------------------------------------/
// LINE NOT ENDING WITH COLON: VALUE IGNORED
//------------------------------------------------------------------------------/
$s = <<<EEE
- fruits
----- apple
----- banana
- cherry
EEE;


test($s, [
    [
        'apple',
        'banana',
    ],
    'cherry',
]);

//------------------------------------------------------------------------------/
// NESTED INDENTATION
//------------------------------------------------------------------------------/
$s = <<<EEE
- fruits:
----- red:
--------- cherry
----- yellow:
--------- some:
------------- long: banana
------------- short: lemon
EEE;


test($s, [
    'fruits' => [
        'red' => [
            'cherry',
        ],
        'yellow' => [
            'some' => [
                'long' => 'banana',
                'short' => 'lemon',
            ],
        ],
    ],
]);


//------------------------------------------------------------------------------/
// COMMENTS
//------------------------------------------------------------------------------/
$s = <<<EEE
- fruits:
# this is a comment
----- red: # this is another comment
--------- cherry
----- yellow:
--------- some:
------------- long: banana
------------- short: lemon
EEE;


test($s, [
    'fruits' => [
        'red' => [
            'cherry',
        ],
        'yellow' => [
            'some' => [
                'long' => 'banana',
                'short' => 'lemon',
            ],
        ],
    ],
]);


//------------------------------------------------------------------------------/
// AUTOCAST - SPECIAL VALUES
//------------------------------------------------------------------------------/
$s = <<<EEE
- fruits:
----- 16
----- true
----- false
----- null
----- 
----- 45.12
EEE;


test($s, [
    'fruits' => [
        16,
        true,
        false,
        null,
        "",
        45.12,
    ],
]);


//------------------------------------------------------------------------------/
// NO QUOTE INTERPRETATION BY DEFAULT
//------------------------------------------------------------------------------/
$s = <<<EEE
- "hi"
EEE;

//------------------------------------------------------------------------------/
// WITH QUOTE INTERPRETATION BY DEFAULT
//------------------------------------------------------------------------------/
$s = <<<EEE
- "hi"
- ""
- "6"
- 6
EEE;


testQuote($s, [
    'hi',
    '',
    '6',
    6,
]);


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();