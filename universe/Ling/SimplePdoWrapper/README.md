SimplePdoWrapper
================
2019-02-04 -> 2021-03-05




A simple wrapper around the php's PDO object.


Note: this planet is heavily inspired from the [QuickPdo planet](https://github.com/karayabin/universe-snapshot/tree/master/universe/Ling/QuickPdo).
It basically fixes some implementation details I was not happy with.



This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.SimplePdoWrapper
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/SimplePdoWrapper
```

Or just download it and place it where you want otherwise.



Summary
=================
* [SimplePdoWrapper api](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper.md) (generated with [DocTools](https://github.com/lingtalfi/DocTools))
* Pages
    * [Conception notes](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/conception-notes.md)
    * [Fetch all components](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/pages/fetch-all-components.md)
* [SimplePdoWrapper](#simplepdowrapper-overview)
* [Connexion](#connexion)
  * [Using mysql](#using-mysql)
  * [Using sqlite](#using-sqlite)
* [SimplePdoWrapperQueryException](#the-simplepdowrapperqueryexception)
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
  * [The where conditions](#the-where-conditions)
  * [Fetch examples](#fetch-examples)
     * [Fetch a single row](#fetch-a-single-row)
     * [Fetch, the count query](#fetch-the-count-query)
  * [Fetch all examples](#fetch-all-examples)
     * [Fetch all, simple call](#fetch-all-simple-call)
     * [Fetch all with like](#fetch-all-with-like)
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






SimplePdoWrapper overview
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



The SimplePdoWrapperQueryException
===========
2020-06-02


For the following methods:

- insert
- replace
- update
- delete
- fetchAll
- fetch

if your **pdo** configuration throws exceptions, then the SimplePdoWrapper will intercept them and rethrow a special exception: 
the **SimplePdoWrapperQueryException**.

This special exception has the same message and code as the original thrown exception, but has an extra **query** information
that you can access using the **getQuery** method. 

The problem it solves is that often, you get cryptic error messages such as this one for instance:

```html
SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ') )' at line 1
```

which gives you a pointer to the error, but you don't know exactly what's going on.

If we had the query information, debugging would be a breeze.

For instance, in the example above, the query was:

```sql 
delete from luda_resource WHERE (`id` in () )
```

We now obviously see the problem in the query, an empty array has been passed.

So, now because we throw a **SimplePdoWrapperQueryException** for the aforementioned method, you always have the option to access the query if you want to (for instance
in development/debug mode, it can be good to show both the exception message AND the query).



The idea behind this exception is that then you have 






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


There are more forms of whereConds, see the **where conditions** section below for more details.


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


There are more forms of whereConds, see the **where conditions** section below for more details.


### Delete all records


```php
$res = $wrapper->delete("layout");

a($res); // 3 (or more generally the number or deleted rows)
a($wrapper->getError()); // null
```


The where conditions
-------------------
2020-02-06 -> 2020-05-21


Both the **update** and the **delete** methods have a "where conditions" argument.
In this section let's examine that argument in more depth.

The **where conditions** argument can have 3 forms:


### array of key/value pairs

This ought to be the most common form.
An implicit "equals" comparison operator is used, as well as an **AND** combination operator, as in the **WHERE key equals value AND** expression.

Example:

```php
$whereConds = [
    "category" => "fruit", // translates to: where category = fruit and ...
    "item" => "apple",  // ...item = apple
];
```


Note: under the hood, when translated to an actual query portion, pdo markers are used for each entry of the array, to avoid sql injection.


### the string form

The string form is the most flexible, as it lets you write the where portion of the query using the sql language directly (i.e. not treatment).
You can be get as complex as you want with this form, the only limit is your sql syntax knowledge.

Recommendation: remember to use pdo markers to avoid sql injection, and if you do use pdo markers don't forget to pass via the markers argument
of the method.

Example:


```php
$markers = [
    ":category" => "category",
    ":item" => "apple",
];
$whereConds = "category = :category and (item = :item or id <= 50)";
```

### the Where object

Because it was hard for me to remember the **like** notation (i.e. using the addcslash php method and wild chars...), I created the **Where** object,
which basically is a more elaborated form of the array, which handles all [standard mysql operators](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md).

This object is helping building the conditions list, we do so by alternating calls to the **key** method and an **comparison operator** method of our choice,
until our conditions list is fulfilled. 

Example:

```php
$whereConds = Where::inst()
    ->key("category")->equals("fruit")
    ->key("item")->equals("apple")
    ->key("name")->like("e")
    ;
```

The available combination methods are:

- equals (value)
- greaterThan (value)
- greaterThanOrEqualTo (value)
- lessThan (value)
- lessThanOrEqualTo (value)
- notEquals (value)
- likeStrict (value, ?allowedWildChars): equivalent of using the **like** [susco](https://github.com/lingtalfi/NotationFan/blob/master/sql-unofficial-standard-comparison-operators.md) operator.
    The allowedWildChars is the list of wild chars allowed to be interpreted as such in the value (by default no wild chars is allowed inside the value).
    Possible wild chars in mysql are: "_" and "%".
- like (value, ?allowedWildChars): same as likeStrict, but with the **%like%** susco operator.
- likePre (value, ?allowedWildChars): same as likeStrict, but with the **%like** susco operator.
- likePost (value, ?allowedWildChars): same as likeStrict, but with the **like%** susco operator.

- contains (value, ?allowedWildChars): alias of **like**.
- startsWith (value, ?allowedWildChars): alias of **likePre**.
- endsWith (value, ?allowedWildChars): alias of **likePost**.

- notLikeStrict (value, ?allowedWildChars): same as likeStrict, but with the **not_like** susco operator.
- notLike (value, ?allowedWildChars): same as likeStrict, but with the **%not_like%** susco operator.
- notLikePre (value, ?allowedWildChars): same as likeStrict, but with the **%not_like** susco operator.
- notLikePost (value, ?allowedWildChars): same as likeStrict, but with the **not_like%** susco operator.

- notContaining (value, ?allowedWildChars): alias of **notLike**.
- notStartingWith (value, ?allowedWildChars): alias of **notLikePre**.
- notEndingWith (value, ?allowedWildChars): alias of **notLikePost**.

- in (array value)
- notIn (array value)
- between (value1, value2)
- notBetween (value1, value2)
- isNull ()
- isNotNull ()

See the [Where class](https://github.com/lingtalfi/SimplePdoWrapper/blob/master/doc/api/Ling/SimplePdoWrapper/Util/Where.md) for more details.


Note: portion of sql generated from the **Where** object is always sql injection safe, as it uses pdo markers for all methods,
including for each member of the the **in**/**not in** items. 
 
 
 
#### Special operators

In addition to the combination methods above, we have **special operators**, with which we can create AND/OR groups and parenthesis, so this is possible for instance:

```php
$where = Where::inst()
    ->key("resource_identifier")
    ->openingParenthesis()
    ->equals($resource_identifier)->or()->likePost($resource_identifier . "-")
    ->closingParenthesis()
;

```

Note that in this specific case the parenthesis (call to **openingParenthesis** and **closingParenthesis**) are optional,
but it's just to show you the possibilities.


The available special operators are:

- **openingParenthesis**: writes an opening parenthesis in the query
- **closingParenthesis**: writes a closing parenthesis in the query
- **or**: writes the **OR** keyword in the query
- **and**: writes the **AND** keyword in the query
- **op**: alias for openingParenthesis
- **cp**: alias for closingParenthesis







 


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


### Fetch all with like

An example with like:

```php

$rows = $wrapper->fetchAll("select * from layout where name like :name", [
    'name' => '%' . addcslashes($name, '%_') . '%', 
]);
a($rows);
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
/**
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

- 1.30.17 -- 2021-03-05

    - update README.md, add install alternative

- 1.30.16 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.30.15 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.30.14 -- 2020-11-16

    - update MysqlInfoUtil, add getUniqueIndexColumnsOnly method 
    
- 1.30.13 -- 2020-11-16

    - update MysqlInfoUtil, add isManyToManyTable method 
    
- 1.30.12 -- 2020-11-12

    - update Where, add merge method, add FetchAllComponentsHelper class 
    
- 1.30.11 -- 2020-11-10

    - update MysqlInfoUtil, add getPotentialTablePrefixes method 
    
- 1.30.10 -- 2020-11-09

    - update SimplePdoWrapperInterface->transaction signature, now returns bool 
    
- 1.30.9 -- 2020-11-06

    - update SimplePdoWrapper->queryLog signature 

- 1.30.8 -- 2020-11-06

    - update SimplePdoWrapper, add queryLog method 
    
- 1.30.7 -- 2020-10-30

    - fix SimplePdoWrapper->handleException, code not being an int triggers fatal error 
    
- 1.30.6 -- 2020-10-19

    - add SimplePdoGenericHelper class 
    
- 1.30.5 -- 2020-10-16

    - add SimplePdoSpecialExpressionHelper::unserializeGroupConcatSeparator method 
    
- 1.30.4 -- 2020-09-17

    - update SimplePdoWrapperInterface->insert, add ignore option 
    
- 1.30.3 -- 2020-08-31

    - fix SimplePdoWrapperQueryException not having the code set 
    
- 1.30.2 -- 2020-07-27

    - fix functional bug, Columns->getMode returning null instead of "default" 
    
- 1.30.1 -- 2020-07-27

    - update OrderBy->apply, now escapes the column names with backticks 
    
- 1.30.0 -- 2020-07-27

    - add Columns->getColumns method 
    
- 1.29.1 -- 2020-07-27

    - add "fetch all components" page 
    
- 1.29.0 -- 2020-07-27

    - add OrderBy, Limit and Columns utils 
    - fix Where->isNull not applied to the request correctly 
    
- 1.28.0 -- 2020-06-19

    - add MysqlInfoUtil->getEngine method 
    
- 1.27.0 -- 2020-06-12

    - update MysqlInfoUtil->getReverseForeignKeyMap add options parameter 
    
- 1.26.1 -- 2020-06-11

    - fix MysqlInfoUtil->getUniqueIndexesDetails functional typo 
    
- 1.26.0 -- 2020-06-11

    - add MysqlInfoUtil->getIndexesDetails 

- 1.26.0 -- 2020-06-11

    - add MysqlInfoUtil->getUniqueIndexesDetails 
    
- 1.25.0 -- 2020-06-11

    - add MysqlInfoUtil->getColumnNullabilities 
    
- 1.24.0 -- 2020-06-11

    - add MysqlInfoUtil->getCreateStatement 
    
- 1.23.1 -- 2020-06-02

    - fix SimplePdoWrapper->update misspelled variable name 

- 1.23.0 -- 2020-06-02

    - update SimplePdoWrapperQueryException now accepts markers 

- 1.22.0 -- 2020-06-02

    - add SimplePdoWrapperQueryException->setMessage method 
    
- 1.21.0 -- 2020-06-02

    - add SimplePdoWrapperQueryException concept 
     
- 1.20.0 -- 2020-05-21

    - add Where special operators  
    
- 1.19.0 -- 2020-03-10

    - removed system call flag concept  
    
- 1.18.0 -- 2020-03-03

    - add system call flag concept  
    
- 1.17.0 -- 2020-02-13

    - add MysqlInfoUtil->getReferencedByTables method  
    
- 1.16.0 -- 2020-02-12

    - add MysqlInfoUtil->getReverseForeignKeyMap and getHasItems methods  
    
- 1.15.3 -- 2020-02-07

    - fix Where, inverted startingWith and endingWith methods functionality 

- 1.15.2 -- 2020-02-06

    - update README.md, add precision about Where 
    
- 1.15.1 -- 2020-02-06

    - fix documentation error in Where.conditionsList 
    
- 1.15.0 -- 2020-02-06

    - add alias methods to Where (contains, startsWith, endsWith, notContaining, notStartingWith, notEndingWith)
    
- 1.14.0 -- 2020-02-05

    - add Where util 

- 1.13.2 -- 2020-02-05

    - update README.md, add link to like example 
    
- 1.13.1 -- 2020-02-03

    - fix documentation typo in RicHelper::getRicByPkAndColumnsAndUniqueIndexes 
    
- 1.13.0 -- 2020-02-03

    - add RicHelper::getRicByPkAndColumnsAndUniqueIndexes method   
    
- 1.12.0 -- 2020-02-03

    - add SimpleTypeHelper   
    
- 1.11.0 -- 2019-12-16

    - add SimplePdoWrapper->onSuccess hook method   
    
- 1.10.2 -- 2019-12-09

    - fix documentation typo in README.md   
    
- 1.10.1 -- 2019-12-06

    - fix RicHelper::getWhereByRics low security bug   
    
- 1.10.0 -- 2019-12-06

    - add RicHelper   
    
- 1.9.2 -- 2019-12-03

    - update SimplePdoWrapperInterface, add note about replace  
    
- 1.9.1 -- 2019-12-02

    - add documentation example with like  
    
- 1.9.0 -- 2019-11-13

    - add MysqlInfoUtil->getForeignKeysInfo 
    
- 1.8.5 -- 2019-11-04

    - update MysqlInfoUtil->getRic, now accepts a useStrict argument 
    
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