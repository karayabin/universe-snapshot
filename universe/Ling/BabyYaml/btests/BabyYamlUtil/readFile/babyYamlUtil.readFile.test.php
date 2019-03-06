<?php

use Ling\BabyYaml\BabyYamlUtil;
use Ling\Bat\CaseTool;
use Ling\PhpBeast\AuthorTestAggregator;
use Ling\PhpBeast\PrettyTestInterpreter;
use Ling\PhpBeast\Tool\ComparisonErrorTableTool;


require_once "bigbang.php";


$agg = AuthorTestAggregator::create();

$d = __DIR__ . "/assets";

function getfile($f)
{
    return __DIR__ . "/assets/" . $f . '.yml';
}

function getresult($f)
{
    $defs = [];
    require __DIR__ . "/results/" . $f . '.php';
    return $defs;
}


$files = scandir($d);
foreach ($files as $f) {
    if ('.' !== $f && '..' !== $f) {
        if ('f' === substr($f, 0, 1)) {
            $f = substr($f, 0, -4);
            $a[] = getfile($f);
            $b[] = getresult($f);
        }
    }
}


$agg->addTestsByColumn($a, $b, function ($value, $expected, &$msg, $testNumber) {

    $res = BabyYamlUtil::readFile($value);
    if ($expected !== $res) {
        ComparisonErrorTableTool::collect($testNumber, $expected, $res);
    }
    return ($expected === $res);
});


PrettyTestInterpreter::create()->execute($agg);
ComparisonErrorTableTool::display();