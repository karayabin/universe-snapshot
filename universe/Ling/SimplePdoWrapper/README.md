SimplePdoWrapper
================
2019-02-04 -> 2019-09-12




A simple wrapper around the php's PDO object.


Note: this planet is heavily inspired from the [QuickPdo planet](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/QuickPdo).
It basically fixes some implementation details I was not happy with.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SimplePdoWrapper
```

Or just download it and place it where you want otherwise.



Summary
=================
* [SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
* [SimplePdoWrapper](#simplepdowrapper-1)
* [Connexion](#connexion)
  * [Using mysql](#using-mysql)
  * [Using sqlite](#using-sqlite)
* [Examples](#examples)
  * [Insert examples](#insert-examples)
     * [Insert (without error)](#insert-without-error)
     * [Insert (with error)](#insert-with-error)
     * [Insert ignore (without error)](#insert-ignore-without-error)
     * [Insert ignore (with error)](#insert-ignore-with-error)
  * [Replace examples](#replace-examples)
     * [Replace (without error)](#replace-without-error)
     * [Replace (with error)](#replace-with-error)
  * [Update examples](#update-examples)
     * [Update (without error)](#update-without-error)
     * [Update (with error)](#update-with-error)
  * [Delete examples](#delete-examples)
     * [Deleting some records.](#deleting-some-records)
     * [Delete all records](#delete-all-records)
  * [Fetch examples](#fetch-examples)
     * [Fetch a single row](#fetch-a-single-row)
     * [Fetch, the count query](#fetch-the-count-query)
  * [Fetch all examples](#fetch-all-examples)
     * [Fetch all, simple call](#fetch-all-simple-call)
     * [Fetch all, single column](#fetch-all-single-column)
     * [Fetch all, simple map with unique keys](#fetch-all-simple-map-with-unique-keys)
     * [Fetch all, rows grouped by](#fetch-all-rows-grouped-by)
  * [Execute statement examples](#execute-statement-examples)
     * [Select the database](#select-the-database)
     * [execute a file of sql statements](#execute-a-file-of-sql-statements)
  * [Transaction examples](#transaction-examples)
     * [transaction template](#transaction-template)
     * [successful transaction](#successful-transaction)
     * [transaction with rollback](#transaction-with-rollback)
  * [Related](#related)
  * [History Log](#history-log)




SimplePdoWrapper
================

The SimplePdoWrapper tool provides a SimplePdoWrapperInterface object, which
has simple common methods that I tend to use on a day to day basis.


It exposes the following methods:


- **insert** ( string table, array fields, array options = []): false|string
    Executes the insert statement and returns the lastInsertId.
    See [insert examples](#insert-examples).

- **replace** ( string table, array fields, array options = []): false|string
    Executes the replace statement and returns the lastInsertId.
    See [replace examples](#replace-examples).

- **update** ( string table, array fields, string|array whereConds = null, array markers = []): bool
    Executes the update statement and returns whether the statement was executed successfully.
    See [update examples](#update-examples).

- **delete** ( string table, array whereConds = [], array markers = []): false|int
    Executes the delete statement and returns the number of deleted rows.
    See [delete examples](#delete-examples).

- **fetch** ( string query, array markers = [], string|phpConst fetchStyle=null ): false|array
    Executes the prepared statement and returns the fetched row.
    See [fetch examples](#fetch-examples).

- **fetchAll** ( string query, array markers = [], int fetchStyle=null, mixed fetchArg = null, array ctorArgs = [] ): false|array
    Executes the prepared statement and return an array containing all of the result set rows.
    See [fetchAll examples](#fetch-all-examples).

- **executeStatement** ( string query ): false|int
    Executes an SQL statement and returns the number of affected rows.
    See [executeStatement examples](#execute-statement-examples).

- **transaction** ( callable transactionCallback, \Exception &$e=null ): bool
    Executes a transaction, and returns whether it was successful.
    See [transaction examples](#transaction-examples).

- **setConnection** ( \PDO $pdoInstance ): void
    Sets the pdo instance.

- **getConnection** (): \PDO
    Returns the current php's \PDO instance.

- **getError** (): array|null
    Returns the error info of the last statement executed, or null if there was no error.
    Note: the value is reinitialized to null on every method that queries a statement.

- **getQuery** (): string
    Returns the last query executed.

- **setErrorMode** ( phpConst errorMode ): void
    Sets the error mode. See [php doc](http://php.net/manual/en/pdo.errorinfo.php) for more info.




All methods above which execute a sql query behave the same when error handling is concerned:

- If the pdo connection is not defined, a NoPdoConnectionException is thrown.
- If the query fails, a native php **\PDOException** exception is thrown if the error mode is set to exception,
    or false is returned otherwise.
    In both cases, the error info array is accessible via the getError method.
- For all "query methods" using a table argument (insert, replace, update, delete), the table argument must be
     escaped properly by the caller (client).
     For instance, all possible values are possible table values:
         - my_table
         - `my_table`
         - my_db.my_table
         - `my_db`.`my_table`
         - ...





I tested the SimplePdoWrapper successfully with those two drivers:

- mysql
- sqlite





Connexion
=========

The first thing we need to do to use the SimplePdoWrapper instance is to store the connexion (a php PDO instance) with the setConnexion method.


Here are some examples code for mysql and sqlite:



Using mysql
---------------

```php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=kit', $user, $pass, [
        \PDO::ATTR_PERSISTENT => true,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
    ]);
    $wrapper = new MysqlSimplePdoWrapper();
    $wrapper->setConnexion($pdo);


} catch (PDOException $e) {

    // remember, this error message might contain credentials! (http://php.net/manual/en/pdo.connections.php)
    print "Error!: " . $e->getMessage() . "<br/>";
    a($e->errorInfo);
    a($e->getCode());
    die();
}
```





Using sqlite
------------


```php
try {

    $pdo = new PDO('sqlite:/path/to/my_app/somewhere/data.sqlite', null, null, [
        \PDO::ATTR_PERSISTENT => true,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ]);
    $wrapper = new MysqlSimplePdoWrapper();
    $wrapper->setConnexion($pdo);


} catch (PDOException $e) {

    // remember, this error message might contain credentials! (http://php.net/manual/en/pdo.connections.php)
    print "Error!: " . $e->getMessage() . "<br/>";
    a($e->errorInfo);
    a($e->getCode());
    die();
}
```





Examples
========

In all the following examples, I will use the following tables:

- layout
    - id, INT (auto-incremented primary key)
    - unique_name, VARCHAR(64) (unique_index)
    - label, VARCHAR(64)
    - path, VARCHAR(64)


Also, the $wrapper variable represents an instance of the simple pdo wrapper instance.

It will be initialized using the **\PDO::ERRMODE_WARNING** error mode (or silent mode would have worked too),
so that I don't have to catch exceptions (which is more verbose and not the point of the examples).

I will use a mysql dsn in the examples (although it shouldn't make much difference).




Insert examples
---------------

### Insert (without error)

```php
$res = $wrapper->insert("layout", [
    "unique_name" => "test_layout3",
    "label" => "My first test layout",
    "path" => "some/relative/path",
]);
a($res); // 16
a($wrapper->getError()); // null
```

### Insert (with error)


```php
$res = $wrapper->insert("layout", [
    "unique_name" => "test_layout3",
    "label" => "My first test layout",
    "path" => "some/relative/path",
]);
a($res); // false
a($wrapper->getError());
/**
 * array(3) {
 *   [0] => string(5) "23000"
 *   [1] => int(1062)
 *   [2] => string(59) "Duplicate entry 'test_layout3' for key 'unique_name_UNIQUE'"
 * }
*/

```


### Insert ignore (without error)


```php
$res = $wrapper->insert("layout", [
    "unique_name" => "test_layout4",
    "label" => "My first test layout",
    "path" => "some/relative/path",
], [
    "ignore" => true,
]);
a($res); // 21
a($wrapper->getError()); // null

```

### Insert ignore (with error)


Notice how errors are ignored, and the lastInsertId returns 0 (at least with the mysql driver).

```php
$res = $wrapper->insert("layout", [
    "unique_name" => "test_layout4",
    "label" => "My first test layout",
    "path" => "some/relative/path",
], [
    "ignore" => true,
]);
a($res); // 0
a($wrapper->getError()); // null

```


Replace examples
----------------


### Replace (without error)

```php
// Note: a record with unique_name=test_layout4 already exists before we execute the following method.
// And this record will be replaced by our record below.

$res = $wrapper->replace("layout", [
    "unique_name" => "test_layout4",
    "label" => "replaced with test layout #6",
    "path" => "some/relative/path",
]);
a($res); // 25 (a new record was created)
a($wrapper->getError()); // null
```



### Replace (with error)

```php
$res = $wrapper->replace("layoutttt", [
    "unique_name" => "test_layout4",
    "label" => "replaced with test layout #6",
    "path" => "some/relative/path",
]);
a($res); // false
a($wrapper->getError());
/**
 * array(3) {
 * [0] => string(5) "42S02"
 * [1] => int(1146)
 * [2] => string(35) "Table 'kit.layoutttt' doesn't exist"
 * }
 */
```




Update examples
---------------

### Update (without error)


Using the whereConds array:

```php
$res = $wrapper->update("layout", [
    "label" => "My first updated test layout",
], [
    "unique_name" => "test_layout4",
]);

a($res); // true
a($wrapper->getError()); // null
```



Or using the whereConds string, with markers:


```php
    $res = $wrapper->update("layout", [
        "label" => "My other updated test layout",
    ], "unique_name = :name", [
        "name" => "test_layout4",
    ]);

    a($res); // true
    a($wrapper->getError()); // null
```



Important, at least in mysql the update method will still return true even if
the where clause doesn't match any row and no row was updated:


```php
$res = $wrapper->update("layout", [
    "label" => "My first updated test layout",
], [
    "unique_name" => "unexisting name", // this record doesn't exist in the database...
]);

a($res); // true (although nothing was updated)
a($wrapper->getError()); // null
```



### Update (with error)

```php
$res = $wrapper->update("layout", [
    "labsssel" => "My first updated test layout",
], [
    "unique_name" => "test_layout4",
]);

a($res); // false
a($wrapper->getError());
/**
 * array(3) {
 * [0] => string(5) "42S22"
 * [1] => int(1054)
 * [2] => string(41) "Unknown column 'labsssel' in 'field list'"
 * }
 */
```



Delete examples
---------------

### Deleting some records.

Using the first form (array) of whereConds.


```php
$res = $wrapper->delete("layout", [
    "unique_name" => "test_layout4",
]);

a($res); //  1 (int) if the record exist, or 0 (int) if it doesn't
a($wrapper->getError()); // null
```


Using the second form (string) of whereConds.


```php
$res = $wrapper->delete("layout", "id > 20");

a($res); // 2 (or more generally the number or deleted rows)
a($wrapper->getError()); // null
```

### Delete all records


```php
$res = $wrapper->delete("layout");

a($res); // 3 (or more generally the number or deleted rows)
a($wrapper->getError()); // null
```





Fetch examples
--------------

### Fetch a single row


If the query matches:

```php
$row = $wrapper->fetch("select label from layout where id=29");
a($row);
/**
 * array(1) {
 *      ["label"] => string(11) "layout n°3"
 * }
 */
a($wrapper->getError()); // null
```


If the query doesn't match, fetch returns false:

```php
$row = $wrapper->fetch("select label from layout where id=2889");
a($row); // false
a($wrapper->getError()); // null
```


### Fetch, the count query

Note: we use the **\PDO::FETCH_COLUMN** fetch style to reduce the row to a single value.


```php
$row = $wrapper->fetch("select count(*) as count from layout", [], \PDO::FETCH_COLUMN);
a($row); // 20 (string)
a($wrapper->getError()); // null
```






Fetch all examples
------------------

### Fetch all, simple call


Simple call.

```php
$rows = $wrapper->fetchAll("select * from layout");
a($rows);
/**
 * array(4) {
 *   [0] => array(4) {
 *             ["id"] => string(2) "27"
 *             ["unique_name"] => string(9) "layout #1"
 *             ["label"] => string(11) "layout n°1"
 *             ["path"] => string(16) "/some/other/path"
 *   }
 *   [1] => array(4) {
 *             ["id"] => string(2) "28"
 *             ["unique_name"] => string(9) "layout #2"
 *             ["label"] => string(11) "layout n°2"
 *             ["path"] => string(16) "/some/other/path"
 *   }
 *   ...
 * }
 */
a($wrapper->getError()); // null
```


Using markers:


###

```php
$rows = $wrapper->fetchAll("select * from layout where id < :id", [
    "id" => 30
]);
a($rows);
/**
 * array(4) {
 *   [0] => array(4) {
 *             ["id"] => string(2) "27"
 *             ["unique_name"] => string(9) "layout #1"
 *             ["label"] => string(11) "layout n°1"
 *             ["path"] => string(16) "/some/other/path"
 *   }
 *   [1] => array(4) {
 *             ["id"] => string(2) "28"
 *             ["unique_name"] => string(9) "layout #2"
 *             ["label"] => string(11) "layout n°2"
 *             ["path"] => string(16) "/some/other/path"
 *   }
 *   ...
 * }
 */
a($wrapper->getError()); // null
```


### Fetch all, single column


Return a simple column (the first column):

```php
$rows = $wrapper->fetchAll("select * from layout", [], \PDO::FETCH_COLUMN);
a($rows); // contains the array of id (the first 0-indexed column)
/**
 * array(20) {
 *     [0] => string(2) "27"
 *     [1] => string(2) "28"
 *     [2] => string(2) "29"
 *     ...
 * }
 */
a($wrapper->getError()); // null
```



Return a simple column (any column):

```php
// 2 (0-indexed) represents the third column (label in this case).
$rows = $wrapper->fetchAll("select * from layout", [], \PDO::FETCH_COLUMN, 2);
a($rows); // contains the array of label
/**
 * array(20) {
 *      [0] => string(11) "layout n°1"
 *      [1] => string(11) "layout n°2"
 *      [2] => string(11) "layout n°3"
 *      [3] => string(11) "layout n°4"
 *      [4] => string(11) "layout n°5"
 *      [5] => string(11) "layout n°5"
 *      [6] => string(11) "layout n°7"
 *      ...
 * }
 */
a($wrapper->getError()); // null
```



### Fetch all, simple map with unique keys


The two examples below show how to retrieve a map of unique key to value.

The key is always the leftmost member of the query.



Return a simple map of unique id => label


    $rows = $wrapper->fetchAll("select id, label from layout", [], \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
    a($rows); // contains the array of label
    /**
     * array(20) {
     *      [27] => string(11) "layout n°1"
     *      [28] => string(11) "layout n°2"
     *      [29] => string(11) "layout n°3"
     *      [30] => string(11) "layout n°4"
     *      [31] => string(11) "layout n°5"
     *      [32] => string(11) "layout n°5"
     *      [33] => string(11) "layout n°7"
     *      ...
     * }
     */
    a($wrapper->getError()); // null



Return a simple map of unique label => id

```php
$rows = $wrapper->fetchAll("select label, id from layout", [], \PDO::FETCH_COLUMN | \PDO::FETCH_UNIQUE);
a($rows); // contains the array of label
/**
 * array(20) {
 *      ["layout n°1"] => string(2) "27"
 *      ["layout n°2"] => string(2) "28"
 *      ["layout n°3"] => string(2) "29"
 *      ["layout n°4"] => string(2) "30"
 *      ["layout n°5"] => string(2) "32"
 *      ["layout n°7"] => string(2) "33"
 *      ["layout n°8"] => string(2) "34"
 *      ...
 * }
 */
a($wrapper->getError()); // null
```


### Fetch all, rows grouped by


Return rows grouped by the leftmost member of the query (label in the example below).

```php
$rows = $wrapper->fetchAll("select label, id from layout", [], \PDO::FETCH_COLUMN | \PDO::FETCH_GROUP);
a($rows); // contains the array of label
/**
 * array(19) {
 *       ["layout n°1"] => array(1) {
 *           [0] => string(2) "27"
 *      }
 *      ["layout n°2"] => array(1) {
 *           [0] => string(2) "28"
 *      }
 *      ["layout n°3"] => array(1) {
 *           [0] => string(2) "29"
 *      }
 *      ["layout n°4"] => array(1) {
 *           [0] => string(2) "30"
 *      }
 *      ["layout n°5"] => array(2) {
 *           [0] => string(2) "31"
 *           [1] => string(2) "32"
 *      }
 *      ["layout n°7"] => array(1) {
 *           [0] => string(2) "33"
 *      }
 *      ["layout n°8"] => array(1) {
 *           [0] => string(2) "34"
 *      }
 *      ...
 * }
 */
a($wrapper->getError()); // null
```




Execute statement examples
--------------------------

Any sql query can be executed with this technique.



### Select the database

```php
// select the database
$res = $wrapper->executeStatement("use kit");
a($res); // 0
a($wrapper->getError()); // null
```



### execute a file of sql statements

```php
$content = file_get_contents($file);
$res = $wrapper->executeStatement($content); // will execute all the statements in the file
```






Transaction examples
--------------------

### transaction template


```php
/
**
 * @var $exception \Exception
 */
$exception = null;
$res = $this->pdoWrapper->transaction(function () {
    // your code here
}, $exception);
if (false === $res) {
    throw $exception;
}

```

### successful transaction

```php
$exception = null;
$res = $wrapper->transaction(function () use ($wrapper) {
    $wrapper->insert("layout", [
        "unique_name" => "joris",
        "label" => "Joris",
        "path" => "/path/some/where",
    ]);


    $wrapper->insert("layout", [
        "unique_name" => "mirabelle",
        "label" => "mirabelle",
        "path" => "/path/some/where",
    ]);


}, $exception);
a($res); // true
a($exception); // null
```


### transaction with rollback

```php
$exception = null;
$res = $wrapper->transaction(function () use ($wrapper) {
    $wrapper->insert("layout", [
        "unique_name" => "joris",
        "label" => "Joris",
        "path" => "/path/some/where",
    ]);


    $wrapper->insert("layout", [
        "unique_name" => "mirabelle",
        "label" => "mirabelle",
        "path" => "/path/some/where",
    ]);

    throw new \Exception("I will not commit");


}, $exception);
a($res); // false
a($exception); // object(Exception)#39 ...
```


Related
----------
- [QuickPdo](https://github.com/lingtalfi/QuickPdo), the library used to inspire the SimplePdoWrapper planet



History Log
------------------

- 1.8.4 -- 2019-10-04

    - fix MysqlInfoUtil->getRic not returning all columns when no primary key and no unique indexes 
    
- 1.8.3 -- 2019-10-04

    - SimplePdoWrapper::addWhereSubStmt is now public 
    
- 1.8.2 -- 2019-09-18

    - add README.md transaction template example 
    
- 1.8.1 -- 2019-09-18

    - fix README.md examples typos 
    
- 1.8.0 -- 2019-09-12

    - added MysqlInfoUtil->getAutoIncrementedKey method 
    
- 1.7.0 -- 2019-09-12

    - added MysqlInfoUtil->getColumnTypes method 
    
- 1.6.0 -- 2019-09-12

    - added MysqlInfoUtil->getUniqueIndexes method 
    - fixed MysqlInfoUtil->getRic not taking into account unique indexes 

- 1.5.0 -- 2019-09-12

    - added MysqlInfoUtil->getRic method 
    
- 1.4.0 -- 2019-09-12

    - added MysqlInfoUtil->getPrimaryKey method 
    
- 1.3.0 -- 2019-09-12

    - added MysqlInfoUtil->getColumnNames method 
    
- 1.2.1 -- 2019-09-12

    - removed SimplePdoWrapperInterface->changeDatabase method, as it's already in MysqlInfoUtil 

- 1.2.0 -- 2019-09-12

    - add SimplePdoWrapperInterface->changeDatabase method 
    
- 1.1.1 -- 2019-07-22

    - add doc summary 
    
- 1.1.0 -- 2019-07-22

    - add MysqlInfoUtil 
    
- 1.0.3 -- 2019-07-22

    - update documentation typo 

- 1.0.2 -- 2019-07-22

    - update documentation to be compliant with docTools
    
- 1.0.1 -- 2019-07-19

    - update documentation, add related section
    
- 1.0.0 -- 2019-02-04

    - initial commit