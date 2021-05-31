<?php


use Ling\Light_PlanetInstaller\Helper\LpiVersionHelper;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\TestAggregator;
use Ling\PhpBeast\Tool\BnbMessageTool;
use Ling\TokenFun\Parser\UseStatementsParser;


require_once __DIR__ . "/../../../bigbang.php";


$agg = TestAggregator::create();


$items = [
    [
        "2.1.4",
        "2.1.7",
        "<",
    ],
    [
        "2.1.40",
        "2.1.7",
        ">",
    ],
    [
        "2.1.44",
        "2.1.44",
        "=",
    ],
    [
        "2.1",
        "2.1.0",
        "=",
    ],
    [
        "2.1",
        "2.1.9",
        "<",
    ],
    [
        "2.1.07",
        "2.1.7",
        "=",
    ],
    [
        "2.0.13",
        "2.1.7",
        "<",
    ],
    [
        "3.1.40",
        "1.9.99",
        ">",
    ],
];


//--------------------------------------------
//
//--------------------------------------------
try {

    $o = new UseStatementsParser();


    foreach ($items as $item) {
        list($v1, $v2, $expected) = $item;

        $result = LpiVersionHelper::compare($v1, $v2);

        $agg->addTest(function (&$msg, $testNumber) use ($v1, $v2, $result, $expected) {

            $msg = "$v1 $result $v2 (expected $v1 $expected $v2)";
            return ($result === $expected);
        });
    }


    PrettyTestInterpreter::create()->execute($agg);


} catch (\Exception $e) {
    echo '<br>';
    echo $e->getMessage();
    echo '<br>';
    BnbMessageTool::printErrorResultString();
}
