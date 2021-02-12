SqlQuery
===========
2018-03-27



An oop sql query object.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SqlQuery
```

Or just download it and place it where you want otherwise.



Documentation
===========
- [SqlQuery Api](https://github.com/lingtalfi/SqlQuery/blob/master/doc/api/Ling/SqlQuery.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))


Why?
==========================

If multiple modules in your app need to build ONE sql query together,
then passing the SqlQuery object to those modules provides them with
a simple api to use to build the sql query. 


How to?
===========

```php
<?php


use Core\Services\A;
use Ling\SqlQuery\SqlQuery;

// using kamille framework here (https://github.com/lingtalfi/kamille)
require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";
A::testInit();



//--------------------------------------------
// EXAMPLE CODE
//--------------------------------------------
$sqlQuery = SqlQuery::create()
    ->addField("u.*")
    ->setTable("ek_user u")
    ->addWhere("and u.id=1");


a($sqlQuery->getSqlQuery());
a($sqlQuery->getCountSqlQuery());

?>

The output is:

<pre>
string(45) "select
u.*
from ek_user u
where 1
and u.id=1"

string(58) "select count(*) as count
from ek_user u
where 1
and u.id=1"

</pre>

```




History Log
------------------

- 1.10.5 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.10.4 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.10.3 -- 2019-10-10

    - add link to doc in README.md
    
- 1.10.2 -- 2019-10-10

    - created docTool style documentation
    
- 1.10.1 -- 2019-08-12

    - fix typo
    
- 1.10.0 -- 2019-08-12

    - add SqlQuery->setDefaultWhere method
    
- 1.9.1 -- 2018-05-29

    - fix SqlQuery having groups not mixing well with bare having statements

- 1.9.0 -- 2018-04-23

    - add SqlQuery::setGroupBy method
    
- 1.8.0 -- 2018-04-18

    - add SqlQuery having group system
    
- 1.7.0 -- 2018-04-18

    - SqlQuery internal having now is agnostic and combines w/out the and keyword. You choose the and/or keyword

- 1.6.0 -- 2018-04-17

    - remove internal cache to the SqlQuery.getSqlQuery method
    
- 1.5.0 -- 2018-04-17

    - add an internal cache to the SqlQuery.getSqlQuery method
    
- 1.4.0 -- 2018-04-17

    - add addGroupBy method to SqlQueryInterface
    
- 1.3.0 -- 2018-04-17

    - add addHaving method to SqlQueryInterface
    
- 1.2.0 -- 2018-04-16

    - add addMarkers method to SqlQueryInterface

- 1.1.0 -- 2018-03-27

    - add __toString method returning the output of getSqlQuery method
    
- 1.0.0 -- 2018-03-27

    - initial commit




