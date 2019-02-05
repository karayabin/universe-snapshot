MysqlWizard
============
2019-02-04



The MysqlWizard class is a helper class to work with mysql databases.

It provides various info about the tables, and was designed to serve as the helper tool of choice for creating
any kind of mysql based generator.




Summary
=======

- [Howto](#howto)
- [Methods](#methods)
    - [getDatabases](#getdatabases)
    - [getTables](#gettables)
    - [getAutoIncrementedField](#getautoincrementedfield)
    - [getColumnDataTypes](#getcolumndatatypes)
    - [getColumnDefaultValues](#getcolumndefaultvalues)
    - [getColumnNames](#getcolumnnames)
    - [getColumnNullabilities](#getcolumnnullabilities)
    - [getUniqueIndexes](#getuniqueindexes)
    - [getForeignKeysInfo](#getforeignkeysinfo)
    - [getPrimaryKey](#getprimarykey)
    - [getRic](#getric)
- [Definitions](#definitions)







Howto
=====

We first need to attach a php \PDO instance to the wizard using the setConnection method:


```php
<?php


use MysqlWizard\MysqlWizard;

$user = "root";
$pass = "root";

try {


    $pdo = new PDO('mysql:host=localhost;dbname=kit', $user, $pass, [
        \PDO::ATTR_PERSISTENT => true,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
    ]);


    $wiz = new MysqlWizard();
    $wiz->setConnection($pdo);


    // from now on we can use the wizard...


} catch (PDOException $e) {
    // problem when calling the \PDO constructor...
    print "Connection error!: " . $e->getMessage() . "<br/>";
    exit;
}
```


Then we can use any of the methods below in this document.





Methods
=======


getDatabases
------------


Returns the list of database names in alphabetical order.

### Description

```php
getDatabases ( bool $filterMysqlDb = true ): array
```


### Parameters


- **filterMysqlDb**

    Whether to strip out the built-in mysql databases (mysql, sys, performance_schema and information_schema).<br>
    True to filter them out.<br>
    False to keep them.

### Return Values

Returns an array.


### Examples

#### Example #1 getDatabases example

```php

az($wiz->getDatabases());
/**

array(2) {
  [0] => string(1) "a"
  [1] => string(3) "kit"
}

*/

```

#### Example #2 getDatabases example with false



```php

az($wiz->getDatabases(false));
/**

array(6) {
  [0] => string(1) "a"
  [1] => string(18) "information_schema"
  [2] => string(3) "kit"
  [3] => string(5) "mysql"
  [4] => string(18) "performance_schema"
  [5] => string(3) "sys"
}


*/

```



getTables
---------


Returns the list of table names in alphabetical order for the given database.

### Description

```php
getTables ( string $db = null, string $prefix = null ): array
```


### Parameters


- **db**

    The name of the database to use. If null, the current database will be used.

- **prefix**

    If defined, keeps only the table names starting with that prefix.


### Return Values

Returns an array.


### Examples

#### Example #1 getTables example

```php

a($wiz->getTables());

/**

array(5) {
  [0] => string(6) "layout"
  [1] => string(4) "page"
  [2] => string(10) "route2page"
  [3] => string(6) "widget"
  [4] => string(4) "zone"
}

*/

```


#### Example #2 getTables using a prefix

```php

a($wiz->getTables(null, "pa"));

/**

array(1) {
  [1] => string(4) "page"
}



*/

```



getAutoIncrementedField
-------


Returns the name of the auto-incremented field, or false if there is none.


### Description

```php
getAutoIncrementedField ( string $table ): string
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns string, or false if the table doesn't have an auto-incremented column.


### Examples

#### Example #1 getAutoIncrementedField example

```php

a($wiz->getAutoIncrementedField("layout")); // id

```



getColumnDataTypes
---------


Returns an array of column_name => column_data_type.

### Description

```php
getColumnDataTypes ( string $table, bool $precision = false ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getColumnDataTypes example

```php

a($wiz->getColumnDataTypes("layout"));

/**

array(4) {
  ["id"] => string(3) "int"
  ["unique_name"] => string(7) "varchar"
  ["label"] => string(7) "varchar"
  ["path"] => string(7) "varchar"
}


*/

```


#### Example #2 getColumnDataTypes with precision

```php

a($wiz->getColumnDataTypes("layout", true));

/**

array(4) {
  ["id"] => string(7) "int(11)"
  ["unique_name"] => string(11) "varchar(64)"
  ["label"] => string(11) "varchar(64)"
  ["path"] => string(11) "varchar(64)"
}

*/

```




getColumnDefaultValues
---------


Returns an array of column_name => default_value.


### Description

```php
getColumnDefaultValues ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getColumnDefaultValues example

```php

a($wiz->getColumnDefaultValues("layout"));

/**

array(4) {
  ["id"] => NULL
  ["unique_name"] => NULL
  ["label"] => NULL
  ["path"] => NULL
}



*/

```








getColumnNames
---------


Returns the list of column names for the given $table.


### Description

```php
getColumnNames ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getColumnNames example

```php

a($wiz->getColumnNames("layout"));

/**

array(4) {
  [0] => string(2) "id"
  [1] => string(11) "unique_name"
  [2] => string(5) "label"
  [3] => string(4) "path"
}



*/

```






getColumnNullabilities
---------


Returns an array of column_name => is_nullable.

- is_nullable: represents the column nullability.
    The value is true if values can be stored in the column, false if not.


### Description

```php
getColumnNullabilities ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getColumnNullabilities example

```php

a($wiz->getColumnNullabilities("layout"));

/**

array(4) {
  ["id"] => bool(false)
  ["unique_name"] => bool(false)
  ["label"] => bool(false)
  ["path"] => bool(false)
}



*/

```



getUniqueIndexes
---------


Returns an array of index_name => indexes.

With indexes: an array of column names ordered by ascending index sequence.


### Description

```php
getUniqueIndexes ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getUniqueIndexes example

```php

a($wiz->getUniqueIndexes("layout"));

/**

array(1) {
  ["unique_name_UNIQUE"] => array(1) {
    [0] => string(11) "unique_name"
  }
}




*/

```








getForeignKeysInfo
---------


Returns an array of $foreignKey => array (
     referenced_schema => $referencedDb,
     referenced_table => $referencedTable,
     referenced_column => $referencedColumn,
).


### Description

```php
getForeignKeysInfo ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getForeignKeysInfo example



The database structure looks like this:

- layout
    - id
    - unique_name
    - label
- page
    - id
    - layout_id    (foreign key referencing the layout.id column)
    - unique_name





```php

a($wiz->getForeignKeysInfo("page"));

/**

array(1) {
  ["layout_id"] => array(3) {
    ["referenced_schema"] => string(3) "kit"
    ["referenced_table"] => string(6) "layout"
    ["referenced_column"] => string(2) "id"
  }
}





*/

```





getPrimaryKey
---------


Returns the primary key of the given $table.


### Description

```php
getPrimaryKey ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array, or false if there is no primary key defined for this table.


### Examples

#### Example #1 getPrimaryKey example



```php

a($wiz->getPrimaryKey("page"));

/**

array(1) {
  [0] => string(2) "id"
}


*/

```






getRic
---------


Returns the ric for the given $table.

See the [ric definition](#ric) for more details.


### Description

```php
getRic ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getRic example



```php

a($wiz->getRic("page"));

/**

array(1) {
  [0] => string(2) "id"
}


*/

```





getReferencedKeysInfo
---------


Return an array of entries referencing the given $table.


### Description

```php
getReferencedKeysInfo ( string $table ): array
```


### Parameters


- **table**

    The name of the table to scan. It uses the [fullTable notation](#fulltable-notation).


### Return Values

Returns an array.


### Examples

#### Example #1 getReferencedKeysInfo example



```php

a($wiz->getReferencedKeysInfo("page"));

/**

array(2) {
  ["kit.route2page"] => array(6) {
    ["referencing_schema"] => string(3) "kit"
    ["referencing_table"] => string(10) "route2page"
    ["referencing_column"] => string(7) "page_id"
    ["referenced_schema"] => string(3) "kit"
    ["referenced_table"] => string(4) "page"
    ["referenced_columns"] => array(1) {
      ["id"] => string(7) "page_id"
    }
  }
  ["kit.widget"] => array(6) {
    ["referencing_schema"] => string(3) "kit"
    ["referencing_table"] => string(6) "widget"
    ["referencing_column"] => string(7) "page_id"
    ["referenced_schema"] => string(3) "kit"
    ["referenced_table"] => string(4) "page"
    ["referenced_columns"] => array(1) {
      ["id"] => string(7) "page_id"
    }
  }
}



*/

```













Definitions
===========

FullTable notation
------------------

The name of a table.
It can be either a simple table name if the database is obvious,
or a full name prefixed with the database if necessary.

You are responsible for quoting the table name if necessary (with backticks).

Examples:

- my_table
- my_db.my_table
- `my_db`.`my_table`
- ...


Ric
------

The row identifying columns.

An array of column names, representing the set of column identifying a any row uniquely.

Generally, this array equals the primary key array.
But if no primary key is defined, then the ric contains all the columns of the table.

Example:

In a table with an auto-incremented field named id which is also the primary key, the ric is the following array:

- 0: id


