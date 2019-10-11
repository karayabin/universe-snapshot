ParametrizedSqlQuery
===========
2019-08-12



A tool to help creating a [SqlQuery](https://github.com/lingtalfi/SqlQuery) object from an array.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/ParametrizedSqlQuery
```

Or just download it and place it where you want otherwise.






Summary
===========
- [ParametrizedSqlQuery api](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/api/Ling/ParametrizedSqlQuery.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
- [conception notes](https://github.com/lingtalfi/ParametrizedSqlQuery/blob/master/doc/pages/conception-notes.md)
- [Examples](#examples)
    - [Example 1: the simplest example](#example-1-the-simplest-example)
    - [Example 2: join basics](#example-2-join-basics)
    - [Example 3: join and where basics](#example-3-join-and-where-basics)
    - [Example 4: group by and having basics](#example-4-group-by-and-having-basics)




Examples
==========

I'm using the [babyYaml notation](https://github.com/lingtalfi/BabyYaml) to show the array structure, for readability purposes.

Also I'm using the [employee](https://dev.mysql.com/doc/employee/en/) database from mysql.


Setup code
--------------

Last but not least, this is my setup code for all the following examples.
I'm using the [Light framework](https://github.com/lingtalfi/Light) with a configured service container.



```php
<?php
/**
 * @var $db LightDatabasePdoWrapper
 */
$db = $container->get("database");
$file = "/path/to/config/test.byml";
$declarations = BabyYamlUtil::readFile($file);
$util = new ParametrizedSqlQueryUtil();


```

Example 1: the simplest example 
---------------


With the following array:


```yaml
employees_basic:
    table: employees e
    base_fields:
        - e.first_name
        - e.last_name

    order:
        order_employee_name_asc: e.last_name asc

    limit:
        page: 1
        length: 10

```


The following code
```php
<?php

//--------------------------------------------
// 1
//--------------------------------------------
$declaration = $declarations['employees_basic'];
$tags = [
    "order_employee_name_asc" => null,
];
$query = $util->getSqlQuery($declaration, $tags);
$stmt = $query->getSqlQuery();
a($stmt);
a($db->fetchAll($stmt));

```


Produces this output:

```html
string(87) "select 
e.first_name,
e.last_name
from employees e
order by e.last_name asc
limit 0, 10"

array(10) {
  [0] => array(2) {
    ["first_name"] => string(6) "Bartek"
    ["last_name"] => string(6) "Aamodt"
  }
  [1] => array(2) {
    ["first_name"] => string(6) "Aluzio"
    ["last_name"] => string(6) "Aamodt"
  }
  [2] => array(2) {
    ["first_name"] => string(6) "Dekang"
    ["last_name"] => string(6) "Aamodt"
  }
  [3] => array(2) {
    ["first_name"] => string(4) "Matt"
    ["last_name"] => string(6) "Aamodt"
  }
  [4] => array(2) {
    ["first_name"] => string(7) "Mokhtar"
    ["last_name"] => string(6) "Aamodt"
  }
  [5] => array(2) {
    ["first_name"] => string(9) "Sreenivas"
    ["last_name"] => string(6) "Aamodt"
  }
  [6] => array(2) {
    ["first_name"] => string(6) "Sachem"
    ["last_name"] => string(6) "Aamodt"
  }
  [7] => array(2) {
    ["first_name"] => string(5) "Basim"
    ["last_name"] => string(6) "Aamodt"
  }
  [8] => array(2) {
    ["first_name"] => string(5) "Vidar"
    ["last_name"] => string(6) "Aamodt"
  }
  [9] => array(2) {
    ["first_name"] => string(8) "Takanari"
    ["last_name"] => string(6) "Aamodt"
  }
}

```




Example 2: join basics
---------------


With the following array:


```yaml
employees_simple_join:
    table: employees e
    base_fields:
        - e.first_name
        - e.last_name
        - s.salary
    base_join:
        - inner join salaries s on s.emp_no=e.emp_no

    order:
        order_employee_salary_desc: s.salary desc

    limit:
        page: 1
        length: 4

```


The following code
```php
<?php

//--------------------------------------------
// 2
//--------------------------------------------
$declaration = $declarations['employees_simple_join'];
$tags = [
    "order_employee_salary_desc" => null,
];
$query = $util->getSqlQuery($declaration, $tags);
$stmt = $query->getSqlQuery();
a($stmt);
a($db->fetchAll($stmt));

```


Produces this output:

```html
string(137) "select 
e.first_name,
e.last_name,
s.salary
from employees e
inner join salaries s on s.emp_no=e.emp_no
order by s.salary desc
limit 0, 4"

array(4) {
  [0] => array(3) {
    ["first_name"] => string(8) "Tokuyasu"
    ["last_name"] => string(5) "Pesch"
    ["salary"] => string(6) "158220"
  }
  [1] => array(3) {
    ["first_name"] => string(8) "Tokuyasu"
    ["last_name"] => string(5) "Pesch"
    ["salary"] => string(6) "157821"
  }
  [2] => array(3) {
    ["first_name"] => string(7) "Honesty"
    ["last_name"] => string(9) "Mukaidono"
    ["salary"] => string(6) "156286"
  }
  [3] => array(3) {
    ["first_name"] => string(6) "Xiahua"
    ["last_name"] => string(8) "Whitcomb"
    ["salary"] => string(6) "155709"
  }
}

```




Example 3: join and where basics
---------------


With the following array:


```yaml
employees_simple_join_and_where:
    table: employees e
    base_fields:
        - e.first_name
        - e.last_name
        - s.salary
    base_join:
        - inner join salaries s on s.emp_no=e.emp_no
    where:
        where_employee_salary_less_than: or s.salary < :price

    order:
        order_employee_salary_desc: s.salary desc

    limit:
        page: 1
        length: 4

```


The following code
```php
<?php

//--------------------------------------------
// 3
//--------------------------------------------
$declaration = $declarations['employees_simple_join_and_where'];
$tags = [
    "order_employee_salary_desc" => null,
    "where_employee_salary_less_than" => [
        'price' => 50000,
    ],
];
$query = $util->getSqlQuery($declaration, $tags);
$stmt = $query->getSqlQuery();
$markers = $query->getMarkers();
a($stmt);
a($db->fetchAll($stmt, $markers));

```


Produces this output:

```html
string(166) "select 
e.first_name,
e.last_name,
s.salary
from employees e
inner join salaries s on s.emp_no=e.emp_no
where 0
or s.salary < :price
order by s.salary desc
limit 0, 4"

array(4) {
  [0] => array(3) {
    ["first_name"] => string(8) "Munehiro"
    ["last_name"] => string(6) "Brodie"
    ["salary"] => string(5) "49999"
  }
  [1] => array(3) {
    ["first_name"] => string(7) "Khatoun"
    ["last_name"] => string(12) "Bernardeschi"
    ["salary"] => string(5) "49999"
  }
  [2] => array(3) {
    ["first_name"] => string(7) "Jianhui"
    ["last_name"] => string(4) "Penn"
    ["salary"] => string(5) "49999"
  }
  [3] => array(3) {
    ["first_name"] => string(5) "Angus"
    ["last_name"] => string(5) "Boyle"
    ["salary"] => string(5) "49999"
  }
}


```





Example 4: group by and having basics
---------------


With the following array:


```yaml
employees_group_by_and_having:
    table: employees e
    base_fields:
        - e.last_name
        - count(*) as total

    base_group_by:
        - e.last_name

    base_order:
        - total desc

    base_having:
        - total < 200

    limit:
        page: 1
        length: 4

```


The following code
```php
<?php


//--------------------------------------------
// 4
//--------------------------------------------
$declaration = $declarations['employees_group_by_and_having'];
$tags = [];
$query = $util->getSqlQuery($declaration, $tags);
$stmt = $query->getSqlQuery();
$markers = $query->getMarkers();
a($stmt);
a($db->fetchAll($stmt, $markers));

```


Produces this output:

```html
string(129) "select 
e.last_name,
count(*) as total
from employees e
group by e.last_name
having (
total < 200)
order by total desc
limit 0, 4"

array(4) {
  [0] => array(2) {
    ["last_name"] => string(7) "Sridhar"
    ["total"] => string(3) "199"
  }
  [1] => array(2) {
    ["last_name"] => string(6) "Karner"
    ["total"] => string(3) "199"
  }
  [2] => array(2) {
    ["last_name"] => string(6) "Hofman"
    ["total"] => string(3) "199"
  }
  [3] => array(2) {
    ["last_name"] => string(5) "Merks"
    ["total"] => string(3) "199"
  }
}


```







History Log
=============

- 1.5.0 -- 2019-10-11

    - update ParametrizedSqlQueryUtil to keep up with new duelist conception
    
- 1.4.1 -- 2019-10-09

    - fix ParametrizedSqlQueryUtil duplicate marker names problem
    
- 1.4.0 -- 2019-09-05

    - update ParametrizedSqlQueryUtil now handles pageLength=all special value
    
- 1.3.1 -- 2019-09-05

    - fix doc links 
    - add comment in ParametrizedSqlQueryUtil 
    
- 1.3.0 -- 2019-08-22

    - add routine mechanism 
    - refined variable replacement mechanism 
    - changed the limit variables and structure again

- 1.2.0 -- 2019-08-14

    - change the limit variables and structure again
    
- 1.1.0 -- 2019-08-14

    - change the limit variables and structure
    
- 1.0.0 -- 2019-08-12

    - initial commit