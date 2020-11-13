<?php


use Ling\HtmlPageTools\Copilot\HtmlPageCopilot;
use Ling\Light\Core\Light;
use Ling\Light\Helper\LightHelper;
use Ling\SqlWizard\Util\MysqlSelectQueryParser;

require_once __DIR__ . "/init.inc.php";



//--------------------------------------------
// TEST RIG
//--------------------------------------------


$qs = [
    "select * from table1",
    "select * FROM table1",
    "select * from table1 as t",
    "select * from `table1`",
    "select * from `table1` as t",
    "select * from `table1` as t limit 0,10",
    "select * from `table1` as t order by id desc, name asc",
    "select * from `table1` as t order by id desc, name asc limit 0, 15",
    "select * from `table1` as t having x>4 order by id desc, name asc limit 0, 15",
    "select * from `table1` as t group by x having x>4 order by id desc, name asc limit 0, 15",
    "select * from `table1` as t inner join table2 t2 on t2.id=t.user_id left join table3 t3 on t3.id=t.animal_id group by x having x>4 order by id desc, name asc limit 0, 15",
    "select * from `table1` as t where x=6 and v=7",
    "select * from `table1` as t where x=6 and v=7 order by name desc",
    "select * from `table1` as t where x=6 and v=7 order by name desc",
    "select * from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select name from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select name, last_name  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select name, last_name as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select `name`, last_name as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select t.name as thename, last_name as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select t.`name`, last_name as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select `t`.`name`, last_name as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select `name`, `last_name` as lname  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select `name`, `last_name` as `lname`  from `table1` as t where x=6 and v=7 group by name having x>4 order by name desc",
    "select 
    `name`,
     `last_name` as lname  
     from `table1` as t
      where x=6 and v=7 group by name having x>4 order by name desc",
];


foreach ($qs as $q) {
    $parts = MysqlSelectQueryParser::getQueryParts($q);
    a($parts);

    $fieldsInfo = MysqlSelectQueryParser::getFieldsInfo($parts['fields']);
    a($fieldsInfo);
}


az();
