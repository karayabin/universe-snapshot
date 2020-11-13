<?php


//--------------------------------------------
// TEST RIG
//--------------------------------------------
use Ling\SqlWizard\Util\MysqlSelectQueryParser;

$qs = [
"select * from table1",
"select * FROM table1",
"select * FROM db.table1",
"select * FROM db.`table1`",
"select * FROM `db`.`table1`",
"select * FROM `db`.table1",
"select * FROM `db`.`table1` as t4",
"select * FROM `db`.`table1` t4",
"select * from table1 as t",
"select * from table1 t",
"select * from `table1`",
"select * from `table1` as t",
];

foreach ($qs as $q) {
    $parts = MysqlSelectQueryParser::getQueryParts($q);
    a($parts['from']);
    $fromInfo = MysqlSelectQueryParser::getFromInfo($parts['from']);
    a($fromInfo);
}

az();