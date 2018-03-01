QuickPdoStmtTool
=================
2016-01-15 --> 2017-05-09



What is it?
-------------------


It's a companion for the [QuickPdo](https://github.com/lingtalfi/QuickPdo) tool to manipulate statements.
 



 
 
When should I use it?
---------------

It lets you create prepared queries style WHERE clause easily. 






Methods
------------


### addDateRangeToQuery
2018-02-28



```php
void        public static function addDateRangeToQuery( str:&q, array:&markers = [], str:dateStart = null, str:dateEnd = null, str:dateCol = null)
```

Decorate the given query and markers to include the date range defined by dateStart and dateEnd.            

 
 
 
### addWhereSubStmt


```php
void function addWhereSubStmt ( mixed:whereConds, &str:stmt, &array:$markers, str:tablePrefix="" )
```

This method adds the WHERE clause to your statement.

The whereConds parameter uses the [**QuickPdo WHERE notation**](https://github.com/lingtalfi/QuickPdo#the-where-notation).


#### Examples

##### Typical whereConds example

```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 

//------------------------------------------------------------------------------/
// WHERE CONDS EXAMPLE
//------------------------------------------------------------------------------/
$stmt = "select * from mytable";
$where = [
    ['id','>=', 6],
    ['the_name','like', 'maurice'],
    ['salary','between', 1500, 3000],
];
$markers=[];
QuickPdoStmtTool::addWhereSubStmt($where, $stmt, $markers);
a($stmt);
az($markers);


```

The output will be:

```abap
string 'select * from mytable where id >= :bzz_0 and the_name like :bzz_1 and salary between :bzz_2 and :bzz_3' (length=102)

array (size=4)
  ':bzz_0' => int 6
  ':bzz_1' => string 'maurice' (length=7)
  ':bzz_2' => int 1500
  ':bzz_3' => int 3000

```


##### whereConds with glue example

```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 


//------------------------------------------------------------------------------/
// WHERE CONDS WITH GLUE EXAMPLE
//------------------------------------------------------------------------------/
$stmt = "select * from mytable";
$where = [
    ['id','>=', 6],
    ' and ( ',
    ['the_name','like', 'maurice'],
    ' or ',
    ['salary','between', 1500, 3000],
    ' )',
];
$markers=[];
QuickPdoStmtTool::addWhereSubStmt($where, $stmt, $markers);
a($stmt);
az($markers);


```

The output will be:

```abap
string 'select * from mytable where id >= :bzz_0 and ( the_name like :bzz_1 or salary between :bzz_2 and :bzz_3 )' (length=105)

array (size=4)
  ':bzz_0' => int 6
  ':bzz_1' => string 'maurice' (length=7)
  ':bzz_2' => int 1500
  ':bzz_3' => int 3000
  
```


##### whereConds glue only example

```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 


//------------------------------------------------------------------------------/
// WHERE GLUE - IN EXAMPLE 
//------------------------------------------------------------------------------/
$stmt = "select * from mytable";
$where = "id in ( 6, 8, 9 )";
$markers=[];
QuickPdoStmtTool::addWhereSubStmt($where, $stmt, $markers);
a($stmt);
az($markers);

```

The output will be:

```abap
string 'select * from mytable where id in ( 6, 8, 9 )' (length=45)

array (size=0)
  empty

```


##### whereConds with glue and null value example

```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 

//------------------------------------------------------------------------------/
// WHERE CONDS EXAMPLE
//------------------------------------------------------------------------------/
$stmt = "select * from mytable";
$where = [
    ['id','>=', 6],
    ['the_name','like', 'maurice'],
    ['type','=', null],
    ['salary','between', 1500, 3000],
];
$markers=[];
QuickPdoStmtTool::addWhereSubStmt($where, $stmt, $markers);
a($stmt);
az($markers);

```

The output will be:

```abap
string 'select * from mytable where id >= :bzz_0 and the_name like :bzz_1 and type is null and salary between :bzz_2 and :bzz_3' (length=119)

array (size=4)
  ':bzz_0' => int 6
  ':bzz_1' => string 'maurice' (length=7)
  ':bzz_2' => int 1500
  ':bzz_3' => int 3000


```




### addWhereEqualsSubStmt


```php
void function addWhereEqualsSubStmt ( array:keys2Values, &str:stmt, &array:$markers )
```

This method adds the WHERE clause to your statement, but using only the **equal operator**.


#### basic example


```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 




//------------------------------------------------------------------------------/
// WHERE EQUALS SHORTCUT
//------------------------------------------------------------------------------/
$stmt = "select * from mytable";
$keys2Values = [
    'the_name' => 'paul',
    'type' => '3',
];
$markers = [];
QuickPdoStmtTool::addWhereEqualsSubStmt($keys2Values, $stmt, $markers);
a($stmt);
a($markers);

```


The output will be:


```abap
string 'select * from mytable where the_name = :bzz_0 and type = :bzz_1' (length=63)

array (size=2)
  ':bzz_0' => string 'paul' (length=4)
  ':bzz_1' => string '3' (length=1)

string 'select * from mytable where id >= :bzz_0 and the_name like :bzz_1 and salary between :bzz_2 and  :bzz_3' (length=103)

array (size=4)
  ':bzz_0' => int 6
  ':bzz_1' => string 'maurice' (length=7)
  ':bzz_2' => int 1500
  ':bzz_3' => int 3000

```



#### example with null value


```php
<?php


use QuickPdo\QuickPdoStmtTool;

require_once "bigbang.php"; // start the local universe 


$stmt = "select * from mytable";
$keys2Values = [
    'the_name' => 'paul',
    'type' => null,
];
$markers = [];
QuickPdoStmtTool::addWhereEqualsSubStmt($keys2Values, $stmt, $markers);
a($stmt);
a($markers);


```


The output will be:


```abap
string 'select * from mytable where the_name = :bzz_0 and type is null' (length=62)

array (size=1)
  ':bzz_0' => string 'paul' (length=4)

```





### hasWhere


```php
bool function hasWhere ( str:query )
```



Returns whether or not the given query uses the where clause.





### simpleWhereToPdoWhere


```php
array function simpleWhereToPdoWhere ( array:where )
```

Converts a simple map array (array of key => value) to a pdo whereConds array,
as described in the [**QuickPdo WHERE notation**](https://github.com/lingtalfi/QuickPdo#the-where-notation).




### stripWildcards


```php
string function stripWildcards ( str:query )
```

Return the query minus the wildcards it potentially contains (by default: % and _).

