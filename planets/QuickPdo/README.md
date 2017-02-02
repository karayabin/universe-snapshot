QuickPdo
=================
2015-10-04





What is it?
-------------------


It's a static class that contains basic methods to interact with a mysql database via pdo.



What's the benefit?
------------------------

- very small (less than 300 lines of code)
- it automatically creates prepared parameters (sql injection safe) for insert, update, when it makes sense to do so 
- it shortens the mysql query a bit 
 


Setup
---------

QuickPdo can be installed as a [planet](https://github.com/lingtalfi/Observer/blob/master/article/article.planetReference.eng.md).
 
 
How to use
---------------
 
First inject your pdo connection at some point in your application:

```php
QuickPdo::setConnection(
    PDOCONF_DSN,
    PDOCONF_USER,
    PDOCONF_PASS,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);

```
 
 
Then you can use the QuickPdo methods anywhere after.<br>
QuickPdo assumes that the mysql error mode is set to ERRMODE_EXCEPTION, and does not try to handle the errors for you. 







Examples
-------------
  
  

    
  
### Fetch
```php

$stmt = 'select count(*) as count from mytable where active=6';
if (false !== ($row = QuickPdo::fetch($stmt)) {
    $count = $row['count'];
}

```

  
### Count

Added in 1.14.0.

```php

if (false !== ($count = QuickPdo::count("my_table")) {
    // do something with $count
}

```
  
  
### FetchAll


#### Fetch all with like example
```php

$stmt = 'select id, the_name, active from ideas where the_name like :name';
$rows = QuickPdo::fetchAll($stmt, [
    'name' => '%'. str_replace('%','\%', $thename) .'%',
]);

```

#### Fetch all to one dimensional array grouped by id example 

```php
<?php


use QuickPdo\QuickPdo;

require_once "bigbang.php"; // start the local universe


a(QuickPdo::fetchAll("select id, email from users", [], \PDO::FETCH_UNIQUE | \PDO::FETCH_COLUMN | \PDO::FETCH_GROUP));
```

The above example would display something like this (notice that the key is the id value):

```abap
array (size=3)
  1 => string 'lingtalfi@gmail.com' (length=19)
  3 => string 'marcel@dupont.fr' (length=16)
  2 => string 'roger@rabbit.com' (length=16)
```





#### Return a flatten list for html select

```php
// return a flatten list for html select
// return an array of $id => $name instead of $index => $row
// http://stackoverflow.com/questions/7921154/in-php-is-it-possible-to-get-a-1-dimmensional-array-using-pdo
// http://www.php.net/manual/en/pdostatement.fetchall.php
$ret = QuickPdo::fetchAll('select id, name from countries', [], \PDO::FETCH_COLUMN|\PDO::FETCH_UNIQUE);



// create a quick list for html select
// return a flat list (array of key => $id instead of array of $index => $row)
// http://stackoverflow.com/questions/7921154/in-php-is-it-possible-to-get-a-1-dimmensional-array-using-pdo
// http://www.php.net/manual/en/pdostatement.fetchall.php
$ret = QuickPdo::fetchAll('select id from countries', [], \PDO::FETCH_COLUMN);
```






### Insert
  
```php
// this is a prepared request
if (false !== ($lastId = QuickPdo::insert('mytable', [
        'name' => 'Morris',   
        'age' => 45,
    ]))
) {
    echo $lastId;
}

```

### Insert ignore
  
```php
// this is a prepared request
if (false !== ($lastId = QuickPdo::insert('mytable', [
        'name' => 'Morris',   
        'age' => 45,
    ], 'ignore'))
) {
    echo $lastId;
}

```


### Delete
   
  
```php

// this form is more compact, but only works safely with ints or trusted data
QuickPdo::delete('superusers', 'the_timestamp > 1000000 and active=1');

// this form is less compact, but uses prepared parameters under the hood (safe even with untrusted strings)  
if (false !== ($n = QuickPdo::delete('superusers', [
        ['the_timestamp', '>', 1000000],
        ['active', '=', 1],
    ]))
) {
    echo "$n entries have been deleted";
}

```

  
### Update 


#### Default case  
  
```php
    
// it updates table mytable and set name to Alice where id = 1
QuickPdo::update('mytable', ['name' => 'Alice'], [
        ['id', '=', 1],
    ]);
    
// Note: like for most of the methods with QuickPdo, this is a prepared query ( which means internally, the following 
// request is executed: 'update mytable set name=:name where id = :bzz_0', and the markers are set accordingly )    

``````

#### Using where with "in" with int values 
  
```php
        
$sValues = '1, 2, 3';        
$rows = QuickPdo::update(
    $currentTable,
    ['active' => $newStatus],
    "id in ($sValues)" // I use this form when I'm sure that sValues contains only ints (or trusted data)
);
``````



#### Using where with "in" with unsafe values 
  
```php
        
        
$rows = QuickPdo::update(
    $currentTable,
    ['active' => $newStatus],
    "name in (:boo, :doo, :coo)",   // I use this form when I don't trust the data
    [
        'boo' => $booValue,
        'doo' => $dooValue,
        'coo' => $cooValue,
    ]
);

``````



#### Increment/decrement a specific column 
  
  
```php
        
        
$rows = QuickPdo::update(
    'users',
    ['nb_points' => ['nb_points+1']],
    [['id', '=', $userId]]
);

``````
  

### Replace
  
```php
foreach ($instruments as $instrumentId) {
    QuickPdo::replace('users_has_instruments', [
        'users_id' => $userId,
        'instruments_id' => $instrumentId,
    ]);
}
```
 
 
The Where notation
----------------------


The "Where notation" is used in QuickPdo::update and QuickPdo::delete methods.

It allows you to write WHERE clause in an intuitive way.

The notation is called whereConds and is the following:

```
- whereConds: glue | array of (whereCond | glue)


With
----- whereCond:
--------- 0: field
--------- 1: operator (<, =, >, <=, >=, like, between)
--------- 2: operand (the value to compare the field with)
--------- ?3: operand 2, only if between operator is used

              Note: for mysql users, if the like operator is used, the operand can contain the wildcards chars:
        
              - %: matches any number of characters, even zero characters
              - _: matches exactly one character
        
              To use the literal version of a wildcard char, prefix it with backslash (\%, \_).
              See mysql docs for more info.


----- glue: string directly injected in the statement, so that one
          can create the logical AND and OR and parenthesis operators.
          We can also use it with the IN keyword, for instance:
                  - in ( 6, 8, 9 )
                  - in ( :doo, :foo, :koo )
          In the latter case, we will also pass corresponding markers manually using the $extraMarkers argument.
                  doo => 6,
                  koo => 'something',
                  ...
    
```


To see concrete examples of use, browse the documentation for the [QuickPdoStmtTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoStmtTool.md).  


Note: since version 1.5.0, you can use the QuickPdoStmtTool to compute the **QuickPdo WHERE notation** for your own requests,
see examples in the QuickPdoStmtTool documentation.









Methods
---------------


Return     |  Method Name                                       | Comments
---------- | -------------------------------------------------- | ---------------------
void                    | setConnection ( dsn, user, pass, array options ) |
\PDO                    | getConnection ()        |                                      Or throws \Exception
bool                    | hasConnection ()        |                                      Returns whether or not the PDO connection has been set
false\|int              | count ( table )                                               | 1.14.0+ Returns the number of rows of the table in case of success, and false otherwise
false\|int              | insert ( table, array fields, keyword?)                               | Returns the last inserted id in case of success
bool                    | replace ( table, array fields, keyword?)                               | 
bool                    | update ( table, array fields, whereConds?, array extraMarkers?)    | Returns true in case of success
false\|int              | delete ( table, array whereConds?)                                 | Returns the number of deleted entries in case of success
false\|array            | fetchAll ( stmt, array markers?, fetchStyle?)                            | Returns the rows in case of success
false\|array            | fetch ( stmt, array markers?, fetchStyle?)                               | Returns a single row in case of success
false\|\PDOStatement    | freeQuery( stmt, array markers?)                  | Returns the \PDOStatement query in case of success
false\|int              | freeStmt( stmt, array markers?)                             | Returns the number of affected lines in case of success
false\|int              | freeExec( stmt )                                            | Returns the number of affected lines in case of success. This is not a prepared request, it calls pdo->exec directly
array                   | getErrors( )                                            | Returns an array of errorArray (0: SQLSTATE error code, 1: Driver-specific error code, 2: Driver-specific error message, 3: class method name)
array                   | getLastError ( )                                            | Returns the last errorArray (see getErrors method for a definition of errorArray)
string                  | getQuery ( )                                            | Returns the current query




Tips
-----------
  
### Access the last executed query
```php
    
    // execute a query with QuickPdo...
    echo QuickPdo::getQuery(); // then access the actual query being executed

```




Error handling
---------------

As you all know, [PDO has three error modes](http://php.net/manual/en/pdo.error-handling.php):

- PDO::ERRMODE_SILENT
- PDO::ERRMODE_WARNING
- PDO::ERRMODE_EXCEPTION


Typically, you will define the error mode once upon the QuickPdo's initialization, as explained in
the ["How to use" section](https://github.com/lingtalfi/QuickPdo/blob/master/README.md#how-to-use) of this document.

The PDO error mode affects all (almost) QuickPdo's methods behaviour in case of failure:

- if you use the exception error mode, QuickPdo won't try to catch them
- however if you use the silent or warning mode, QuickPdo will store the errors for later retrieval.
        So that if you need to access the errors, you can use the
        QuickPdo::getErrors or QuickPdo::getLastError methods.





How to make transaction
--------------------------

QuickPdo doesn't have special methods for transaction, just use transaction as you would normally do


```php
$conn = QuickPdo::getConnection();
try {
    $conn->beginTransaction();
    QuickPdo::update('mytable', ['name' => 'Alice'], [
        ['id', '=', 1],
    ]);
    // ...other stuff
    $conn->commit();

} catch (\Exception $e) {
    $conn->rollBack();
}
```




Want more?
--------------

The QuickPdo planet includes some other classes that achieve various tasks:

- [QuickPdoDbOperationTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoDbOperationTool.md): to perform various database operations
- [QuickPdoInfoTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md): a general companion for QuickPdo 
- [QuickPdoStmtTool](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoStmtTool.md): to manipulate statements




 
Friends
-----------
  
If your intention is to display table results inside terminal, you might want to checkout
the [MysqlTabular Tool](https://github.com/lingtalfi/MysqlTabular).



```php
    
$stmt = <<<EEE
select id, committer_id, the_name, publish_date, active from ideas order by publish_date desc limit 0,10
EEE;

// Here, use any method that you like to generate the rows
$rows = QuickPdo::fetchAll($stmt);


$o  = new MysqlTabularAssocUtil();
echo $o->renderRows($rows);

```

Then the results will look like this on the console:

    
    +----+--------------+-----------+---------------------+--------+
    | id | committer_id | the_name  | publish_date        | active |
    +----+--------------+-----------+---------------------+--------+
    | 68 |           15 | pou       | 2015-10-02 09:29:02 |      0 |
    | 67 |           14 | r         | 2015-10-02 09:22:52 |      0 |
    | 66 |           13 | zezer     | 2015-10-02 07:59:16 |      0 |
    | 65 |           13 | ze        | 2015-10-02 07:58:21 |      0 |
    | 64 |           13 | pjzpeée   | 2015-10-02 07:37:46 |      0 |
    | 63 |           13 | pjzper    | 2015-10-02 07:20:16 |      0 |
    | 62 |           13 | zer       | 2015-10-02 06:59:53 |      0 |
    | 60 |           12 | sdf       | 2015-10-02 06:52:51 |      0 |
    | 59 |           11 | Chun li   | 2015-09-30 14:03:27 |      0 |
    | 58 |           11 | Boris Pan | 2015-09-30 13:50:51 |      0 |
    +----+--------------+-----------+---------------------+--------+




 
 
 
History Log
------------------
    
- 1.24.0 -- 2017-01-14

    - wrap column names with back ticks to allow use of reserved words as columns
    
- 1.23.0 -- 2016-12-01

    - add QuickPdoInfoTool::getColumnNullabilities
    
- 1.22.0 -- 2016-11-29

    - add QuickPdo::hasConnection
    
- 1.21.0 -- 2016-11-24

    - add QuickPdoInfoTool::getColumnDataTypes
    - add QuickPdoInfoTool::getColumnDefaultValues
    
    
- 1.20.0 -- 2016-11-24

    - fix bug in QuickPdoInfoTool::getAutoIncrementedField 
    - add QuickPdoInfoTool::getPrimaryKey
    
    
- 1.19.0 -- 2016-11-17

    - QuickPdo::update can now do increments (update users set nb_points=nb_points+1 where id=550)
    
    
- 1.18.0 -- 2016-11-16

    - add QuickPdo::replace
    
- 1.17.0 -- 2016-11-10

    - add QuickPdoDbOperationTool::truncate
    
    
- 1.16.0 -- 2016-02-12

    - add QuickPdoInfoTool::getForeignKeysInfo
    
- 1.15.0 -- 2016-02-12

    - add QuickPdoExceptionTool
    
- 1.14.0 -- 2016-02-12

    - add QuickPdo::count method
       
    
- 1.13.0 -- 2016-02-11

    - add QuickPdoInfoTool::isEmptyTable method   
    
- 1.12.0 -- 2016-02-11

    - add QuickPdoInfoTool::getAutoIncrementedField method   
    
- 1.11.0 -- 2016-01-27

    - add fetchStyle parameter for QuickPdo:fetch   
    
    
- 1.10.0 -- 2016-01-26

    - add QuickPdoDbOperationTool  
    - add QuickPdoInfoTool::getTables  
    
- 1.9.0 -- 2016-01-25

    - add QuickPdo::getQuery  
    
- 1.8.0 -- 2016-01-19

    - QuickPdo::fetchAll: add fetchStyle argument  
    
- 1.7.0 -- 2016-01-18

    - QuickPdo::insert: add keyword parameter  
    
    
- 1.6.0 -- 2016-01-15

    - QuickPdoStmtTool: add null value handling in WHERE clauses 
    
    
- 1.5.0 -- 2016-01-15

    - add QuickPdoStmtTool
    - fix where notation mixed glue with whereCond problems
    
    
- 1.4.0 -- 2015-12-28

    - add QuickPdoInfoTool
    - add QuickPdo::freeQuery method

- 1.3.0 -- 2015-12-21

    - update and delete methods use same where polymorphic argument
    
- 1.2.0 -- 2015-12-16

    - add possibility to change fetch style
        
- 1.1.0 -- 2015-12-11

    - add possibility to retrieve errors manually (to work with PDO_ERRMODE_SILENT for instance)
    
- 1.0.1 -- 2015-11-07

    - fix bug: incorrect where clause
       
- 1.0.0 -- 2015-10-04

    - initial commit
    
     
 
 