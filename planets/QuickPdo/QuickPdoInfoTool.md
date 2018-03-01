QuickPdoInfoTool
=================
2015-12-28





What is it?
-------------------


It's a companion for the [QuickPdo](https://github.com/lingtalfi/QuickPdo) tool.
 




What are the new methods?
------------------------

- [getAutoIncrementedField](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getautoincrementedfield)
- [getColumnDataTypes](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getcolumndatatypes)
- [getColumnDefaultValues](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getcolumndefaultvalues)
- [getColumnNames](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getcolumnnames)
- [getColumnNullabilities](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getcolumnnullabilities)
- [getDatabase](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getdatabase)
- [getDatabases](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getdatabases)
- [getDriver](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getdriver)
- [getPrimaryKey](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getprimarykey)
- [getReferencedKeysInfo](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#getReferencedKeysInfo)
- [getTables](https://github.com/lingtalfi/QuickPdo/blob/master/QuickPdoInfoTool.md#gettables)

 
 
 
How to use
---------------




This is an extension of QuickPdo, so be sure to read
the [QuickPdo documentation](https://github.com/lingtalfi/QuickPdo),
then you can use the methods in the next section.
Here is a quick overview example:

```php
<?php


use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;


require_once "bigbang.php";


define("MYSQL_DBNAME", "the_database");
define("PDOCONF_DSN", "mysql:dbname=" . MYSQL_DBNAME . ";host=127.0.0.1");
define("PDOCONF_USER", "root");
define("PDOCONF_PASS", "");


QuickPdo::setConnection(
    PDOCONF_DSN,
    PDOCONF_USER,
    PDOCONF_PASS,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    )
);


a(QuickPdoInfoTool::getDriver()); // mysql
a(QuickPdoInfoTool::getDatabase()); // the_database
a(QuickPdoInfoTool::getColumnNames('users')); // [id, email, pass, rib, active]
```


Note:
    since QuickPdoInfoTool uses QuickPdo under the hood,
    it also shares its [error handling system](https://github.com/lingtalfi/QuickPdo/blob/master/README.md#how-to-use).


Methods
===========


getAutoIncrementedField
-------------
2016-02-11


```php
string|false    getAutoIncrementedField ( str:table, str:schema=null )
```

Return the name of the auto-incremented field, or false if there is none.



getColumnDataTypes
-------------
2016-11-24


```php
array|false    getColumnDataTypes ( str:table, bool:precision=false )
```

Return the data types of the given table's columns, in the form of an array of columnName => dataType.
If the precision parameter is false (default), data types which accept precision are returned in their 
symbolic form (i.e. varchar, tinyint, ...).

If the precision parameter is set to true, the precision suffix is returned, like varchar(64), tinyint(1) for instance. 
  
Return false in case of failure.



getColumnDefaultValues
-------------
2016-11-24


```php
array|false    getColumnDefaultValues ( str:table )
```

Return the default values associated with the given table's columns (array of column => default value).

Return false in case of failure.



getColumnNames
-------------
2015-12-28


```php
array|false    getColumnNames ( str:table, str:schema=null )
```

Return the column names of a given table.
Return false in case of failure.




getColumnNullabilities
-------------
2016-12-01


```php
array|false    getColumnNullabilities ( str:table )
```


Return an array of column name => nullability (boolean indicating whether or the column accepts null values)

Return false in case of failure.



getCreateTable
-------------
2017-09-09


```php
array|false    getCreateTable ( str:table )
```


Return an array containing information about the string used to create the table.
- table: the table name
- create: the create string used for creating this table

Return false in case of failure.



getDatabase
-------------
2015-12-28


```php
string    getDatabase ( )
```

Return the database name from existing connection


getDatabases
-------------
2017-05-04


```php
array    getDatabases ( bool:filterMysql=true )
```

Return the databases names from existing connection.
If filterMysql is true (by default), will automatically filter the following (default mysql) databases:

- mysql
- information_schema
- performance_schema




getDriver
-------------
2015-12-28


```php
string    getDriver ( )
```

Return the driver (mysql for instance) from the existing connection


getPrimaryKey
-------------
2016-11-24


```php
array    getPrimaryKey ( str:table, str:schema=null, bool:returnAllIfEmpty=false, bool:&hasPrimaryKey=true )
```

Return an array containing the column(s) in the primary key.
If returnAllIfEmpty is set to true and the table doesn't contain a primary key,
all columns are returned.
The flag hasPrimaryKey is set to false if this is the case.


getForeignKeysInfo
-------------
2016-02-12


```php
array    getForeignKeysInfo ( str:table, str:database=null, bool:resolve=false )
```

Return an array of foreignKey => \[ referencedDatabase, referencedTable, referencedColumn \]
If resolve is true, the foreign keys are resolved until their reference is NOT a foreign key itself.





getReferencedKeysInfo
-------------
2018-02-21


```php
array    getReferencedKeysInfo ( str:table, str:database=null )
```

Return an array of entries referencing the given schema.table.
Each entry has the following structure:
- 0: database
- 1: table
- 2: column
 




getTables
-------------
2016-01-26


```php
array    getTables ( str:database )
```

Return the array of tables for the given database


getUniqueIndexes
-------------
2017-09-03


```php
array    getUniqueIndexes ( str:table )
```

Return an array of indexName => indexes.

With indexes being an array of column names ordered by ascending index sequence.



isEmptyTable
-------------
2016-02-11


```php
bool    isEmptyTable ( str:table )
```

Return whether or not the given table is empty (contains no rows).

